<?php
$db;

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
    if (!empty($_FILES['imgSlider'])) {
        $data = [
            'imgSlider' => renameFile($_POST['title']) . '-slider.' . pathinfo($_FILES['imgSlider']['name'], PATHINFO_EXTENSION)
        ];
        $sql = "INSERT INTO movie (title, slug, releaseDate, duration, director, poster, note, synopsis, trailer, slider, imgSlider) 
         VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :note, :synopsis, :trailer, :slider, :imgSlider)";
    } else {
        $sql = "INSERT INTO movie (title, slug, releaseDate, duration, director, poster, note, synopsis, trailer, slider) 
         VALUES (:title, :slug, :releaseDate, :duration, :director, :poster, :note, :synopsis, :trailer, :slider)";
    }
    try {
        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }
    resizeImage(uploadFile('./images/poster', 'poster', $_POST['title']), 500);
    // uploadFile('./images/slider', 'slider', $_POST['title']);
    alert('Film ajouté correctement', 'success');
    displayAlert();
    header('Location:' . $router->generate('indexMovies'));
    // dump($db->lastInsertId());
    return $db->lastInsertId();
}


