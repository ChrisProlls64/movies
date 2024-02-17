<?php 


/**
 * Get all movies ordered by added date
 */
function getMovies()
{
    global $db;
    $sql = 'SELECT * FROM movie ORDER BY releaseDate DESC';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

/**
 * Get the 3 last highlited movies
 */
function getHighlitedMovies()
{
    global $db;
    $sql = 'SELECT slider, imgSlider  FROM movie ORDER BY releaseDate DESC';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}