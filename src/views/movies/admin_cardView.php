<?php get_header('Fiche du film', 'admin'); ?>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="" class="img-fluid rounded-start" alt="...">
      
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <?php $movieId = $_GET['id']; ?>
      <?php $movie = retrieveMovie($movieId); ?>
      <?php  ?>
        <h5 class="card-title"><?= $movie['title'] ?></h5>
        <p class="card-text"><small class="text-body-secondary">Durée : <?= $movie['duration']; ?> | Date de sortie : <?= $movie['releaseDate']; ?></small></p>
        <p class="card-text"><small class="text-body-secondary">Réalisateur : <?= $movie['director']; ?> | Catégories : </small></p>
        <p class="card-text"><?= $movie['synopsis']; ?></p>
        <p class="card-text"><small class="text-body-secondary">Fiche mise à jour le <?= date($movie['updated']); ?></small></p>
      </div>
    </div>
  </div>
</div>


<!-- if (!empty($_GET['id']) && !empty(getAlreadyExistId()->id)) {
    retrieveAllMovies();
} -->