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
        'note' => $_POST['note'],
        'synopsis' => $_POST['synopsis'],
        'trailer' => $_POST['trailer'],
        'slider' => $_POST['slider'],
    ];

    if (!empty($_FILES['poster']['name']) && !empty($_FILES['imgSlider']['name'])) {
        $data['poster'] = renameFile($_POST['title']) . '.' . pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION);
        $data['imgSlider'] = renameFile($_POST['title']) . '-slider.' . pathinfo($_FILES['imgSlider']['name'], PATHINFO_EXTENSION);
        $sql = $sql = "UPDATE movie 
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
 * Add the movie informations in the db
 * @return string $db->lastInsertId The id of the movie just inserted in the db
 */

function createMovie(): string
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
        'trailer' => $_POST['trailer'],
        'slider' => 0, //$_POST['slider'],
        'imgSlider' => 'toto' //renameFile($_POST['title']) . '-slider.' . pathinfo($_FILES['imgSlider']['name'], PATHINFO_EXTENSION)
    ];
    try {
        $sql = "INSERT INTO movie (title, slug, releaseDate, duration, director, poster, note, synopsis, trailer, slider, imgSlider) 
        VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :note, :synopsis, :trailer, :slider, :imgSlider)";
        $query = $db->prepare($sql);
        $query->execute($data);
        uploadFile('./images/poster', 'poster', $_POST['title']);
        uploadFile('./images/slider', 'slider', $_POST['title']);
        alert('Film ajouté correctement', 'success');
        displayAlert();
        header('Location:' . $router->generate('indexMovies'));
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }
    dump($db->lastInsertId());
    return $db->lastInsertId();
}


/**
 * Associates the movie id and the category id in the db
 * @param string $movieId
 * @return void
 */

function addCategoriesToMovie(string $movieId) : void
{
    global $db;
    global $router;

    $categories = $_POST['categories'];
    foreach ($categories as $categoryId) {
        $data = [
            'movie_id' => $movieId,
            'category_id' => intval($categoryId)
        ];
        try {
            $sql = "INSERT INTO movie_category (movie_id, category_id) 
                    VALUES (:movie_id, :category_id)";
            $query = $db->prepare($sql);
            $query->execute($data);
        } catch (PDOException $e) {
            dump($e->getMessage());
            die;
        }
    }
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
