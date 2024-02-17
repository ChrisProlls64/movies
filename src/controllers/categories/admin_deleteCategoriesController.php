<?php

if (!empty($_GET['id'])) {
    deleteCategory($_GET['id']);
} else {
    alert('Impossible de supprimer l\'utilisateur', 'danger');
}

header('Location:' . $router->generate('displayCategories'));
die;

