<?php get_header('Catégories', 'admin'); ?>


<ul class="list-group list-group-flush">
<?php 
$categories = retrieveAllCategories();

foreach ($categories as $category) { ?> 
  <li class="list-group-item"><?= $category['name'] ?></li>
  <?php } ?>
</ul>

<?php get_footer('admin'); ?>