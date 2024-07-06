<?php
/*Delete movie in the database*/
function deleteMovie()
{
    global $db;
    global $router;
    $id = $_GET['id'];

    $sql = "DELETE FROM movie WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindParam(':id', $_GET['id']);
    $query->execute();
    alert('Film supprimé avec succès', 'success');
}


