<?php

$errorMessages = [
    'email' => false,
    'pwd' => false,
    'pwdConfirm' => false
];

/*Rules for email field */
if (!empty($_POST['email'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMessages['email'] = 'L\'adresse email n\'est pas valide';
    } else if (checkAlreadyExistEmail()) {
        $errorMessages['email'] = 'L\'adresse email existe déjà';
    }
}


/* check the password format */

if (!empty($_POST['pwd'])) {
    $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/';
    if (!preg_match($regex, $_POST['pwd'])) {
        $errorMessages['pwd'] = 'Merci de respecter le format indiqué.';
    } else if ($_POST['pwd'] !== $_POST['pwdConfirm']) {
        $errorMessages['pwdConfirm'] = 'Les mots de passe ne sont pas identiques.';
    }
}

/*save user in db */

if (!empty($_POST)) {
    if (!empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwdConfirm'])) {
        if (!$errorMessages['email'] && !$errorMessages['pwd'] && !$errorMessages['pwdConfirm']) {
            if(!empty($_GET['id'])){
                updateUser('Un utilisateur a été modifié avec succès.');
            } else {
                addUser('Un utilisateur a été ajouté avec succès.');
            }
            //redirect to users page
            header('Location: ' . $router->generate('users'));
            die;
        } else {
            alert('Erreur lors de l\'ajout de l\'utilisateur.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
} else if (!empty($_GET['id'])){
    $_POST = (array) getUser();
}

