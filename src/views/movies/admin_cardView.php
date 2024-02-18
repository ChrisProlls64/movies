<?php get_header('Fiche du film', 'admin'); ?>

<div class="card mb-3" style="max-width: 900px;">
<?php $movieId = $_GET['id']; ?>
  <?php $movie = retrieveMovieWithCategoriesNames($movieId); ?>
  <div class="row g-0">
    <div class="col-md-4">
      <img alt="<?= $movie['title'] ?>" src= "/movies/images/poster/<?= $movie['poster'] ?>" class="img-fluid rounded-start" >

    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h5 class="card-title"><?= $movie['title'] ?></h5>
      <p class="card-text"><small class="text-body-secondary"><?= implode(", ", $movie['categoryNames']) ?> </small></p>
        <p class="card-text"><small class="text-body-secondary">Durée : <?= $movie['duration']; ?> </small></p>
        <p class="card-text"><small class="text-body-secondary">Date de sortie : <?= $movie['releaseDate']; ?></small></p>
        <p class="card-text"><small class="text-body-secondary">Réalisateur : <?= $movie['director']; ?> </small></p>
        <p class="card-text"><?= $movie['synopsis']; ?></p>
        <p class="card-text"><small class="text-body-secondary">Fiche mise à jour le <?= date($movie['updated']); ?></small></p>
      </div>
    </div>
  </div>
</div>

<!-- <div class="card mb-3 g-0" style="max-width: 400px;">
  <?php $movieId = $_GET['id']; ?>
  <?php $movie = retrieveMovieWithCategoriesNames($movieId); ?>

  <div class="row g-0">
    <div class="col-md-4">
      <img src= "/movies/images/poster/<?= $movie['poster'] ?>" class="img-fluid rounded-start card-img-top" >
    </div>
    
    <div class="col-md-0">
      <div class="card-body">
        <?php  ?>
        <h5 class="card-title"><?= $movie['title'] ?></h5>
        <p class="card-text"><small class="text-body-secondary"><?= implode(", ", $movie['categoryNames']) ?> </small></p>
        <p class="card-text"><small class="text-body-secondary">Durée : <?= $movie['duration']; ?> </small></p>
        <p class="card-text"><small class="text-body-secondary">Date de sortie : <?= $movie['releaseDate']; ?></small></p>
        <p class="card-text"><small class="text-body-secondary">Réalisateur : <?= $movie['director']; ?> </small></p>
        <p class="card-text"><?= $movie['synopsis']; ?></p>
        <p class="card-text"><small class="text-body-secondary">Fiche mise à jour le <?= date($movie['updated']); ?></small></p>
      </div>
    </div>
  </div>
</div> -->


<!-- if (!empty($_GET['id']) && !empty(getAlreadyExistId()->id)) {
    retrieveAllMovies();
} -->