<?php

use core\Config;

function config(string $name): string | null
{
    return \core\Config::get($name);
}

function db(): PDO
{
    return \core\Db::connect();
}