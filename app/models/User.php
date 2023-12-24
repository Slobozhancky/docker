<?php

namespace app\models;

use core\Model;

class User extends Model
{
    protected static string|null $tableName = 'users';

    public string|null $email, $password, $token, $create_at, $token_expired_at = null;

    public function getUserInfo(): array
    {
        return [
            'email' => $this->email,
            'token' => $this->token
        ];
    }
}