<?php
// dump($_GET['id']);
// dump($_FILES);

/**
 * Update a movie in the database
 * @return bool
 */

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
        'trailer' => $_POST['trailer']
    ];

    if (!empty($_FILES['poster']['name'])) {
        $data['poster'] = renameFile($_POST['title']) . '.' . pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION);
        $sql = "UPDATE movie
        SET title = :title,
            slug = :slug,
            releaseDate = :releaseDate,
            duration = :duration,
            director = :director,
            poster = :poster,
            note = :note,
            synopsis = :synopsis,
            trailer = :trailer
        WHERE id = :id";
        resizeImage(uploadFile('./images/poster', 'poster', $_POST['title']), 300);
    } else {
        $sql = "UPDATE movie
        SET title = :title,
            slug = :slug,
            releaseDate = :releaseDate,
            duration = :duration,
            director = :director,
            note = :note,
            synopsis = :synopsis,
            trailer = :trailer
        WHERE id = :id";
    }

    try {
        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }
    flushCategoriesForMovie($_GET['id']);
    addCategoriesToMovie($_GET['id']);
    alert('Film modifié avec succès', 'success');
}



/**
 * Flushes the categories associated with the movie id in the db
 * @param string $movieId
 * @return void
 */

function flushCategoriesForMovie(string $movieId): void
{
    global $db;
    try {
        $sql = "DELETE FROM `movie_category` WHERE movie_id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(':id', $_GET['id']);
        $query->execute();
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }
}



/**
 * Retrieve the movie infos based on the id passed as parameter
 * @param string $movieId
 * @return array
 */

function retrieveMovieInfos($movieId): array
{
    if (empty($movieId)) {
        return [];
    }
    global $db;
    $data = ['id' => $movieId];
    $sql = "SELECT * FROM movie WHERE id = :id";
    $query = $db->prepare($sql);
    try {
        $query->execute($data);
        return (array) $query->fetch();
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }
}

/**
 * Update the poster or slider uploaded file
 */
// function updateUploadedFile($field) {

// }