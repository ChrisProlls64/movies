<?php get_header('Catégories', 'admin')?>

<div class="row g-4">

  <ul class="list-group list-group-flush col">
    <?php
    $categories = retrieveAllCategories();
    foreach ($categories as $category) { ?>
      <li class="list-group-item">
        <span class="badge bg-primary rounded-pill">
          <?= retrieveNumberOfMoviesPerCategory($category['id']); ?>
        </span>
        <?= $category['name'] ?>
        <a class="link-warning" href="<?= $router->generate('deleteCategory', ['id' =>  htmlentities($category['id'])]); ?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer cette catégorie ?')">
          <img id="bin" src="/movies/public/images/bin.svg" height="20">
        </a>
      </li>
    <?php } ?>
  </ul>


  <form class="col" method="post">
    <div class="form-floating mb-2">
      <input name="newCategory" type="text" class="form-control <?= $class; ?>" id="newCategory">
      <label for="newCategory">Ajouter une nouvelle catégorie</label>
    </div>
    <?php if (isset($_SESSION['csrf_token'])) {
      echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
    } ?>
    <button class="btn btn-success w-100 py-2" type="submit">Valider</button>
  </form>

</div>

<?php get_footer('admin'); ?>