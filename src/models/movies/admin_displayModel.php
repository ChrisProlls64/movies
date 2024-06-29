<?php

function retrieveAllMovies() 
{
    global $db;
    $sql = 'SELECT * FROM movie ORDER BY releaseDate desc';
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);

}

// dump($_SESSION);
