<?php

// dump(retrieveMovieInfos());

$errorMessages = [
    'title' => null,
    'releaseDate' => null,
    'director' => null,
    'duration' => null,
    // 'poster' => null,
    'categories' => null,
    'note' => null,
    'synopsis' => null,
    'trailer' => null,
    'slider' => null,
    'imgSlider' => null
];

// Check error messages for every field and displays it in error style

$errorMessages['title'] = checkTextFieldAndGetErrorMessage('title', 100);
$errorMessages['releaseDate'] = checkDateFieldAndGetErrorMessage('releaseDate');
$errorMessages['duration'] = checkDurationFieldAndGetErrorMessage('duration');
$errorMessages['director'] = checkTextFieldAndGetErrorMessage('director', 255);
$errorMessages['poster'] = checkImageFieldAndGetErrorMessage('poster', './images/poster');  // ====>> À REVOIR (paramètres)
// $errorMessages['categories'] = checkTextFieldAndGetErrorMessage('categories', 100);
$errorMessages['note'] = checkTextFieldAndGetErrorMessage('note', 100);   // ====>> À REVOIR (note comprise entre 0 et 5)
$errorMessages['synopsis'] = checkTextFieldAndGetErrorMessage('synopsis', 1000);
$errorMessages['trailer'] = checkIframeFieldAndGetErrorMessage('trailer', 500);
// $errorMessages['imgSlider'] = checkImageFieldAndGetErrorMessage('synopsis', './images/slider');

// dump($errorMessages);


//Add or update the movies informations

if (!empty($_POST)) {
    if (array_filter($errorMessages)) {
        if (!empty($_GET['id'])) {
            updateMovie();
        } 
    } else {
        alert('Merci de remplir tous les champs du formulaire');
    }
} else if (!empty($_GET['id'])) {
    $_POST = retrieveMovieInfos($_GET['id']);
}





