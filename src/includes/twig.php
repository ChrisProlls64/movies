<?php

$twig->addFunction(new Twig\twigFunction('getUrl', function ($name, array $params = []) {
    global $router;
    return $router->generate($name, $params);
}));

$twig->addFunction(new Twig\twigFunction('basePath', function () {
    global $router;
    return $router->generate('home');
}));
