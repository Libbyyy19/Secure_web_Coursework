<?php

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(
        $container['settings']['view']['template_path'],
        $container['settings']['view']['twig'],
        [
            "debug" => true
        ]
    );

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$container['messagesmodel'] = function ($container){
    $model = new \Coursework\messagesmodel();
    return $model;
};

$container['soapwrapper'] = function ($container){
    $retrieve_data_model = new \Coursework\SoapWrapper();
    return $retrieve_data_model;
};

$container['XmlParser'] = function ($container) {
    $model = new \Coursework\XmlParser();
    return $model;
};

$container['processOutput'] = function ($container){
    // $retrieve_data_model = new \Coursework\ProcessOutput();
    // return $retrieve_data_model;
};

$container['validator'] = function ($container) {
    $validator = new \Coursework\Validator();
    return $validator;
};