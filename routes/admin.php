<?php
$admin = '/' . $_ENV['ADMIN_FOLDER'];
global $router;
 
$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

//admin

$router->map( 'GET|POST', $admin . '/connexion', 'users/login', 'login'); // 3
$router->map( 'GET', $admin . '/deconnexion', 'users/admin_logout', 'logout'); // 4
$router->map( 'GET', $admin . '/mot-de-passe-oublie', '', 'lostPassword'); // 7
$router->map( 'GET', $admin . '/utilisateurs', 'users/admin_index','users'); // 1
$router->map( 'GET|POST', $admin . '/utilisateurs/editer/[uuid:id]', 'users/admin_edit', 'editUser'); // 2/ 5
$router->map( 'GET|POST', $admin . '/utilisateurs/editer', 'users/admin_edit', 'addUser'); // 2/ 5
$router->map( 'GET', $admin . '/utilisateurs/supprimer/[uuid:id]', 'users/admin_delete', 'deleteUser'); // 6


//movies
$router->map( 'GET|POST', $admin . '/films', 'movies/admin_create', 'editMovie');
$router->map( 'GET|POST', $admin . '/films/afficher', 'movies/admin_display', 'indexMovies');
$router->map( 'GET', $admin . '/films/afficher/[i:id]', 'movies/admin_card', 'movieCard');
$router->map( 'GET', $admin . '/films/editer/[i:id]', '', '');
$router->map( 'GET', $admin . '/films/supprimer/[i:id]', 'movies/admin_delete', 'deleteMovie');

//catégories
$router->map( 'GET', $admin . '/categories', '');
$router->map( 'GET', $admin . '/categories/editer/[i:id]', '');
$router->map( 'GET', $admin . '/categories/supprimer/[i:id]', '');


?>