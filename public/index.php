<?php

require_once dirname(__DIR__) . "/config/config.php";

try {
    if (!preg_match('/assets/i', $_SERVER['REQUEST_URI'])){
        core\Router::dispatch($_SERVER['REQUEST_URI']);
    }
} catch (PDOException $exception) {
    dd("PDOException", $exception);
} catch (Exception $exception) {
    dd("Exception", $exception);
}