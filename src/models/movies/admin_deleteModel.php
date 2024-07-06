<?php
/*Delete movie in the database*/
function deleteMovie()
{
    global $db;
    global $router;
    // if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM movie WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindParam(':id', $_GET['id']);
    $query->execute();
    alert('Film supprimé avec succès', 'success');
}


