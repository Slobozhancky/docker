<?php

$db_conf = [
    'host' => 'localhost',
    'name' => 'root',
    'port' => '3306',
    'password' => 'secret',
    'db_name' => 'site_db',
    'charset' => 'utf8',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];