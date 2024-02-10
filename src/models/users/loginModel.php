<?php

/**
 * 
 * 
 */
function checkUserAccess()
{
    global $db;
    $sql = 'SELECT id, pwd FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->execute(['email' => $_POST['email']]);
    $user = $query->fetch();
    dump($user);
    if (!empty($_POST['pwd'])) {
        if (password_verify($_POST['pwd'], $user->pwd) === false) {
            return false;
        } else {
            return $user->id;
        }
    }
}

/**
 * 
 * 
 */

function saveLastLogin(string $userId)
{
    global $db;
    $sql = 'UPDATE users SET lastLogin = NOW() WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute(['id' => $userId]);
}
