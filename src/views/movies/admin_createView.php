<?php get_header('Créer une fiche de film', 'admin'); ?>


<div class="row g-3  align-items-center py-4 bg-body-tertiary vertical-center mb-4">
    <form class="form-signin w-100 m-auto" enctype="multipart/form-data" method="POST" action="">
        <h1 class="h3 mb-3 fw-normal text-center">Création d'une fiche de film</h1>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['title'])) ? 'is-invalid' : ''; ?>
            <input name="title" type="text" class="form-control <?= $class; ?>" id="title" value="<?= htmlentities(getValue('title')); ?>" placeholder="Titre du film">
            <label for="title">Titre du film</label>
            <?= $errorMessages['title']; ?>
        </div>
        <div class="row">
            <div class="form-floating mb-2 col-md-6">
                <?php $class = (isset($errorMessages['releaseDate'])) ? 'is-invalid' : ''; ?>
                <input name="releaseDate" type="date" class="form-control <?= $class; ?>" id="releaseDate" value="<?= htmlentities(getValue('releaseDate')); ?>" placeholder="Date de sortie">
                <label class="ms-2" for="releaseDate">Date de sortie</label>
                <?= $errorMessages['releaseDate']; ?>
            </div>
            <div class="form-floating mb-2 col-md-6">
                <?php $class = (isset($errorMessages['duration'])) ? 'is-invalid' : ''; ?>
                <input name="duration" type="time" class="form-control <?= $error['class']; ?>" id="duration" value="<?= htmlentities(getValue('duration')); ?>" placeholder="Durée du film">
                <label class="ms-2" for="duration">Durée du film</label>
                <?= $errorMessages['duration']; ?>
            </div>
        </div>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['director'])) ? 'is-invalid' : ''; ?>
            <input name="director" type="text" class="form-control <?= $class; ?>" id="director" value="<?= htmlentities(getValue('director')); ?>" placeholder="Réalisateur">
            <label for="director">Réalisateur</label>
            <?= $errorMessages['director']; ?>
        </div>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['poster'])) ? 'is-invalid' : ''; ?>
            <input name="poster" type="file" class="form-control <?= $error['class']; ?>" value="<?= htmlentities(getValue('poster')); ?>" id="poster" placeholder="Lien vers l'affiche">
            <label for="poster">Affiche</label>
            <?= $errorMessages['poster']; ?>
        </div>
        <legend>Catégories</legend>
        <div class="btn-group mb-3" role="group" aria-label="Catégories du film">
            <?php $class = (isset($errorMessages['categories'])) ? 'is-invalid' : ''; ?>
            <?php $categories = retrieveAllCategories(); ?>
            <?php foreach ($categories as $category) : { ?>
                    <input name="categories[]" type="checkbox" class="form-control <?= $error['class']; ?> btn-check" id="<?= $category['id'] ?>" value="<?= $category['id'] ?>" autocomplete="off">
                    <label for="<?= $category['id'] ?>" class="btn btn-outline-primary"><?= $category['name'] ?></label>
            <?php }
            endforeach; ?>
        </div>
        <?= $errorMessages['categories']; ?>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['note'])) ? 'is-invalid' : ''; ?>
            <input name="note" type="number" min="0" max="5" step="0.1" class="form-control <?= $class; ?>" value="<?= htmlentities(getValue('note')); ?>" id="note" placeholder="Note">
            <label for="note">Note de la presse</label>
            <?= $errorMessages['note']; ?>
        </div>
        <div class="form-floating mb-2">
            <?php $class = (!empty($errorMessages['synopsis'])) ? 'is-invalid' : ''; ?>
            <textarea name="synopsis" type="text" class="form-control <?= $class; ?>" id="synopsis" size="500" maxlength="1000" value="<?= htmlentities(getValue('synopsis')); ?>"  placeholder="Synopsis" rows="5"></textarea>
            <label for="synopsis">Synopsis</label>
            <?= $errorMessages['synopsis']; ?>
        </div>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['trailer'])) ? 'is-invalid' : ''; ?>
            <input name="trailer" type="text" class="form-control <?= $class; ?>" id="trailer" value="<?= htmlentities(getValue('trailer')); ?>"  placeholder="Lien vers la bande annonce">
            <label for="trailer">Bande annonce</label>
            <?= $errorMessages['trailer']; ?>
        </div>
        <div>
        <?php if (!empty($_SESSION['csrf_token'])) {
            echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
        }; ?>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Créer</button>
    </form>
</div>

<?php get_footer('admin'); ?>


