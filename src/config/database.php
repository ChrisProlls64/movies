<?php

// function connect_db()
// {
    try {
        $db = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'] . ';charset=UTF8', $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        //j'ajoute le PDO::FETCH_OBJ (qui renvoie un objet au lieu d'un tableau de tableau) en dessous, pour n'avoir à le faire qu'une fois, 
        //sinon on doit le mettre dans chaque fectchAll()
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $db;
    } catch (PDOException $e) {
        if ($_ENV['DEBUG']) {
            dump($e->getMessage());
        } else {
            echo 'Erreur de connexion à la base de données';
            die;
        }
    }
// }

// function disconnect_db($db)
// {
//     $db = NULL;
// }
