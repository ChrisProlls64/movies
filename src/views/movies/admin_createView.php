<?php get_header('Edition', 'admin'); ?>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



<div class="row g-3 d-flex align-items-center py-4 bg-body-tertiary vertical-center mb-4">
    <form class="form-signin w-100 m-auto" enctype="multipart/form-data" method="POST" action="">
        <h1 class="h3 mb-3 fw-normal text-center">Création d'une fiche de film</h1>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['title'])) ? 'is-invalid' : ''; ?>
            <input name="title" type="text" class="form-control <?= $class; ?>" id="title" value="<?= getValue('title'); ?>" placeholder="Titre du film">
            <label for="title">Titre du film</label>
            <?= $errorMessages['title']; ?>
        </div>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['releaseDate'])) ? 'is-invalid' : ''; ?>
            <input name="releaseDate" type="date" class="form-control <?= $class; ?>" id="releaseDate" value="<?= getValue('releaseDate'); ?>" placeholder="Date de sortie">
            <label for="releaseDate">Date de sortie</label>
            <?= $errorMessages['releaseDate']; ?>
        </div>
        <div class="form-floating mb-2">
            <?php $class = (isset($errorMessages['director'])) ? 'is-invalid' : ''; ?>
            <input name="director" type="text" class="form-control <?= $class; ?>" id="director" value="<?= getValue('director'); ?>" placeholder="Réalisateur">
            <label for="director">Réalisateur</label>
            <?= $errorMessages['director']; ?>
        </div>
        <div class="form-floating mb-2">
        <?php $class = (isset($errorMessages['duration'])) ? 'is-invalid' : ''; ?>
            <input name="duration" type="time" class="form-control <?= $error['class']; ?>" id="duration" value="<?= getValue('duration'); ?>" placeholder="Durée du film">
            <label for="duration">Durée du film</label>
            <?= $errorMessages['duration']; ?>
        </div>
        <div class="form-floating mb-2">
        <?php $class = (isset($errorMessages['poster'])) ? 'is-invalid' : ''; ?>
            <input name="poster" type="file" class="form-control <?= $error['class']; ?>" value="<?= getValue('poster'); ?>" id="poster" placeholder="Lien vers l'affiche">
            <label for="poster">Affiche</label>
            <?= $errorMessages['poster']; ?>
        </div>
        <div class="form-floating mb-2">
        <?php $class = (isset($errorMessages['categories'])) ? 'is-invalid' : ''; ?>
            <input name="categories" type="text" class="form-control <?= $error['class']; ?>" value="<?= getValue('categories'); ?>" id="categories" placeholder="Catégorie">
            <label for="categories">Catégories</label>
            <?= $errorMessages['categories']; ?>
        </div>
        <div class="form-floating mb-2">
        <?php $class = (isset($errorMessages['note'])) ? 'is-invalid' : ''; ?>
            <input name="note" type="number" min="0" max="5" step="0.1" class="form-control <?= $error['class']; ?>" value="<?= getValue('note'); ?>" id="note" placeholder="Note">
            <label for="note">Note de la presse</label>
            <?= $errorMessages['note']; ?>
        </div>
        <div class="form-floating mb-2">
        <?php $class = (isset($errorMessages['Synopsis'])) ? 'is-invalid' : ''; ?>
            <input name="synopsis" type="text" maxlength="1500" size="500" class="form-control <?= $error['class']; ?>" value="<?= getValue('synopsis'); ?>" id="synopsis" placeholder="Synopsis">
            <label for="synopsis">Synopsis</label>
            <?= $errorMessages['synopsis']; ?>
        </div>
        <div class="form-floating mb-2">
        <?php $class = (isset($errorMessages['trailer'])) ? 'is-invalid' : ''; ?>
            <input name="trailer" type="url" class="form-control <?= $error['class']; ?>" value="<?= getValue('trailer'); ?>" id="trailer" placeholder="Lien vers la bande annonce">
            <label for="trailer">Bande annonce</label>
            <?= $errorMessages['synopsis']; ?>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Créer</button>

    </form>

</div>

<?php //if (addMovie() === true) {
// alert('Film ajouté avec succès', 'success');
//}
?>


<?php get_footer('admin'); ?>