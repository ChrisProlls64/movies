<?php


$errorMessages = [
    'title' => null,
    'releaseDate' => null,
    'director' => null,
    'duration' => null,
    'poster' => null,
    'categories' => null,
    'note' => null,
    'synopsis' => null,
    'trailer' => null
];

$errorMessages['title'] = checkTextFieldAndGetErrorMessage('title', 100);
$errorMessages['releaseDate'] = checkDateFieldAndGetErrorMessage('releaseDate');
$errorMessages['director'] = checkTextFieldAndGetErrorMessage('director', 255);
$errorMessages['duration'] = checkDurationFieldAndGetErrorMessage('duration');
$errorMessages['poster'] = checkImageFieldAndGetErrorMessage('poster', 2097152, array('jpg', 'jpeg', 'pdf', 'png'));
$errorMessages['poster'] = checkImageFieldAndGetErrorMessage('poster', 2097152, array('jpg', 'jpeg', 'pdf', 'png'));

// dump($errorMessages);


// if (!empty($_POST['note'])) {
//     if (!is_numeric($_POST['note']) || ($_POST['note']) < 0 || ($_POST['note']) > 5 ) {
//         $errorMessages['note'] = 'Le format de la note n\'est pas valide. Merci de rentrer un nombre entre 0 et 5.';
//     } 
// }

// if (!empty($_POST['trailer'])) {
//     if (!is_numeric($_POST['trailer']) && (count_chars($_POST['director']) > 255 )) {
//         $errorMessages['trailer'] = 'Le format de la note n\'est pas valide. Merci de rentrer un nombre entre 0 et 5.';
//     } 
// }

// if (!empty($_POST['categories'])) {
//     if (!is_numeric($_POST['categories']) && (count_chars($_POST['categories']) > 255 )) {
//         $errorMessages['categories'] = 'Le format de la note n\'est pas valide. Merci de rentrer un nombre entre 0 et 5.';
//     } 
// }

if (!empty($_POST)) {
    if (!empty($_POST['title'])) {
        if (!$errorMessages['title'] || 
        !$errorMessages['releaseDate'] || 
        !$errorMessages['director'] || 
        !$errorMessages['duration'] || 
        !$errorMessages['poster'] || 
        !$errorMessages['categories'] || 
        !$errorMessages['note'] ||
        !$errorMessages['synopsis'] ||
        !$errorMessages['trailer']) {
            addMovie();
            uploadFile('./images/poster/' . $_POST['title'] . '.' . $currentExt, 'poster', $exts, $maxSize);
        } else {
            alert('Erreur lors de l\'ajout du film.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
}

// if (!empty($_POST['title']) && !empty($_POST['releaseDate']) && !empty($_POST['duration']) && !empty($_POST['director']) && !empty($_POST['poster']) && !empty($_POST['categories']) && !empty($_POST['note']) && !empty($_POST['synopsis']) && !empty($_POST['trailer']))


// if (isset($_FILES['poster']) AND !empty($_FILES['poster'])){
//     $taillemax = 2097152;
//     $extensionValides = array('jpg', 'jpeg', 'png', 'pdf');
//     dump($_FILES);

//     if ($_FILES['poster']['size'] <= $taillemax){
//         $extensionUpload = strtolower(substr(strrchr($_FILES['poster']['name'], '.'), 1));
         
//         if (in_array($extensionUpload, $extensionValides)){
//             $path = "./images/poster/" . $_POST['title'] . "." . $extensionUpload;
//             $result = move_uploaded_file($_FILES['poster']['tmp_name'], $path);

//             if ($result){
//                 // $updateavatar = $bdd->prepare('INSERT INTO movies VALUES phpc = :phpc ');
//                 // $updateavatar->execute(array(
//                     // 'phpc' => $_POST['userid'].".".$extensionUpload,
//                     // 'id' => $_POST['userid']
//                 // )); 
//                 dump($result);
//                 alert ('Image uploadée avec succès');
//             } else{
//                 $message = 'Erreur lors de l\'importation de votre pièce jointe';
//             }
//         } else{
//             $message = 'Votre piece jointe doit être au format jpg, jpeg, pdf';
//         }
//     } else{
//        $message = 'Votre piece jointe ne doit pas dépasser 2Mo';
//     }
// }