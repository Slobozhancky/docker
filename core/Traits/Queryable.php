<?php

namespace core\Traits;

use PDO;

trait Queryable
{
    static protected string|null $tableName = null;
    static protected string $query = '';
    private array $commands = [];

    static public function select(array $columns = ['*']): static
    {
        static::resetQuery();
        static::$query = "SELECT " . implode(', ', $columns) . " FROM " . static::$tableName . " ";

        $obj = new static;
        $obj->commands[] = 'select';

        return $obj;
    }

    static public function all(): array
    {
        return static::select()->get();
    }

    static public function find(int $id): static|false
    {
        $query = db()->prepare("SELECT * FROM " . static::$tableName . " WHERE id =:id");
        $query->bindParam('id', $id);
        $query->execute();

        return $query->fetchObject(static::class);
    }

    static public function findBy(string $column, $value): static|false
    {
        $query = db()->prepare("SELECT * FROM " . static::$tableName . " WHERE $column =:$column");
        $query->bindParam($column, $value);
        $query->execute();

        return $query->fetchObject(static::class);
    }

    static public function create(array $fields): null|static
    {
        $params = static::prepareQueryParams($fields);
        $query = db()->prepare("INSERT INTO " . static::$tableName . "($params[keys]) VALUES ($params[placeholders])");

        if (!$query->execute($fields)) {
            return null;
        }

        $query->closeCursor();

        return static::find(db()->lastInsertId());
    }

    static public function delete(int $id): bool
    {
        $query = db()->prepare("DELETE FROM " . static::$tableName . " WHERE id = :id");
        $query->bindParam('id', $id);
        return $query->execute();
    }

    static protected function prepareQueryParams(array $fields): array
    {
        $keys = array_keys($fields);
        $placeholders = preg_filter('/^/', ':', $keys);

        return [
            'keys' => implode(', ', $keys),
            'placeholders' => implode(', ', $placeholders)
        ];
    }

    static public function __callStatic(string $name, array $arguments)
    {
        if (in_array($name, ['where'])) {
            d($name);
            $obj = static::select();
            d($obj);
            call_user_func_array([$obj, $name], $arguments);
        }
    }

    public function __call(string $name, array $arguments)
    {
        if (in_array($name, ['where'])) {
            d($name);
            call_user_func_array([$this, $name], $arguments);
        }
    }

    static protected function resetQuery(): void
    {
        static::$query = '';
    }

    protected function where(string $column, string $operator, $value = null): static
    {
        if ($this->prevent(['group', 'limit', 'order', 'having'])) {
            throw new \Exception(
                static::class .
                "WHERE не може бути після ['group', 'limit', 'order', 'having']"
            );
        }

        dd(__METHOD__, $column, $operator, $value);

    }

    public function get(): array
    {
        return db()->query(static::$query)->fetchALl(PDO::FETCH_CLASS, static::class);
    }

    protected function prevent(array $allowedMethods): bool
    {
        foreach ($allowedMethods as $method) {
            if (in_array($method, $this->commands)) {
                return true;
            }
        }

        return false;
    }
}