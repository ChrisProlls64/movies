<?php get_header('Catégories', 'admin'); ?>

<div class="row g-3">
  <ul class="list-group list-group-flush col">
    <?php
    $categories = retrieveAllCategories();
  
    foreach ($categories as $category) { ?>
      <li class="list-group-item"><?= $category['name'] ?></li>
    <?php } ?>
  </ul>
  
  <form class="col" method="post" >
    <div class="form-floating mb-2">
      <input name="newCategory" type="text" class="form-control <?= $class; ?>" id="newCategory" >
      <label for="newCategory">Nom de la nouvelle catégorie</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Ajouter une catégorie de film</button>
  </form>
  
</div>

<?php get_footer('admin'); ?>