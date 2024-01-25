<?php

if (!empty($_GET['id']) && !empty(getAlreadyExistId()->id) && countUsers() > 1) {
    deleteUser();
} else {
    alert('Impossible de supprimer l\'utilisateur', 'danger');
}

header('Location:' . $router->generate('users'));
die;

