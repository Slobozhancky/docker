<?php

return [
    'host' => 'site_db', // site_db це і є host, для $dsn, якщо точніше то site_db - це назва mysql контейнеру
    'username' => 'root',
    'password' => 'secret',
    'dbname' => 'posts',
    'charset' => 'utf8',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];