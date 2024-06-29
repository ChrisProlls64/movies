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

//Add the movie informations to the db
if (!empty($_POST)) {
    logoutIfCSRFTokenIsNotValid();
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



