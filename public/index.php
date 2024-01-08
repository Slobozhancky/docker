<?php

require_once dirname(__DIR__) . "/config/config.php";

use app\models\User;
use app\models\Folder;

try {
    $dotenv = \Dotenv\Dotenv::createUnsafeImmutable(ROOT);
    $dotenv->load();

    dd(Folder::select()->where('title', '=', 20)->sql());
//    die(core\Router::dispatch($_SERVER['REQUEST_URI']));

} catch (PDOException $exception) {
    error_response($exception);
}
