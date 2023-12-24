<?php

require_once dirname(__DIR__) . "/config/config.php";

try {
    $dotenv = \Dotenv\Dotenv::createUnsafeImmutable(ROOT);

    $users = \app\models\User::select()->get();

    foreach ($users as $user){
        dd($user->getUserInfo());
    }

    $dotenv->load();

    \core\Config::get('db.user');

    if (!preg_match('/assets/i', $_SERVER['REQUEST_URI'])){
        core\Router::dispatch($_SERVER['REQUEST_URI']);
    }
} catch (PDOException $exception) {
    dd("PDOException", $exception);
} catch (Exception $exception) {
    dd("Exception", $exception);
}