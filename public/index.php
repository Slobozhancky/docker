<?php

require_once dirname(__DIR__) . "/config/config.php";

use app\models\User;

try {
    $dotenv = \Dotenv\Dotenv::createUnsafeImmutable(ROOT);
    $dotenv->load();

    die(core\Router::dispatch($_SERVER['REQUEST_URI']));

} catch (PDOException $exception) {
    dd("PDOException", $exception);
} catch (Exception $exception) {
    dd("Exception", $exception);
}