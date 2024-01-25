<?php
global $router;
// Autant de router que de pages dans notre site

// //users
// $router->map( 'GET', '/connexion', 'login', 'login');
// $router->map( 'GET', '/profil', 'profile');
// $router->map( 'GET', '/deconnexion', 'logout');
// $router->map( 'GET', '/inscription', 'signup');
// $router->map( 'GET', '/mot-de-passe-oublie', 'forgottenPasseword');


//Movies

$router->map( 'GET|POST', '/afficher', '', 'home');
$router->map( 'GET', '/users', 'create');
$router->map( 'GET', '/recherche', 'search');
$router->map( 'GET', '/details', 'details');

//Pages

$router->map( 'GET', '/politique-confidentialite', 'privacy');
$router->map( 'GET', '/mentions-legales', 'legalNotice');

?>