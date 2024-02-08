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
     * @param $instance - статична властивість класа, належить йому самому, а не його екземпляру
     * що і забезпечить нам, присласнення його значення, йому самому, щоб при перевірці
     * побачити, чи є вже такий створений клас, чи ні
     */
    private static $instance;

    private function __construct()
    {
    }

    public function connect(): Db
    {
        try {
            $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset={$_ENV['DB_CHARSET']}";
            $this->connection = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            return $this;

        } catch (PDOException $e) {
            require_once VIEWS . '/errors/500.tpl.php';
            aboard(500);
        }
    }

    public static function getInstance(): Db
    {
        if(is_null(self::$instance)){
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Створили просту функцію query, яка виконує те, що буде відправляти в базу запит
     * @method prepare - відповідає за підготовку запиту
     * @method execute - цей запит виконує, та приймає параметри, які допоможуть нам позбутись SQL інєкцій
     */

    public function query($query, $params = []): Db
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function createPost(){

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


