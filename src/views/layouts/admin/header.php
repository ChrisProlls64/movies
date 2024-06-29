<!DOCTYPE html>
<html lang="fr">

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
            <div class="container-fluid" style="width:80%;">
                <a class="navbar-brand" href="http://localhost:8888/movies"><img src="/movies/public/images/animascoop_logo_wht.png" alt="logo animascoop">(Admin)aScoop</a>
                <!-- Menu burger pour les écrans réduits -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown me-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Films
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="http://localhost:8888/movies/admin/films">Voir le catalogue</a></li>
                                <li><a class="dropdown-item" href="http://localhost:8888/movies/admin/films/afficher">Gestion des films</a></li>
                                <li><a class="dropdown-item" href="http://localhost:8888/movies/admin/films/nouveau">Ajouter un film</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catégories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="http://localhost:8888/movies/admin/categories">Liste des catégories</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Utilisateurs
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="http://localhost:8888/movies/admin/utilisateurs">Gestion des admins</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navbar-text">
                    <a href='<?= $router->generate('logout') ?>' class="btn btn-danger btn-sm">Deconnexion</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mb-4">
        <?php displayAlert(); ?>