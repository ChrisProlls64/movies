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
$errorMessages['title'] = checkTextFieldAndGetErrorMessage('title', 100); // OK
$errorMessages['releaseDate'] = checkDateFieldAndGetErrorMessage('releaseDate');
$errorMessages['duration'] = checkDurationFieldAndGetErrorMessage('duration');
$errorMessages['director'] = checkTextFieldAndGetErrorMessage('director', 255); // OK
$errorMessages['poster'] = checkImageFieldForEditAndGetErrorMessage('poster', './images/poster', 2097152, ['jpeg', 'jpg', 'png']);  // OK
$errorMessages['categories'] = checkCategoryFieldAndGetErrorMessage('categories');
$errorMessages['note'] = checkNoteFieldAndGetErrorMessage('note', 5);   // OK
$errorMessages['synopsis'] = checkTextFieldAndGetErrorMessage('synopsis', 1000); // OK
$errorMessages['trailer'] = checkIframeFieldAndGetErrorMessage('trailer', 500); // OK

//Update the movies informations
if (!empty($_POST)) {
    logoutIfCSRFTokenIsNotValid();
    if (empty(array_filter($errorMessages))) {
        if (!empty($_GET['id'])) {
            updateMovie();
            header('Location:' . $router->generate('indexMovies'));
            die;
        }
    } else {
        alert('Merci de remplir correctement les champs du formulaire');
    }
} else if (!empty($_GET['id'])) {
    $_POST = retrieveMovieInfos($_GET['id']);
}



