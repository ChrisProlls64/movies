<?php get_header('Modifier une fiche de film', 'admin'); ?>

<div class="row g-3 d-flex align-items-center py-4 bg-body-tertiary vertical-center mb-4">
    <form class="form-signin w-100 m-auto" enctype="multipart/form-data" method="POST" action="">
        <h1 class="h3 mb-3 fw-normal text-center">Modification de la fiche du film "<?= htmlentities(addElipsisIfTooLong(getValue('title'), 100)); ?>" </h1>
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
                <input name="duration" type="time" class="form-control <?= $class; ?>" id="duration" value="<?= htmlentities(getValue('duration')); ?>" placeholder="Durée du film">
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
            <input name="poster" type="file" class="ps-4 form-control <?= $class; ?>" value="<?= htmlentities(getValue('poster')); ?>" id="poster">
            <label class="pb-4" for="poster">Ne compléter ce champ que si vous souhaitez changer l'affiche déjà enregistrée</label>
            <?= $errorMessages['poster']; ?>
        </div>
        <legend class="mb-0 fs-6">Catégories :</legend>
        <div class="btn-sm-group" role="group" aria-label="Catégories du film">
            <?php $categories = retrieveAllCategoriesWithMovieSelection($_GET['id']); ?>
            <?php foreach ($categories as $category) { ?>
                <?php $checked = $category['checked'] === true ? 'checked' : ''; ?>
                <input name="categories[]" type="checkbox" class="form-control btn-check" <?= $checked ?> id="<?= $category['id'] ?>" value="<?= $category['id'] ?>" autocomplete="off">
                <label for="<?= $category['id'] ?>" class="btn btn-outline-primary mt-2"><?= htmlentities($category['name']) ?></label>
            <?php } ?>
        </div>
        <?= $errorMessages['categories']; ?>
        <div class="form-floating mb-2 mt-2">
            <?php $class = (isset($errorMessages['note'])) ? 'is-invalid' : ''; ?>
            <input name="note" type="number" min="0" max="5" step="0.1" class="form-control <?= $class; ?>" value="<?= htmlentities(getValue('note')); ?>" id="note" placeholder="Note">
            <label for="note">Note de la presse</label>
            <?= $errorMessages['note']; ?>
        </div>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['synopsis'])) ? 'is-invalid' : ''; ?>
            <input name="synopsis" type="text" maxlength="1500" size="500" class="form-control <?= $class; ?>" value="<?= htmlentities(getValue('synopsis')); ?>" id="synopsis" placeholder="Synopsis" row="5">
            <label for="synopsis">Synopsis</label>
            <?= $errorMessages['synopsis']; ?>
        </div>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['trailer'])) ? 'is-invalid' : ''; ?>
            <input name="trailer" type="text" class="form-control <?= $class; ?>" value="<?= htmlentities(getValue('trailer')); ?>" id="trailer" placeholder="Lien vers la bande annonce">
            <label for="trailer">Bande annonce</label>
            <?= $errorMessages['trailer']; ?>
        </div>
        <?php if (isset($_SESSION['csrf_token'])) {
            echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
        } ?>
        <button class="btn btn-success w-100 py-2" type="submit">Modifier la fiche du film</button>
    </form>
</div>




<?php get_footer('admin'); ?>