<?php
$db;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $title = $_POST['title'];
    $title = $_POST['title'];

    //    dump($_POST['title']);

}

function createMovie() : string
{
    global $db;
    global $router;
    $data = [
        'title' => $_POST['title'],
        'slug' => renameFile($_POST['title']),
        'releaseDate' => $_POST['releaseDate'],
        'duration' => $_POST['duration'],
        'director' => $_POST['director'],
        'poster' => renameFile($_POST['title']) . '.' . pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION),
        'note' => $_POST['note'],
        'synopsis' => $_POST['synopsis'],
        'trailer' => $_POST['trailer']
    ];
    try {
        $sql = "INSERT INTO movie (title, slug, releaseDate, duration, director, poster, note, synopsis, trailer ) VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :note, :synopsis, :trailer)";
        $query = $db->prepare($sql);
        $query->execute($data);
        // dump($_FILES);
        uploadFile('./images/poster', 'poster', $_POST['title']);
        alert('Film ajouté correctement', 'success');
        header('Location:' . $router->generate('indexMovies'));
        die;
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }
    // dump($_SESSION);
    return true;
}


/**
 * Update movie in the database
 * @return bool
 */

function updateMovie()
{
    global $db;
    global $router;
    $data = [
        'title' => $_POST['title'],
        'slug' => renameFile($_POST['title']),
        'releaseDate' => $_POST['releaseDate'],
        'duration' => $_POST['duration'],
        'director' => $_POST['director'],
        'poster' => renameFile($_POST['title']) . '.' . pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION),
        'note' => $_POST['note'],
        'synopsis' => $_POST['synopsis'],
        'trailer' => $_POST['trailer']
    ];
    try { //À finir
        $sql = "UPDATE movie (title, slug, releaseDate, duration, director, poster, note, synopsis, trailer ) VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :note, :synopsis, :trailer)";
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Film modifié correctement');
        displayAlert();
        header('Location:' . $router->generate('indexMovies'));
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }

    return true;
}
