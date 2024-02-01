<?php
global $router;
$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);

// Autant de router que de pages dans notre site

//Movies

$router->map( 'GET|POST', '/', 'home', 'home');
$router->map( 'GET', '/users', 'create');
$router->map( 'GET', '/recherche', 'search');
$router->map( 'GET', '/film/[slug:slug]', 'detailsMovie', 'details');

//Pages

$router->map( 'GET', '/politique-confidentialite', 'privacy');
$router->map( 'GET', '/mentions-legales', 'legalNotice');
