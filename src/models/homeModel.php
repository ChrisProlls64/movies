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

/**
 * Get the 4 last released movies
 */
function getLastReleasedMovies()
{
    global $db;
    $sql = 'SELECT * FROM movie ORDER BY releaseDate DESC LIMIT 4';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}


/**
 * 
 */
// function getCategoriesNamesForMovie()
// {
//     global $db;
//     $sql = 'SELECT * 
//         FROM movie_category
//         JOIN categories
//         ON movie_category.category_id=categories.id';
//     $query = $db->prepare($sql);
//     $query->execute();
//     $query->fetchAll(PDO::FETCH_ASSOC);
//     return $query->fetchAll();
// }

/**
 * Returns all the informations of a movie along with its categories names
 */
// function retrieveMovieWithCategoriesNames($id) : array 
// {
//     $movie = retrieveMovie($id);
//     $names = retrieveAllCategoriesNamesForMovie($id);
//     $movie['categoryNames'] = $names;
//     return $movie;

// }