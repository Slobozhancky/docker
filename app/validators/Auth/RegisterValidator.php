<?php

namespace app\validators\Auth;

class RegisterValidator extends Base
{
    protected array $rules = [
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{8,}/', // {8,0} показує довжину пароля
    ];

    protected array $errors = [
        'email' => 'Електрона адреса не коректна',
        'password' => 'Пароль не коректний, його довжина має бути мінімум 8 символів'
    ];

    public function validate(array $fields = []): bool
    {
        $result = [
            parent::validate($fields),
            !$this->checkEmailOnExists($fields['email'])
        ];

        return !in_array(false, $result);
    }
}