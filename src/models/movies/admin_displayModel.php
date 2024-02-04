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

function retrieveAllCategoriesForMovie($movieId)
{
    global $db;
    $sql = 'SELECT * 
        FROM movie_category
        JOIN categories
        ON movie_category.category_id=categories.id
        WHERE movie_category.movie_id = :id';
    try {
        $query = $db->prepare($sql);
        $query->execute(['id' => $movieId]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);   
        return $result;
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }
}