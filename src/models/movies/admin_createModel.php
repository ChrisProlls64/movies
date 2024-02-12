<?php
$db;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    //dump($_POST['title']);

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
        'slider' => $_POST['slider']
    ];
    if ($_POST['slider'] == 0 && empty($_FILES['imgSlider'])) {
        $sql = "INSERT INTO movie (title, slug, releaseDate, duration, director, poster, note, synopsis, trailer, slider) 
         VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :note, :synopsis, :trailer, :slider)";
    } else if ($_POST['slider'] == 1 && !empty($_FILES['imgSlider'])) {
        $data = [
            'imgSlider' => renameFile($_POST['title']) . '-slider.' . pathinfo($_FILES['imgSlider']['name'], PATHINFO_EXTENSION)
        ];
        $sql = "INSERT INTO movie (title, slug, releaseDate, duration, director, poster, note, synopsis, trailer, slider, imgSlider) 
         VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :note, :synopsis, :trailer, :slider, :imgSlider)";
    }
    try {
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

function addCategoriesToMovie(string $movieId): void
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



// function createMovie() : string
// {
//     global $db;
//     global $router;
//     $data = [
//         'title' => $_POST['title'],
//         'slug' => renameFile($_POST['title']),
//         'releaseDate' => $_POST['releaseDate'],
//         'duration' => $_POST['duration'],
//         'director' => $_POST['director'],
//         'poster' => renameFile($_POST['title']) . '.' . pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION),
//         'note' => $_POST['note'],
//         'synopsis' => $_POST['synopsis'],
//         'trailer' => $_POST['trailer']
//     ];
//     try {
//         $sql = "INSERT INTO movie (title, slug, releaseDate, duration, director, poster, note, synopsis, trailer ) VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :note, :synopsis, :trailer)";
//         $query = $db->prepare($sql);
//         $query->execute($data);
//         // dump($_FILES);
//         uploadFile('./images/poster', 'poster', $_POST['title']);
//         alert('Film ajouté correctement', 'success');
//         header('Location:' . $router->generate('indexMovies'));
//         die;
//     } catch (PDOException $e) {
//         dump($e->getMessage());
//         die;
//     }
//     // dump($_SESSION);
//     return true;
// }


// /**
//  * Update movie in the database
//  * @return bool
//  */

// function updateMovie()
// {
//     global $db;
//     global $router;
//     $data = [
//         'title' => $_POST['title'],
//         'slug' => renameFile($_POST['title']),
//         'releaseDate' => $_POST['releaseDate'],
//         'duration' => $_POST['duration'],
//         'director' => $_POST['director'],
//         'poster' => renameFile($_POST['title']) . '.' . pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION),
//         'note' => $_POST['note'],
//         'synopsis' => $_POST['synopsis'],
//         'trailer' => $_POST['trailer']
//     ];
//     try { //À finir
//         $sql = "UPDATE movie (title, slug, releaseDate, duration, director, poster, note, synopsis, trailer ) VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :note, :synopsis, :trailer)";
//         $query = $db->prepare($sql);
//         $query->execute($data);
//         alert('Film modifié correctement');
//         displayAlert();
//         header('Location:' . $router->generate('indexMovies'));
//     } catch (PDOException $e) {
//         dump($e->getMessage());
//         die;
//     }

//     return true;
// }
