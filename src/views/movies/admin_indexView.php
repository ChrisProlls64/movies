<?php get_header('Accueil Admin', 'admin'); ?>

<div class="row row-cols-2 row-cols-md-6 g-4">
    <?php $movies = retrieveAllMoviesByReleaseDate(); ?>
    <?php foreach ($movies as $movie) : ?>
    <div class="col">
        <div class="card">
                <img alt="<?= $movie['title'] ?>" src= "/movies/images/poster/<?= $movie['poster'] ?>" class=" card-img-top" alt="<?= $movie['title'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $movie['title']; ?></h5>
                    <?php $categories = retrieveAllCategoriesForMovie($movie['id']) ?>

                    <p class="card-text"><?= $movie['releaseDate']; ?></p>
                    <!-- <p class="card-text"><?= $movie['synopsis']; ?></p> -->
                    <?php foreach ($categories as $category) : ?>
                        <?= $category['name']; ?>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <?php endforeach; ?>    
</div>

<?php get_footer('admin'); ?>