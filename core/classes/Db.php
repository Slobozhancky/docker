<?php

namespace core\classes;

use PDO;
use PDOException;

class Db
{
    private string $host = '127.0.0.1';
    private string $dbname = 'site_db';
    private string $username = 'root';
    private string $password = 'secret';
    private string $charset = 'utf8';

    private PDO $connection;

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->connection = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}