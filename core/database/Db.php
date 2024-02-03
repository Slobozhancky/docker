<?php

namespace core\database;

use PDO;
use PDOException;
use PDOStatement;

class Db
{

    private PDO $connection;
    private PDOStatement $statement;

    public function __construct(array $db_conf)
    {
        try {
            $dsn = "mysql:host={$db_conf['host']};dbname={$db_conf['dbname']};charset={$db_conf['charset']}";
            $this->connection = new PDO($dsn, $db_conf['username'], $db_conf['password'], $db_conf['options']);

        } catch (PDOException $e) {
            require_once VIEWS . '/errors/500.tpl.php';
            aboard(500);
        }
    }

    /**
     * Створили просту функцію query, яка виконує те, що буде відправляти в базу запит
     * Функція prepare - відповідає за підготовк узапиту
     * Функція execute - цей запит виконує
     */

    public function query($query, $params = []): Db
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function findAll(): array|bool
    {
        return $this->statement->fetchAll();
    }
    public function find(): array|bool
    {
        return $this->statement->fetch();
    }

    public function findOrFail(): array|bool
    {

        $res = $this->find();

        if (!$res){
            aboard();
        }

        return $res;
    }
}


