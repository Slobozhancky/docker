<?php

return  [
    'db' => [
       'host' => $_ENV['DB_HOST'] ?? null,
       'database' => $_ENV['DB_NAME'] ?? null,
       'user' => $_ENV['DB_USER'] ?? null,
       'password' => $_ENV['DB_PASSWORD'] ?? null,
    ]
];
