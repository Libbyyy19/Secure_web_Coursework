<?php

$container['view'] = function ($container){
    $view = new \Slim\Views\Twig(
        $container['settings']['view']['template_path'],
        [
            "debug" => true
        ]
    );

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};