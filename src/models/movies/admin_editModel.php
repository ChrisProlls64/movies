<?php
// dump($_GET['id']);
// dump($_FILES);

/*Update a movie in the database*/ 
function updateMovie()
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
        'categories' => $_POST['categories'],
        'note' => $_POST['note'],
        'synopsis' => $_POST['synopsis'],
        'trailer' => $_POST['trailer']
    ];

    if (!empty($_FILES['poster']['name'])) {
        $data['poster'] = renameFile($_POST['title']) . '.' . pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION);
        $sql = $sql = "UPDATE movie 
        SET title = :title, 
            slug = :slug, 
            releaseDate = :releaseDate, 
            duration = :duration, 
            director = :director, 
            poster = :poster, 
            categories = :categories, 
            note = :note, 
            synopsis = :synopsis, 
            trailer = :trailer 
        WHERE id = :id";
        uploadFile('./images/poster', 'poster', $_POST['title']);
    } else {
        $sql = "UPDATE movie 
        SET title = :title, 
            slug = :slug, 
            releaseDate = :releaseDate, 
            duration = :duration, 
            director = :director, 
            categories = :categories, 
            note = :note, 
            synopsis = :synopsis, 
            trailer = :trailer 
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

function addMovie(): bool
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
        'categories' => $_POST['categories'],
        'note' => $_POST['note'],
        'synopsis' => $_POST['synopsis'],
        'trailer' => $_POST['trailer']
    ];
    try {
        $sql = "INSERT INTO movie (title, slug, releaseDate, duration, director, poster, categories, note, synopsis, trailer ) VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :categories, :note, :synopsis, :trailer)";
        $query = $db->prepare($sql);
        $query->execute($data);
        // dump($_FILES);
        uploadFile('./images/poster', 'poster', $_POST['title']);
        alert('Film ajouté correctement', 'success');
        displayAlert();
        header('Location:' . $router->generate('indexMovies'));
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }
    // dump($_SESSION);
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
        $data = [ 'id' => $id];
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
