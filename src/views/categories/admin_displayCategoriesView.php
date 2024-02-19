<?php get_header('Catégories', 'admin'); ?>


<div class="row g-4">

  <ul class="list-group list-group-flush col">
    <?php
    $categories = retrieveAllCategories();
    foreach ($categories as $category) { ?>
      <li class="list-group-item">
        <a class="link-danger" href="<?= $router->generate('deleteCategory', ['id' =>  htmlentities($category['id'])]); ?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer cette catégorie ?')"><img id="bin" src="/movies/public/images/bin.svg" height="20"></a>
        <?= $category['name'] ?>
        <span class="badge bg-primary rounded-pill">

          <?= retrieveNumberOfMoviesPerCategory($category['id']); ?></span>
      </li>
    <?php } ?>
  </ul>


  <form class="col" method="post">
    <div class="form-floating mb-2">
      <input name="newCategory" type="text" class="form-control <?= $class; ?>" id="newCategory">
      <label for="newCategory">Nom de la nouvelle catégorie</label>
    </div>
    <button class="btn btn-success w-100 py-2" type="submit">Ajouter une catégorie de film</button>
  </form>

</div>

<?php get_footer('admin'); ?>