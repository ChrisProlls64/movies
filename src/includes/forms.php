<?php

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

/**
 * Check if a field is empty
 * @param string $field
 * @param string $message
 * @return array
 */
function checkEmptyFields($field, $message = 'Veuillez renseigner tous les champs')
{
    $result = [
        'class' => '',
        'message' => ''
    ];

    if (isset($_POST[$field]) && empty($_POST[$field])) {
        $result = [
            'class' => 'is-invalid',
            'message' => wrapInErrorSpan($message)
        ];
    }
    return $result;
}

/**
 * Return value of the field 
 * @param string $field
 */
function getValue($field)
{
    if (isset($_POST[$field])) {
        return $_POST[$field];
    }
    return '';
}


/**
 * Display the error message in red
 * @param string $message
 * @return string
 */
function wrapInErrorSpan($message): string
{
    return '<span class="invalid-feedback">' . $message . '</span>';
}

/**
 * Display the error message in red
 * @param string $message
 * @return string
 */
function wrapInSuccessSpan($message): string
{
    return '<span class="success">' . $message . '</span>';
}

/**
 * Check if the date format is valid
 * @param string $date
 * @return bool
 */
function isDateValid($date)
{
    $regex = '/^(\d{4})-(\d{2})-(\d{2})$/';
    return preg_match($regex, $_POST['releaseDate']);
}


/**
 *Check if the field is not empty and get the error message
 *@param string $field
 *@param int $size
 *@return ?string
 */
function checkTextFieldAndGetErrorMessage($field, int $size): ?string
{
    if (!isset($_POST[$field])) {
        return null;
    }
    if (empty($_POST[$field])) {
        return wrapInErrorSpan('Merci de renseigner le champ.');
    }
    if (strlen($_POST[$field]) > $size) {
        return wrapInErrorSpan('Le texte ne doit pas dépasser ' . $size . ' caractères.');
    }
    return null;
}


/**
 *Check if the code in the field doesn't contain any script tag
 *@param  
 * 
 */
function checkIframeFieldAndGetErrorMessage($field, int $size): ?string
{
    if (!isset($_POST[$field])) {
        return null;
    }
    if (empty($_POST[$field])) {
        return wrapInErrorSpan('Merci de renseigner le champ.');
    }
    if (strlen($_POST[$field]) > $size) {
        return wrapInErrorSpan('Le texte ne doit pas dépasser ' . $size . ' caractères.');
    }
    if (!empty(strpos($_POST[$field], '<script>'))){
        return wrapInErrorSpan('Le code contient une erreur');

    }
    return null;
}


/**
 * Check if the date is not empty and get the error message
 * @param string $field
 * @return ?string
 */
 function checkDateFieldAndGetErrorMessage($field): ?string
{
    if (!isset($_POST[$field])) {
        return null;
    }
    if (empty($_POST[$field])) {
        return wrapInErrorSpan('Merci de renseigner le champ.');
    }
    if (!isDateValid($field)) {
        return wrapInErrorSpan('La date n\'est pas au bon format');
    }
    return null;
}

/**
 * Is duration valid
 * @param string $date
 * @return bool
 */
function isDurationValid($duration): bool
{
    $regex = '/^(\d{2}):(\d{2})$/';
    return preg_match($regex, $_POST['duration']);
}

/**
 * Check if the image uploaded is ok
 * @param string $field
 * @return ?string error message wrapped in an error span
 */
function checkDurationFieldAndGetErrorMessage($field): ?string
{
    if (!isset($_POST[$field])) {
        return null;
    }
    if (empty($_POST[$field])) {
        return wrapInErrorSpan('Merci de renseigner le champ.');
    }
    if (isDurationValid($field)) {
        return wrapInErrorSpan('La durée n\'est pas au bon format');
    }
    return null;
}



/**
 * Check if the uploaded file is ok 
 * @param string $field
 * @param int $sizeMax
 * @param array $extensions
 * @return ?string
 */
function checkImageFieldAndGetErrorMessage($field, $path, int $maxSize = 2097152, array $exts = ['jpg', 'png', 'jpeg']): ?string
{
	// Check submit form with post method
	if (empty($_FILES)) :
		return '';
	endif;
	
	// Check exit directory if not create
	if (!is_dir($path) && !mkdir($path, 0755)) :
		return wrapInErrorSpan('Impossible d\'importer votre fichier.');
	endif;

	// Check not empty input file
	if (empty($_FILES[$field]['name'])) :
		return wrapInErrorSpan('Merci d\'uploader un fichier');
	endif;
	
	// Check exts
	$currentExt = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
	$currentExt = strtolower($currentExt);
	if (!in_array($currentExt, $exts)) :
		$exts = implode(', ', $exts);
		return wrapInErrorSpan('Merci de charger un fichier avec l\'une de ces extensions : ' . $exts . '.');
	endif;

	// Check no error into current file
	if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK) :
		return wrapInErrorSpan('Merci de sélectionner un autre fichier.');
	endif;

	// Check max size current file
	if ($_FILES[$field]['size'] > $maxSize) :
		return wrapInErrorSpan('Merci de charger un fichier ne dépassant pas cette taille : ' . formatBytes($maxSize));
	endif;

    return null;
}



/**	
 * Upload file
 * 
 * @param string $path /where to save file
 * @param string $field /name of the field the file comes from
 * @param string $toRename /name that will be used to rename the uploaded file
 * @return string $targetToSave / the final path + name and extension of the file   
 */
function uploadFile(string $path, string $field, $toRename): string
{
	$targetToSave = $path . '/' . renameFile($toRename) . '.' . pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES[$field]['tmp_name'], $targetToSave);    
	return $targetToSave;
}

/**
 * Convert a byte size in ko, Mo, Go, To
 * @param int $size
 * @param int $precision
 */
function formatBytes($size, $precision = 2)
{
	$base     = log($size, 1024);
	$suffixes = ['', 'Ko', 'Mo', 'Go', 'To'];

	return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

/**
 * Clean and rename the file 
 * @param string $name
 * @return string $name
 */
function renameFile($name): string 
{
	$name = trim($name);
	$name = strip_tags($name);
	$name = removeAccent($name);
    $name = preg_replace('/[\s-]+/', ' ', $name);  // Clean up multiple dashes and whitespaces
	$name = preg_replace('/[\s_]/', '-', $name); // Convert whitespaces and underscore to dash
	$name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
	$name = strtolower($name);
	$name = trim($name, '-');

	return $name;
}


/**
 * Remove and replace all the accents from a string
 * @param string $string
 * @return string $string
 */
function removeAccent($string): string 
{
	$string = str_replace(
		['à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'], 
		['a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'], 
		$string
	);
	return $string;
}


/**
 * Resize the uploaded image with a specific width
 * @param string $path
 * @param int $width
 * @return void
 */
function resizeImage($path, $width): void
{
    $manager = new ImageManager(new Driver());
    $image = $manager->read($path);
    $image->scale($width);
    $image->save($path);
}
