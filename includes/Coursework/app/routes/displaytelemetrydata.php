<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->map(['GET', 'POST'], '/displaytelemetrydata',
    function(Request $request, Response $response) use ($app) {

        $html_output = $this->view->render($response,
            'displayTelemetrydata.html.twig',
            [
                'css_path' => CSS_PATH,
                'landing_page' => LANDING_PAGE,
                'page_heading' => APP_NAME,
                'page_title' => APP_NAME . ' Telemetry Data',
                'method' => 'post',
                // 'switch1' => $switch1,
                //  'switch2' => $switch2,
                //  'switch3' => $switch3,
                //  'switch4' => $switch4,
                //  'fan' => $fan,
                //  'heater' => $heater,
                //  'keypad' => $keypad,
            ]);

        $processed_output = processOutput($app, $html_output);

        return $processed_output;

    })-> setName('Display Telemetry Data');

