<?php

function checkIfCategoryAlreadyExists($newCategoryName): bool
{
    foreach (retrieveAllCategories() as $category) {
        if ($category['name'] === $newCategoryName) {
            return true;
        }
    } 
    return false;
}


if (isset($_POST['newCategory']) && !empty($_POST['newCategory'])) {
    logoutIfCSRFTokenIsNotValid();
    if (checkIfCategoryAlreadyExists($_POST['newCategory']) === true) {
        alert('La catégorie existe déjà');
    } 
    if (containsScriptTag($_POST['newCategory'])) {
        return wrapInErrorDiv("Le champ contient des erreurs");
    }
    else {
        addNewCategory($_POST['newCategory']);
        alert('Catégorie ajoutée avec succès', 'success');
    }
}


