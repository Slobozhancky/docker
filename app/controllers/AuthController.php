<?php

namespace app\controllers;

use app\models\User;
use app\validators\Auth\AuthValidator;
use app\validators\Auth\RegisterValidator;
use core\Controller;

class AuthController extends Controller
{
    public function signup(): array
    {
        $data = requestBody();
        $validator = new RegisterValidator();

        if ($validator->validate($data)) {

            $id = User::create([
                ...$data,
                'password' => password_hash($data['password'], PASSWORD_BCRYPT)
            ]);


            return $this->response(200, User::find($id)->toArray());
        }

        return $this->response(200, $data, $validator->getErrors());
    }

    public function signin(string $action)
    {
        $data = requestBody();
        $validator = new AuthValidator();

        if ($validator->validate($data)) {
            $user = User::findBy('email', $data['email']);
            if (password_verify($data['password'], $user->password)) {
                $token = random_bytes(32);

                return $this->response(200, compact('token'));
            }
        }

        return $this->response(200, [], $validator->getErrors());
    }
}