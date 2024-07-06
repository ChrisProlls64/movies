<?php

/**
 * Returns all the categories existing in the db
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

/**
 * Returns an array with all the selected categories for a specific movie
 * @param string $movieId
 * @return array $result
 */
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

/**
 * Returns an array with all the categories, 
 * and the value true or false for each categorie if it is selected for a specific movie
 * @param string $movieId
 * @return array $result
 */
function retrieveAllCategoriesWithMovieSelection($movieId): array 
{
    $allCategories = retrieveAllCategories();
    $allCategoriesIdsForMovie = retrieveAllCategoriesIdsForMovie($movieId);
    $result = [];
    foreach ($allCategories as $category) {
        $category['checked'] = in_array($category['id'], $allCategoriesIdsForMovie);
        array_push($result, $category);
    }
    return $result;

}


/**
 * Returns an array of the categories ids for a specific movie
 * @param string $movieId
 * @return array $categoriesIds
 */
function retrieveAllCategoriesIdsForMovie($movieId): array
{
    $categories = retrieveAllCategoriesForMovie($movieId);
    $categoriesIds = [];
    foreach ($categories as $category) {
        $id = $category['id'];
        array_push($categoriesIds, $id);
    }
    return $categoriesIds;
}

/**
 * Returns an array of the categories names for a specific movie
 * @param string $movieId
 * @return array $categoriesNames
 */
function retrieveAllCategoriesNamesForMovie($movieId): array
{
    $categories = retrieveAllCategoriesForMovie($movieId);
    $categoriesNames = [];
    foreach ($categories as $category) {
        $name = $category['name'];
        array_push($categoriesNames, $name);
    }
    return $categoriesNames;
}

/**
 * Associates the movie id and the categories id in the db
 * @param string $movieId
 */
 function addCategoriesToMovie(string $movieId): void
 {
     global $db;
     global $router;
 
     $categories = $_POST['categories'];
     foreach ($categories as $categoryId) {
         $data = [
             'movie_id' => $movieId,
             'category_id' => intval($categoryId)
         ];
         try {
             $sql = "INSERT INTO movie_category (movie_id, category_id) 
                      VALUES (:movie_id, :category_id)";
             $query = $db->prepare($sql);
             $query->execute($data);
         } catch (PDOException $e) {
             dump($e->getMessage());
             die;
         }
     }
 }

 /**
 * Returns all the informations of a movie along its categories names
 * @param int $id
 * @return array $movie
 */
function retrieveMovieWithCategoriesNames($id) : array 
{
    $movie = retrieveMovie($id);
    $names = retrieveAllCategoriesNamesForMovie($id);
    $movie['categoryNames'] = $names;
    return $movie;

}

