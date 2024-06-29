<?php

if (!empty($_GET['id'])) {
    deleteCategory($_GET['id']);
} else {
    alert('Impossible de supprimer la catégorie', 'danger');
}  

header('Location:' . $router->generate('displayCategories'));
die;
