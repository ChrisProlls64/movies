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
    if (!empty($_POST['pwd'])) {
        if ($user && password_verify($_POST['pwd'], $user->pwd)) {
            return $user->id;
        } else {
            return false;
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

/**
 * Generates a token when logged in, to avoid CSRF attacks
 * @return string $token
 *  */
function generateCsrfToken(): string
{
    $token = bin2hex(random_bytes(32));
    return $token;
}

$_SESSION['csrf_token'] = generateCsrfToken();
