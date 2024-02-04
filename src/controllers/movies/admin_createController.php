<?php


$errorMessages = [
    'title' => null,
    'releaseDate' => null,
    'director' => null,
    'duration' => null,
    'poster' => null,
    'categories' => null,
    'note' => null,
    'synopsis' => null,
    'trailer' => null
];

$errorMessages['title'] = checkTextFieldAndGetErrorMessage('title', 100);
$errorMessages['releaseDate'] = checkDateFieldAndGetErrorMessage('releaseDate');
$errorMessages['director'] = checkTextFieldAndGetErrorMessage('director', 255);
$errorMessages['duration'] = checkDurationFieldAndGetErrorMessage('duration');
$errorMessages['poster'] = checkImageFieldAndGetErrorMessage('poster', './images/poster');

// dump($errorMessages);


// if (!empty($_POST['note'])) {
//     if (!is_numeric($_POST['note']) || ($_POST['note']) < 0 || ($_POST['note']) > 5 ) {
//         $errorMessages['note'] = 'Le format de la note n\'est pas valide. Merci de rentrer un nombre entre 0 et 5.';
//     } 
// }

// if (!empty($_POST['trailer'])) {
//     if (!is_numeric($_POST['trailer']) && (count_chars($_POST['director']) > 255 )) {
//         $errorMessages['trailer'] = 'Le format de la note n\'est pas valide. Merci de rentrer un nombre entre 0 et 5.';
//     } 
// }

// if (!empty($_POST['categories'])) {
//     if (!is_numeric($_POST['categories']) && (count_chars($_POST['categories']) > 255 )) {
//         $errorMessages['categories'] = 'Le format de la note n\'est pas valide. Merci de rentrer un nombre entre 0 et 5.';
//     } 
// }

if (!empty($_POST)) {
    if (!empty($_POST['title'])) {
        if (
        !$errorMessages['title'] || 
        !$errorMessages['releaseDate'] || 
        !$errorMessages['director'] || 
        !$errorMessages['duration'] || 
        !$errorMessages['poster'] || 
        !$errorMessages['categories'] || 
        !$errorMessages['note'] ||
        !$errorMessages['synopsis'] ||
        !$errorMessages['trailer']) 
        {
            createMovie();
        } else {
            alert('Erreur lors de l\'ajout du film.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
}

// if (!empty($_FILES['poster'])){
//     uploadFile('./images/poster', 'poster', $_POST['title']);
// }


