<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title><?= $title; ?> | Animascoop</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark mb-4" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="http://localhost:8888/movies/admin/films">Admin movies</a>
                <!-- pour le responsive, bootstrap affiche ça quand l'écran devient trop petit (menu hamburger) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="http://localhost:8888/movies/admin/films/afficher">Afficher la liste des films</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="http://localhost:8888/movies/admin/films/nouveau">Créer une fiche de film</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="http://localhost:8888/movies/admin/categories">Liste des catégories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="http://localhost:8888/movies/admin/utilisateurs">Gestion des admins</a>
                        </li>
                    </ul>
                    <div class="navbar-text">
                        <a href='<?= $router->generate('logout') ?>' class="btn btn-danger"> Deconnexion</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mb-4">
        <?php displayAlert(); ?>