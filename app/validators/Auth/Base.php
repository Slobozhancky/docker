<?php

namespace app\validators\Auth;

use app\models\User;
use app\validators\BaseValidator;

class Base extends BaseValidator
{
    public function checkEmailOnExists(string $email, bool $eq = true, string $message = 'Така електрона адреса вже існує'): bool
    {
        $result = (bool) User::findBy('email', $email);

        if ($result === $eq) {
            $this->setError('email', $message);
        }

        return $result;
    }
}