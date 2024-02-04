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