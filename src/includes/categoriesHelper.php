<?php

/**
 * Return all the categories existing in the db
 * @return array $result
 */
function retrieveAllCategories(): array 
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


function retrieveAllCategoriesForMovie($movieId): array
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


function retrieveAllCategoriesWithMovieSelection($movieId): array 
{
    $allCategories = retrieveAllCategories();
    $allCategoriesIdsForMovie = retrieveAllCategoriesIdsForMovie($movieId);
    $result = [];
    foreach ($allCategories as $category) {
        $category['checked'] = in_array($category['id'], $allCategoriesIdsForMovie);
        array_push($result, $category);
    }
    // dump($result);
    return $result;

}


function retrieveAllCategoriesIdsForMovie($movieId): array
{
    $categories = retrieveAllCategoriesForMovie($movieId);
    $ids = [];
    foreach ($categories as $category) {
        $id = $category['id'];
        array_push($ids, $id);
    }
    return $ids;
}


function retrieveAllCategoriesNamesForMovie($movieId): array
{
    $categories = retrieveAllCategoriesForMovie($movieId);
    $names = [];
    foreach ($categories as $category) {
        $name = $category['name'];
        array_push($names, $name);
    }
    return $names;
}