<?php get_header('Fiche du film', 'admin'); ?>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="" class="img-fluid rounded-start" alt="...">
      
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <?php $movieId = $_GET['id']; ?>
      <?php $movie = displayCard(); ?>
      <?php  ?>
        <h5 class="card-title"><?= $movie[0]['title'] ?></h5>
        <p class="card-text"><small class="text-body-secondary">Durée : <?= $movie[0]['duration']; ?> | Date de sortie : <?= $movie[0]['releaseDate']; ?></small></p>
        <p class="card-text"><small class="text-body-secondary">Réalisateur : <?= $movie[0]['director']; ?> | Catégories : <?= $movie[0]['categories']; ?></small></p>
        <p class="card-text"><?= $movie[0]['synopsis']; ?></p>
        <p class="card-text"><small class="text-body-secondary">Fiche mise à jour le <?= date($movie[0]['updated']); ?></small></p>
      </div>
    </div>
  </div>
</div>


<!-- if (!empty($_GET['id']) && !empty(getAlreadyExistId()->id)) {
    displayMovies();
} -->