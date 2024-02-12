<?php
// dump($_GET['id']);
// dump($_FILES);

/**
 * Update a movie in the database
 * @return bool
 */

function updateMovie(): bool
{
    global $db;
    global $router;

    $data = [
        'id' => $_GET['id'],
        'title' => $_POST['title'],
        'slug' => renameFile($_POST['title']),
        'releaseDate' => $_POST['releaseDate'],
        'duration' => $_POST['duration'],
        'director' => $_POST['director'],
        'note' => $_POST['note'],
        'synopsis' => $_POST['synopsis'],
        'trailer' => $_POST['trailer'],
        'slider' => $_POST['slider'],
    ];

    if (!empty($_FILES['poster']['name']) && !empty($_FILES['imgSlider']['name'])) {
        $data['poster'] = renameFile($_POST['title']) . '.' . pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION);
        $data['imgSlider'] = renameFile($_POST['title']) . '-slider.' . pathinfo($_FILES['imgSlider']['name'], PATHINFO_EXTENSION);
        $sql = "UPDATE movie 
        SET title = :title, 
            slug = :slug, 
            releaseDate = :releaseDate, 
            duration = :duration, 
            director = :director, 
            poster = :poster, 
            note = :note, 
            synopsis = :synopsis, 
            trailer = :trailer, 
            slider = :slider, 
            imgSlider = :imgSlider 
        WHERE id = :id";
        uploadFile('./images/poster', 'poster', $_POST['title']);
        uploadFile('./images/slider', 'imgSlider', $_POST['title']) . '-slider';
    } else {
        $sql = "UPDATE movie 
        SET title = :title, 
            slug = :slug, 
            releaseDate = :releaseDate, 
            duration = :duration, 
            director = :director, 
            note = :note, 
            synopsis = :synopsis, 
            trailer = :trailer,
            slider = :slider 
        WHERE id = :id";
    }

    try { //À finir

        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Film modifié avec succès', 'success');
        displayAlert();
        header('Location:' . $router->generate('indexMovies'));
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }

    return true;
}

/**
 * Check the id of the movie in the url and return the content of the movie infos if it already exists
 */

function retrieveMovieInfos()
{
    global $db;

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $data = ['id' => $id];
        try {
            $sql = "SELECT * FROM movie WHERE id = :id";
            $query = $db->prepare($sql);
            $query->execute($data);
            $_POST = (array) $query->fetch();
        } catch (PDOException $e) {
            dump($e->getMessage());
            die;
        }
    }
}
