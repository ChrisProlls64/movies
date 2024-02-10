<?php

/**
 * Get the header
 * @param string $title The title of the page
 * @param string $layout The layout to use
 * @return void
 */

function get_header(string $title, string $layout = 'public'): void
{
    global $router;
    require_once '../src/views/layouts/' . $layout . '/header.php';
}

/**
 * Get the footer
 * @param string $layout The layout to use
 * @return void
 */

function get_footer(string $layout = 'public'): void
{
    require_once '../src/views/layouts/' . $layout . '/footer.php';
}

/**
 * Create alert notification
 * @param string $message The message to save in alert
 * @param string $type The type of alert
 * @return void
 */

function alert(string $message, string $type = 'danger'): void
{
    $_SESSION['alert'] = [
        'message' => $message,
        'type' => $type,
    ];
}

/**
 * Display alert session
 * @return void
 */

function displayAlert(): void
{
    if (isset($_SESSION['alert'])) {
        echo '<div class="alert alert-' . $_SESSION['alert']['type'] . '" role="alert">' . $_SESSION['alert']['message'] . '</div>';
        unset($_SESSION['alert']);
    }
}

// alert('hello world');
// displayAlert();
// die;


/**
 * Check if user is connected
 * @param array $match The match array from AltoRouter
 */

function checkAdmin(array $match, altoRouter $router)
{
    // dump($_SESSION);

    $existAdmin = strpos($match['target'], 'admin_');
    if ($existAdmin !== false && empty($_SESSION['user']['id'])) {
        header('Location: ' . $router->generate('login'));
        die;
    }
}


/**
 * Déconnecte après un certain temps d'inactivité
 */

function logoutTimer()
{
    global $router;

    if (!empty($_SESSION['user']['lastLogin'])) {
        $expireHour = 4;

        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Europe/Paris'));

        $lastLogin = new DateTime($_SESSION['user']['lastLogin']);

        if ($now->diff($lastLogin)->h >= $expireHour) {
            unset($_SESSION['user']);
            alert('Vous avez été déconnecté pour inactivité', 'danger');
            header('Location: ' . $router->generate('login'));
            die;
        }
    }
}

/**
 * Limiter le nombre de tentatives de connexion
 * @param int $maxAttempts / Nombre max. de tentatives autorisées
 * @param int $periodeRateLimit / Période sur laquelle les essais sont limités (en secondes)
 * @return void
 */

function limitLoginAttempts(int $maxAttempts, int $periodeRateLimit): void
{
    global $router;
    // Récupération de l'IP de l'utilisateur
    $adresseIP = $_SERVER['REMOTE_ADDR'];

    // Check si l'adresse IP a déjà tenté de soumettre le formulaire
    if (!isset($_SESSION['loginAttempts'][$adresseIP])) {
        $_SESSION['loginAttempts'][$adresseIP] = 1;
    } else {
        $_SESSION['loginAttempts'][$adresseIP]++;
    }

    if (isset($_SESSION['timestamp'])) {
        // Check si le nombre de tentatives dépasse le seuil À revoir
        if ($_SESSION['loginAttempts'][$adresseIP] > $maxAttempts && time() - $_SESSION['timestamp'][$adresseIP] < $periodeRateLimit) {
            alert('Trop de tentatives de connexion. Veuillez réessayer plus tard.');
            header('Location: ' . $router->generate('home'));
            die;
        }

        // Réinitialiser le compteur après la période définie
        if (time() - $_SESSION['timestamp'][$adresseIP] > $periodeRateLimit) {
            $_SESSION['loginAttempts'][$adresseIP] = 1;
            $_SESSION['timestamp'][$adresseIP] = time();
        }
        // dump($_SESSION);
        // dump($adresseIP);
    }
}

limitLoginAttempts(5, 3600);
// dump($_SESSION);