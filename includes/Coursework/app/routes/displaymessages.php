<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post(
    '/displaymessages',
    function(Request $request, Response $response) use ($app)
    {
        $data_messages = retrieveMessages($app) ['retrieved_messages'];

        $html_output = $this->view->render($response,
        'displaymessages.html.twig',
        [
           'css_path' => CSS_PATH,
           'landing_page' => LANDING_PAGE,
           'page_title' => APP_NAME,
           'page_heading_1' => APP_NAME,
           'page_heading_2' => 'Messages',
           'data_messages' => $data_messages,
            'method' => 'post',
        ]);

        $processed_output = processOutput($app, $html_output);

        return $processed_output;

});