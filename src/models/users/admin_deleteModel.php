<?php
/*Delete user in the database*/
function deleteUser()
{
    global $db;
    // if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    try {
        $sql = 'DELETE FROM users WHERE id = :id';
        $query = $db->prepare($sql);
        $query->bindParam(':id', $_GET['id']);
        $query->execute();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue, merci de réessayer ultérieurement', 'danger');
        }
    }
}

/* Check if the user id already in the db
*
*/

function getAlreadyExistId()
{
    try {
        global $db;
        $sql = 'SELECT id FROM users WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
        }
    }
}


/* check if there is almost One id in the db
*
*/

function countUsers()
{
    global $db;
    $sql = 'SELECT COUNT(*) FROM users';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchColumn();
}
