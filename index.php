<?php

require_once __DIR__ . '/vendor/autoload.php';

trait Trait1
{
    public function test(): int
    {
        return 1;
    }
}

trait Trait2
{
    public function test(): int
    {
        return 2;
    }
}
trait Trait3
{
    public function test(): int
    {
        return 3;
    }
}
class Test
{
    use Trait1, Trait2, Trait3 {
        Trait1::test insteadof Trait2, Trait3;
        Trait2::test as t2;
        Trait3::test as t3;
    }

    public function getSum(): int
    {
        return $this->test() + $this->t2() + $this->t3();
    }
}

$test_1 = new Test();

d($test_1->getSum());
