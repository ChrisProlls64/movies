<?php get_header('Se connecter', 'login'); ?>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
    html,
    body,
    .vertical-center {
        height: 100%;

    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
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

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block;
    }

    #birthDate {
        display: none;
    }
</style>

<div class="d-flex align-items-center py-4 bg-body-tertiary vertical-center">
    <form class="form-signin w-100 m-auto" method="POST">
        <h1 class="h3 mb-3 fw-normal text-center">Se connecter</h1>
        <div class="form-floating">
            <?php $error = checkEmptyFields('email'); ?>
            <input name="email" type="email" class="form-control <?= $error['class']; ?>" id="email" placeholder="Email">
            <label for="email">Email</label>
            <?= $error['message'] ?>
        </div>
        <?php $error = checkEmptyFields('pwd'); ?>
        <div class="form-floating">
            <input name="pwd" type="password" class="form-control <?= $error['class']; ?>" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
            <?= $error['message'] ?>
        </div>
        <div id="birthDate">
            <input name="birthDate" type="date" class="form-control" id="birthDate">
            <label for="birthDate"></label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Connexion</button>
        <p class="mt-4 mb-3 text-body-secondary text-center">
            <a href="<?= $router->generate('lostPassword'); ?>">Mot de passe oublié ?</a>
        </p>
    </form>

</div>


<?php get_footer('login'); ?>