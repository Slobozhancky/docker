<?php

namespace core;
use core\Traits\Queryable;
abstract class Model
{
    use Queryable;

    public int $id;
}