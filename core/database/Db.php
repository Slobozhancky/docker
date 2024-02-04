<?php

namespace core\database;

use Dotenv\Dotenv;
use PDO;
use PDOException;
use PDOStatement;

$dotenv = Dotenv::createImmutable(ROOT);
$dotenv->load();

class Db
{

    private PDO $connection;
    private PDOStatement $statement;

    /**
     * статична властивість класа $instance, належить йому самому, а не його екземпляру
     * що і забезпечить нам, присласнення його значення, йому самому, щоб при перевірці
     * побачити, чи є вже такий створений клас, чи ні
     */
    private static $instance;

    private function __construct()
    {
    }

    public function connect(): void
    {
        try {
            $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset={$_ENV['DB_CHARSET']}";
            $this->connection = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

        } catch (PDOException $e) {
            require_once VIEWS . '/errors/500.tpl.php';
            aboard(500);
        }
    }

    public static function getInstance(): Db
    {
        if(self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Створили просту функцію query, яка виконує те, що буде відправляти в базу запит
     * Функція prepare - відповідає за підготовку запиту
     * Функція execute - цей запит виконує, та приймає параметри, які допоможуть нам
     * позбутись SQL інєкцій
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


