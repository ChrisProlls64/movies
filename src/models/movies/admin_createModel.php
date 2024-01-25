<?php
$db;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $title = $_POST['title'];
    $title = $_POST['title'];

    //    dump($_POST['title']);

}

function addMovie(): bool
{
    global $db;
    global $router;
    $data = [
        'title' => $_POST['title'],
        'releaseDate' => $_POST['releaseDate'],
        'duration' => $_POST['duration'],
        'director' => $_POST['director'],
        'poster' => $_FILES['poster']['name'],
        'categories' => $_POST['categories'],
        'note' => $_POST['note'],
        'synopsis' => $_POST['synopsis'],
        'trailer' => $_POST['trailer']
    ];
    try {
        $sql = "INSERT INTO movie (title, releaseDate, duration, director, poster, categories, note, synopsis, trailer ) VALUES (:title, :releaseDate, :duration, :director, :poster, :categories, :note, :synopsis, :trailer)";
        $query = $db->prepare($sql);
        $query->execute($data);
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

// if (isset($_FILES['poster']) and !empty($_FILES['poster'])) {
//     $taillemax = 2097152;
//     $extensionValides = array('jpg', 'jpeg', 'png', 'pdf');
//     dump($_FILES);

//     if ($_FILES['poster']['size'] <= $taillemax) {
//         $extensionUpload = strtolower(substr(strrchr($_FILES['poster']['name'], '.'), 1));

//         if (in_array($extensionUpload, $extensionValides)) {
//             $path = "./images/poster/" . $_POST['title'] . "." . $extensionUpload;
//             $result = move_uploaded_file($_FILES['poster']['tmp_name'], $path);

//             if ($result) {
//                 // $query = $db->prepare('INSERT INTO movies VALUES poster = :poster ');
//                 // $updateavatar->execute(array(
//                 // 'poster' => $_POST['poster'].".".$extensionUpload,
//                 // 'id' => $_POST['userid']
//                 // )); 

//                 alert('Image uploadée avec succès');
//             } else {
//                 $message = 'Erreur lors de l\'importation de votre pièce jointe';
//             }
//         } else {
//             $message = 'Votre piece jointe doit être au format jpg, jpeg, pdf';
//         }
//     } else {
//         $message = 'Votre piece jointe ne doit pas dépasser 2Mo';
//     }
// }
