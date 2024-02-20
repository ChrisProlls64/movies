<?php 

/**
 * Returns all the informations of a movie by getting its id
 * @param int $id
 * @return array
 */

function retrieveMovie($id) : array 
{
    global $db;
    $sql = 'SELECT * FROM movie WHERE id = :id';
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetchall(PDO::FETCH_ASSOC)[0];

}

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