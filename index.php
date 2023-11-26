<?php

require_once __DIR__ . '/vendor/autoload.php';

interface iConnected{
    public function getData();
}

class Mysql implements iConnected
{
    public function getData()
    {
        return 'some data from database';
    }
}

class Controller
{
    private $adapter;

    public function __construct(iConnected $mysql)
    {
        $this->adapter = $mysql;
    }

    function getData()
    {
        $this->adapter->getData();
    }
}

$mysql = new Mysql();

$controller = new Controller($mysql);

d($controller);