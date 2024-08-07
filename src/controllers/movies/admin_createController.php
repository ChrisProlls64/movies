<?php
// dump($_SESSION);
// dump($_POST);
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
$errorMessages['releaseDate'] = checkDateFieldAndGetErrorMessage('releaseDate'); // OK
$errorMessages['duration'] = checkDurationFieldAndGetErrorMessage('duration'); // OK
$errorMessages['director'] = checkTextFieldAndGetErrorMessage('director', 255); // OK
$errorMessages['poster'] = checkImageFieldForCreateAndGetErrorMessage('poster', './images/poster', 2097152, ['jpg', 'png', ]);  // OK
$errorMessages['categories'] = checkCategoryFieldAndGetErrorMessage('categories');
$errorMessages['note'] = checkNoteFieldAndGetErrorMessage('note', 5);   // OK
$errorMessages['synopsis'] = checkTextFieldAndGetErrorMessage('synopsis', 1000); // OK
$errorMessages['trailer'] = checkIframeFieldAndGetErrorMessage('trailer', 500); // OK

//Add the movie informations to the db
if (!empty($_POST)) {
    logoutIfCSRFTokenIsNotValid();
    if (empty(array_filter($errorMessages))) {
        if (empty($_GET['id'])) {
            $movieId = createMovie();
            addCategoriesToMovie($movieId);
            alert('Film ajouté correctement', 'success');
            header('Location:' . $router->generate('indexMovies'));
            die;
        } else {
            alert('Erreur lors de l\'ajout du film');
        }
    } else {
        alert('Merci de remplir correctement les champs du formulaire');
    }
}



