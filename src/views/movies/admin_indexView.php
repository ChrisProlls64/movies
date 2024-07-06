<?php get_header('Accueil Admin', 'admin'); ?>
<style>
    .card {
        /* height: 400px; */
        height: 30rem;
    }
    .card-img-top {
            /* overflow: hidden;
            /* height: 100%; */
            height: 16rem;
            object-fit: cover;
        }
</style>    

<div class="row row-cols-6 row-cols-sm-2 row-cols-md-4 row-cols-lg-5 g-4">
    <?php $movies = retrieveAllMoviesByReleaseDate(); ?>
    <?php foreach ($movies as $movie) { ?>
    <a href="../admin/films/afficher/<?= $movie['id'] ?>" class="col" style="text-decoration: none;">
        <div class="card">
            <img alt="<?= $movie['title'] ?>" src= "/movies/images/poster/<?= $movie['poster'] ?>" class="card-img-top" alt="<?= $movie['title'] ?>">
            <div class="card-body overflow-hidden">
                <p class="card-title fw-bold fs-6 lh-2"><?= addElipsisIfTooLong($movie['title'], 15); ?></p>
                <?php $categories = retrieveAllCategoriesForMovie($movie['id']) ?>
                <p class="fs-6 fw-normal lh-2">
                    <small class="text-muted"><?= $movie['releaseDate']; ?></small>
                </p>
                <p class="fs-6 lh-1"><?= addElipsisIfTooLong($movie['synopsis'], 60); ?></p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    <?php foreach ($categories as $category) { ?>
                        <?= $category['name']; ?>
                    <?php } ?>
                </small>
            </div>
        </div>
    </a>
        <?php } ?>    
</div>

<?php get_footer('admin'); ?>