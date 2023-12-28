<?php

namespace app\validators\Auth;

class AuthValidator extends Base
{
    const DEFAULT_MESSAGE = 'Електрона адреса, або пароль не коректний';
    protected array $rules = [
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{8,}/', // {8,0} показує довжину пароля
    ];

    protected array $errors = [
        'email' => self::DEFAULT_MESSAGE,
        'password' => self::DEFAULT_MESSAGE
    ];

    public function validate(array $fields = []): bool
    {

        $result = [
            parent::validate($fields),
            !$this->checkEmailOnExists($fields['email'], false, self::DEFAULT_MESSAGE)
        ];

        return !in_array(false, $result);
    }
}