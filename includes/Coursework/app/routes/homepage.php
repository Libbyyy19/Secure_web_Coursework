<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response)
{
    return $this -> view -> render ($response,
        'homepage.html.twig',
        [
            'css_path' => CSS_PATH,
            'landing_page' => LANDING_PAGE,
            'method' => 'get',
            'action' => 'index.php',
            'page_title' => APP_NAME,
            'page_heading_1' => APP_NAME,
            'page_heading_2' => 'Please select one of the following:',
            'page_heading_3' => 'For the best experience, please login: ',
        //    'page_text' => 'Please select one from the following.',
         //   'download_data'=> LANDING_PAGE . '/displaytelemetrydata',
            'display_data' => LANDING_PAGE . '/displaytelemetrydata',
            'login_page' => LANDING_PAGE . '/login',
        ]);

    $processed_output = processOutput($app, $html_output);

    return $processed_output;

})-> setName('homepage');

function processOutput($app, $html_output)
{
    $process_output = $app->getContainer()->get('processOutput');
    //$html_output = $process_output->processOutput($html_output);
    return $html_output;
}