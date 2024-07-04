<?php
require '../vendor/autoload.php';

//on définit une constante pour les chemins qui commencent tous par ../src
define('SRC', '../src/');

//Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable('../src/config');
$dotenv->load();

//déclarer l'initialisation de la session avant toute utilisation de session
session_start();
// session_unset();


require SRC . 'includes/categoriesHelper.php';
require SRC . 'config/database.php';
require SRC . 'includes/forms.php';
require SRC . 'includes/logout.php';
require SRC . 'includes/securityHelper.php';


$router = new AltoRouter();
$router->setBasePath('/movies'); // à placer avant le router-> map


require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';


$match = $router->match();

//j'inclus les fonctions pour ajouter les headers et les footers sur mes pages
require SRC . '../src/includes/functions.php';

//fonction de logout après un laps de temps de connexion
logoutTimer();

// Twig 
$loader = new \Twig\Loader\FilesystemLoader(SRC . 'views');
$twig = new \Twig\Environment($loader, ['cache' => false, 'debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
require_once SRC . 'includes/twig.php';


//je check si il y a un match existant tapé dans l'url et renvoie vers le fichier correspondant défini dans le $router->map plus haut
if (!empty($match['target'])) {
    checkAdmin($match, $router);
    $data = []; // j'initialise l'array $data vide pour les pages twig qui n'ont pas besoin de faire appel à de la data (privacy, cookies...)
    $_GET = array_merge($_GET, $match['params']);
    require SRC . 'models/' . $match['target'] . 'Model.php'; // on concatène à la fin la fin du nom de fichier
    require SRC . 'controllers/' . $match['target'] . 'Controller.php';

    // Load twig template or classic view
    if (file_exists(SRC . 'views/' . $match['target'] . '.twig')) {
        echo $twig->render($match['target'] . '.twig', $data);
    } else {
        require SRC . 'views/' . $match['target'] . 'View.php';
    }
} else { //si pas de match je renvoie un code 404 (require sur la page 404 designée si on veut pas de page standard)
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 NOT FOUND');
    die;
}


