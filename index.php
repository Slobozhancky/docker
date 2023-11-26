<?php

require_once __DIR__ . '/vendor/autoload.php';

interface iBirdEating
{
    public function eat();
}

interface iBirdFling
{
    public function fly();
}

class Swallow implements iBirdEating, iBirdFling
{
    public function eat(){}
    public function fly(){}
}

class Ostrich implements iBirdFling, iBirdEating
{
    public function eat(){}
    public function fly(){}
}
