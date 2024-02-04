<?php

function retrieveAllMovies() 
{
    global $db;
    $sql = 'SELECT * FROM movie';
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);

}

// dump($_SESSION);
