<?php

/*Update a movie in the database*/
function updateMovie()
{
    global $db;
    global $router;
    $data = [
        'title' => $_POST['title'],
        'releaseDate' => $_POST['releaseDate'],
        'duration' => $_POST['duration'],
        'director' => $_POST['director'],
        'poster' => $_POST['poster'],
        'categories' => $_POST['categories'],
        'note' => $_POST['note'],
        'synopsis' => $_POST['synopsis'],
        'trailer' => $_POST['trailer']
    ];
    try {//À finir
        $sql = "UPDATE movie (title, releaseDate, duration, director, poster, categories, note, synopsis, trailer ) VALUES (:title, :releaseDate, :duration, :director, :poster, :categories, :note, :synopsis, :trailer)";
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
