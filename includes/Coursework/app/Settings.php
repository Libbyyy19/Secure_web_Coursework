<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 'On');
ini_set('xdebug.trace_output_name', 'Coursework.%t');

define('DIRSEP', DIRECTORY_SEPARATOR);

$app_url = dirname($_SERVER['SCRIPT_NAME']);
$css_path = $app_url . '/css/standard.css';
define('CSS_PATH', $css_path);
define('APP_NAME', 'Coursework');
define('LANDING_PAGE', $_SERVER['SCRIPT_NAME']);

$wsdl = 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl';
define('WSDL', $wsdl);

$detail_types = ['fan_switches', 'fan', 'heater', 'keypad'];
define('DETAIL_TYPES', $detail_types);

$settings = [
    "settings" => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,
        'mode' => 'development',
        'debug' => true,
        'class_path' => __DIR__ . '/src/',
        'view' => [
            'template_path' => __DIR__ . '/layouts/',
            'twig' => [
                'cache' => false,
                'auto_reload' => true,
            ]],
    ],
];

return $settings;