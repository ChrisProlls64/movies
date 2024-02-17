<?php
function addNewCategory($newCategory)
{
    global $db;
    $data = ['newCategory' => $newCategory];
    try {
        $sql = 'INSERT INTO `categories`(`name`) VALUES (:newCategory)';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Catégorie ajoutée avec succès', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        }
    }
}
