<?php

function logout(){
    global $router;
    unset($_SESSION['user']);
    unset($_SESSION['csrf_token']);
    header('Location: ' . $router->generate('login'));
    die;
}
