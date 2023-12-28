<?php

\core\Router::add('api/auth/registration', [
    'controller' => \app\controllers\AuthController::class,
    'action' => 'signup',
    'method' => 'POST'
]);

\core\Router::add('api/auth/login', [
    'controller' => \app\controllers\AuthController::class,
    'action' => 'signin',
    'method' => 'POST'
]);

