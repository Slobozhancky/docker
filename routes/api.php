<?php

\core\Router::add('api/auth/registration', [
    'controller' => \app\controllers\UsersController::class,
    'action' => 'store',
    'method' => 'POST'
]);