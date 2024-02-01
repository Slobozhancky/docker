<?php

namespace core\classes;
use PDO;

class Db
{
    public function __construct(array $db_conf)
    {
        $dsn = "mysql:host={$db_conf['host']};dbname={$db_conf['dbname']};charset={$db_conf['charset']}";
        $pdo = new PDO($dsn, $db_conf['username'], $db_conf['password'], $db_conf['options']);
    }
}


