<?php

\core\Router::add('api/auth/registration', [
    'controller' => \app\controllers\Api\AuthController::class,
    'action' => 'signup',
    'method' => 'POST'
]);

\core\Router::add('api/auth/login', [
    'controller' => \app\controllers\Api\AuthController::class,
    'action' => 'signin',
    'method' => 'POST'
]);

\core\Router::add('api/folders', [
    'controller' => \app\controllers\Api\FoldersController::class,
    'action' => 'index',
    'method' => 'GET'
]);

\core\Router::add('api/folders/{id:\d+}', [
    'controller' => \app\controllers\Api\FoldersController::class,
    'action' => 'show',
    'method' => 'GET'
]);

\core\Router::add('api/folders/store', [
    'controller' => \app\controllers\Api\FoldersController::class,
    'action' => 'store',
    'method' => 'POST'
]);

\core\Router::add('api/folders/{id:\d+}/update', [
    'controller' => \app\controllers\Api\FoldersController::class,
    'action' => 'update',
    'method' => 'PUT'
]);

\core\Router::add('api/folders/{id:\d+}/delete', [
    'controller' => \app\controllers\Api\FoldersController::class,
    'action' => 'delete',
    'method' => 'DELETE'
]);

