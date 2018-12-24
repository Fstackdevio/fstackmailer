<?php

// API
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Origin: *');

$app->group('/v1', function () use ($app) {

    $app->group('/fstack', function () use ($app){
        $app->get('/mailer', App\Controllers\UserAuthController::class . ':mailer');
    });
});
