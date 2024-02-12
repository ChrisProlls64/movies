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
    'trailer' => null,
    'slider' => null,
    'imgSlider' => null,
];

$errorMessages['title'] = checkTextFieldAndGetErrorMessage('title', 100);
$errorMessages['releaseDate'] = checkDateFieldAndGetErrorMessage('releaseDate');
$errorMessages['director'] = checkTextFieldAndGetErrorMessage('director', 255);
$errorMessages['duration'] = checkDurationFieldAndGetErrorMessage('duration');
$errorMessages['poster'] = checkImageFieldAndGetErrorMessage('poster', './images/poster');
$errorMessages['duration'] = checkDurationFieldAndGetErrorMessage('duration');
$errorMessages['slider'] = checkImageFieldAndGetErrorMessage('slider', './images/slider');

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






//Add the movie informations to the db

if (!empty($_POST)) {
    if (array_filter($errorMessages)) {
        if (empty($_GET['id'])) {
            $movieId = createMovie();
            addCategoriesToMovie($movieId);
        } else {
            alert('Erreur lors de l\'ajout du film');
        }
    } else {
        alert('Merci de remplir tous les champs du formulaire');
    }
}



