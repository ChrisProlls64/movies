<?php

$twig->addFunction(new Twig\twigFunction('getUrl', function ($name, array $params = []) {
    global $router;
    return $router->generate($name, $params);
}));
