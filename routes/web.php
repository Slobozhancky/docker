<?php

use core\Routers;

Routers::add(
    'users/{id:\d+}/edit',
    [
        'controller' => \app\controllers\UsersController::class,
        'action' => 'edit',
        'method' => 'get'
    ]
);

