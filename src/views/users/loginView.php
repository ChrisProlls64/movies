<?php get_header('Se connecter', 'login'); ?>

<style>
    
    html,
    body,
    .vertical-center {
        height: 100%;

    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .form-full-width {
        width: 100%;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
    }

    .btn-color {
        background-color: #fd7e14;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block;
    }
    .btn-custom {
  background-color: #fd7e14; /* Couleur de fond normale */
  color: black; /* Couleur du texte normale */
  border: none; /* Bordure */
    }
.btn-custom:hover {
  background-color: #e76f0c; /* Couleur de fond au survol */
  color: white;
  border:#fd7e14; /* Couleur du texte au survol */
}
.btn-custom:focus,
.btn-custom:active,
.btn-custom:focus:active {
  background-color: #fd7e14; /* Couleur de fond quand le bouton est activé ou en focus */
  color: white; /* Couleur du texte quand le bouton est activé ou en focus */
  outline: none; /* Supprime l'outline par défaut */
  box-shadow: none; /* Supprime l'effet de shadow par défaut */
}
</style>

<div class="d-flex align-items-center py-4 bg-body-tertiary vertical-center">
    <form class="form-signin w-30 m-auto" method="POST">
        <img class="mb-4" src="/movies/images/animascoop_logo.png">
        <!-- <h1 class="h3 mb-3 fw-normal text-center">Connexion</h1> -->
        <div class="form-floating form-full-width">
            <?php $error = checkEmptyFields('email'); ?>
            <input name="email" type="email" class="form-control <?= $error['class']; ?>" id="email" placeholder="Email">
            <label for="email">Email</label>
            <?= $error['message'] ?>
        </div>
        <?php $error = checkEmptyFields('pwd'); ?>
        <div class="form-floating form-full-width">
            <input name="pwd" type="password" class="form-control <?= $error['class']; ?>" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
            <?= $error['message'] ?>
        </div>
        <div id="birthDate">
            <input name="birthDate" type="date" class="form-control d-none" id="birthDate">
            <label for="birthDate"></label>
        </div>
        <button class="btn w-100 py-2 btn-custom " type="submit">Connexion</button>
        <p class="mt-4 mb-3 text-body-secondary text-center">
            <small>
                <a class="text-muted" style="text-decoration: none;" href="<?= $router->generate('lostPassword'); ?>">Mot de passe oublié ?</a>
            </small>
        </p>
    </form>

</div>


<?php get_footer('login'); ?>