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
            <div class="container" style="width:80%;">
            <a class="navbar-brand" href="http://localhost:8888/movies"><img src="/movies/public/images/animascoop_logo_wht.png" alt="logo animascoop">(Admin)aScoop</a>
                <!-- pour le responsive, bootstrap affiche ça quand l'écran devient trop petit (menu hamburger) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <!--<ul class="navbar-nav me-auto mb-2 mb-lg-0">-->
                    <div class="dropdown me-auto mb-2 mb-lg-0">
                        <button class="btn btn-secondary btn-sm dropdown-toggle mx-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestion des films
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">
                                    <a class="nav-link" aria-current="page" href="http://localhost:8888/movies/admin/films">Voir le catalogue des films</a>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a class="nav-link" aria-current="page" href="http://localhost:8888/movies/admin/films/afficher">Gestion des films</a>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a class="nav-link" aria-current="page" href="http://localhost:8888/movies/admin/films/nouveau">Créer une fiche de film</a>
                                </button>
                            </li>
                        </ul>

                        <button class="btn btn-secondary btn-sm dropdown-toggle mx-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestion des catégories
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a class="nav-link" aria-current="page" href="http://localhost:8888/movies/admin/categories">Liste des catégories</a>
                                </button>
                            </li>
                        </ul>

                        <button class="btn btn-secondary btn-sm dropdown-toggle mx-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestion des utilisateurs
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a class="nav-link" aria-current="page" href="http://localhost:8888/movies/admin/utilisateurs">Gestion des admins</a>
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="navbar-text">
                        <a href='<?= $router->generate('logout') ?>' class="btn btn-danger btn-sm"> Deconnexion</a>
                    </div>
                </div>
        </div>
        </nav>
    </header>

    <main class="container mb-4">
        <?php displayAlert(); ?>