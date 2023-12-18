<?php

use core\Router;

Router::add(
    'users',
    [
        'controller' => \app\controllers\UsersController::class,
        'action' => 'index',
        'method' => 'GET'
    ]
);

Router::add(
    'users/{id:\d+}',
    [
        'controller' => \app\controllers\UsersController::class,
        'action' => 'show',
        'method' => 'GET'
    ]
);

Router::add(
    'users/{id:\d+}/edit',
    [
        'controller' => \app\controllers\UsersController::class,
        'action' => 'edit',
        'method' => 'GET'
    ]
);

Router::add(
    'users/{id:\d+}/update',
    [
        'controller' => \app\controllers\UsersController::class,
        'action' => 'update',
        'method' => 'POST'
    ]
);

