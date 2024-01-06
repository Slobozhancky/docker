<?php

namespace core;

use core\Traits\Queryable;
use ReflectionProperty;

trait Queries
{
    protected $query;

    public function select(array $columns = ['*'])
    {
        $this->query = "SELECT " . implode(', ', $columns) . " FROM " . $this->getTable();
        return $this;
    }

    public function create(array $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", $data) . "'";
        $this->query = "INSERT INTO " . $this->getTable() . " ($columns) VALUES ($values)";
        return $this;
    }

    public function destroy()
    {
        $this->query = "DELETE FROM " . $this->getTable() . " WHERE id = " . $this->id;
        return $this;
    }

    public function update(array $data)
    {
        $updates = [];
        foreach ($data as $key => $value) {
            $updates[] = "$key = '$value'";
        }
        $this->query = "UPDATE " . $this->getTable() . " SET " . implode(', ', $updates) . " WHERE id = " . $this->id;
        return $this;
    }

    public function find($id)
    {
        $this->query = "SELECT * FROM " . $this->getTable() . " WHERE id = $id";
        return $this;
    }

    public function findBy(array $conditions)
    {
        $where = [];
        foreach ($conditions as $key => $value) {
            $where[] = "$key = '$value'";
        }
        $this->query = "SELECT * FROM " . $this->getTable() . " WHERE " . implode(' AND ', $where);
        return $this;
    }

    public function where(array $conditions)
    {
        $where = [];
        foreach ($conditions as $key => $value) {
            $where[] = "$key = '$value'";
        }
        $this->query .= " WHERE " . implode(' AND ', $where);
        return $this;
    }

    // Додайте інші методи за необхідності
}

abstract class Model
{
    use Queryable;



    public int $id;

    public function toArray(): array
    {
        $data = [];
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
        $vars = (array)$this;

        foreach ($props as $prop) {
            $data[$prop->getName()] = $vars[$prop->getName()] ?? null;
        }

        return $data;
    }
}

