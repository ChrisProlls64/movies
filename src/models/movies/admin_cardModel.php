<?php 

function retrieveMovie($id) 
{
    global $db;
    $sql = 'SELECT * FROM movie WHERE id = :id';
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetchall(PDO::FETCH_ASSOC)[0];

}
dump(retrieveMovie($_GET['id']));
print_r($_FILES);
