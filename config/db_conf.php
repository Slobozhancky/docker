<?php

return [
    'host' => 'site_db',
    'username' => 'root',
    'password' => 'secret',
    'dbname' => 'db',
    'charset' => 'utf8',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];