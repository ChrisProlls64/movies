<?php 
/**
 * Remove category from the "categories" table in the db
 * @param string $categoryId
 */
function deleteCategory($categoryId): void
{
    global $db;

    try {
        $sql = 'DELETE FROM categories WHERE id = :id';
        $query = $db->prepare($sql);
        $query->bindParam(':id', $categoryId);
        $query->execute();
        alert('Catégorie supprimée avec succès', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        }
    }
}
