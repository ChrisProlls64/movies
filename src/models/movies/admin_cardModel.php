<?php 

function displayCard() 
{
    global $db;
    $sql = 'SELECT * FROM movie WHERE id = :id';
    $query = $db->prepare($sql);
    $query->bindParam(':id', $_GET['id']);
    $query->execute();
    return $query->fetchall(PDO::FETCH_ASSOC);

}
dump(displayCard());
print_r($_FILES);
