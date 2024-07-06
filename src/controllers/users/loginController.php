<?php

if (!empty($_POST['birthDate'])){
    header('Location: ' . $router->generate('home'));
    die;
} else if (!empty($_POST['email'])  && !empty($_POST['pwd'])) {
    $accessUser = checkUserAccess();
    if (!empty($accessUser)) {
        $_SESSION['user'] = [
            'id' => $accessUser,
            'lastLogin' => date('Y-m-d H:i:s') 
        ];

        saveLastLogin($accessUser);
        
        alert('Bienvenue sur l\'espace administrateur d\'Animascoop', 'success');
        header('Location: ' . $router->generate('allMoviesCards'));
        die;
    } else {
        alert('Identifiants incorrects');
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
         // Check si le nombre de tentatives dépasse le seuil || À revoir
         if ($_SESSION['loginAttempts'][$adresseIP] >= $maxAttempts && time() - $_SESSION['timestamp'][$adresseIP] < $periodeRateLimit) {
             alert('Trop de tentatives de connexion. Veuillez réessayer plus tard.');
             header('Location: ' . $router->generate('home'));
             die;
         }
 
         // Réinitialiser le compteur après la période définie
         if (time() - $_SESSION['timestamp'][$adresseIP] > $periodeRateLimit) {
             $_SESSION['loginAttempts'][$adresseIP] = 1;
             $_SESSION['timestamp'][$adresseIP] = time();
         }
     }
 }
 
 limitLoginAttempts(2, 30);