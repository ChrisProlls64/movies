<?php 

/**
 * Get all movies ordered by added date
 */
function getMovies()
{
    global $db;
    $sql = 'SELECT * FROM movie ORDER BY created DESC';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function detailsMovie ()
{
    global $db;
    $sql = 'SELECT * FROM movie WHERE slug = :slug';
    $query = $db->prepare($sql);
    $query->bindParam(':slug', $_GET['slug']);
    $query->execute();

    return $query->fetch();
}