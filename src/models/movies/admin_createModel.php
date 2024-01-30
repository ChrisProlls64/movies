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
        'poster' => renameFile($_POST['title']) . '.' . pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION),
        'categories' => $_POST['categories'],
        'note' => $_POST['note'],
        'synopsis' => $_POST['synopsis'],
        'trailer' => $_POST['trailer']
    ];
    try {
        $sql = "INSERT INTO movie (title, releaseDate, duration, director, poster, categories, note, synopsis, trailer ) VALUES (:title, :releaseDate, :duration, :director, :poster, :categories, :note, :synopsis, :trailer)";
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



// function uploadFile() 
// {
//     global $db;
//     if (isset($_FILES['poster']) and !empty($_FILES['poster'])) {
//         $taillemax = 2097152;
//         $extensionValides = array('jpg', 'jpeg', 'png', 'pdf');
//         dump($_FILES);
    
//         if ($_FILES['poster']['size'] <= $taillemax) {
//             $extensionUpload = strtolower(substr(strrchr($_FILES['poster']['name'], '.'), 1));
    
//             if (in_array($extensionUpload, $extensionValides)) {
//                 $path = "./images/poster/" . $_POST['title'] . "." . $extensionUpload;
//                 $result = move_uploaded_file($_FILES['poster']['tmp_name'], $path);
    
//                 if ($result) {
//                     // $query = $db->prepare('INSERT INTO movies VALUES poster = :poster ');
//                     // $query->execute(array(
//                     // 'poster' => $_POST['poster'].".".$extensionUpload,
//                     // 'id' => $_POST['userid']
//                     // )); 
    
//                     alert('Image uploadée avec succès');
//                 } else {
//                     alert('Erreur lors de l\'importation de votre pièce jointe');
//                 }
//             } else {
//                 alert('Votre piece jointe doit être au format jpg, jpeg, pdf');
//             }
//         } else {
//             alert('Votre piece jointe ne doit pas dépasser 2Mo');
//         }
//     }
// }
