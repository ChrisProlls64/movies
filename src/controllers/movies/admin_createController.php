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
];

// Check error messages for every field and displays it in error style
$errorMessages['title'] = checkTextFieldAndGetErrorMessage('title', 100);
$errorMessages['releaseDate'] = checkDateFieldAndGetErrorMessage('releaseDate');
$errorMessages['duration'] = checkDurationFieldAndGetErrorMessage('duration');
$errorMessages['director'] = checkTextFieldAndGetErrorMessage('director', 255);
// $errorMessages['poster'] = checkImageFieldAndGetErrorMessage('poster', './images/poster');  // ====>> À REVOIR (paramètres)
// $errorMessages['categories'] = checkTextFieldAndGetErrorMessage('categories', 100);
$errorMessages['note'] = checkNoteFieldAndGetErrorMessage('note', 5);   // ====>> À REVOIR (note comprise entre 0 et 5)
$errorMessages['synopsis'] = checkTextFieldAndGetErrorMessage('synopsis', 1000); //OK
$errorMessages['trailer'] = checkIframeFieldAndGetErrorMessage('trailer', 500); // OK

//Add the movie informations to the db
if (!empty($_POST)) {
    // logoutIfCSRFTokenIsNotValid();
    dump($errorMessages);
    if (empty(array_filter($errorMessages))) {
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



