<?php

namespace app\controllers;

use core\Controller;

class UsersController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function before(string $action, array $params = []): bool
    {
        return parent::before($action, $params);
    }
}