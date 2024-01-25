<?php

function disconnect(){
    global $router;
    unset($_SESSION['user']);
    header('Location: ' . $router->generate('login'));
    die;
}
disconnect();