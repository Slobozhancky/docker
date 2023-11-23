<?php
require_once __DIR__ . '/vendor/autoload.php';

class User {
    private string $name;
    private int $age;

    private string $email;
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getAge(): string
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getAll(): string{
        try {
            if (empty($this->name === null) || empty($this->age === null)){
                throw new Exception("The value must be filled in");
            }

            return "User name: {$this->name}; User age: {$this->age}";
        }catch (Exception $e){
            echo $e->getMessage();
            return '';
        }
    }

    public function __call($name, $arg){
        try {
            return match ($name) {
                "setName", "setAge", "getName", "getAge" => $arg,
                default => throw new Exception("This method {$name} does not exist"),
            };
        }catch (Exception $e){
            echo $e->getMessage();
            return null;
        }
    }
}

$user_1 = new User();

$user_1->setName('Bob');

d($user_1->getName());
d($user_1->getEmail());
d($user_1->getAll());
