<?php

/**
 * Return all the categories existing in the db
 * @return array $result
 */
function retrieveAllCategories() 
{
    global $db;
    $sql = 'SELECT * FROM categories';
    try{
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        dump($e->getMessage());
        die;
    }

}


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

function retrieveAllCategoriesNamesForMovie($movieId) {
    $categories = retrieveAllCategoriesForMovie($movieId);
    $names = [];
    foreach ($categories as $category) {
        $name = $category['name'];
        array_push($names, $name);
    }
    return $names;
}