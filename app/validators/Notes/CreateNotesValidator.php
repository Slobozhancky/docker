<?php

namespace app\validators\Notes;

use app\models\Folder;
use app\validators\BaseValidator;

class CreateNotesValidator extends BaseValidator
{
    protected array $rules = [
        'title' => '/[\w\d\s\(\)\-]{3,}/i'
    ];

    protected array $errors = [
        'title' => 'Назва не має містити символів, чисел, та довжина має бути більше 3-х'
    ];

    protected array $skip = ['user_id', 'updated_at'];

    protected function checkDuplikateTitles(string $title): bool
    {
        $result = !Folder::where('user_id', '=', authId())
            ->andWhere('title', '=', $title)
            ->exist();

        if (!$result){
            $this->setError('title', "Папка з накою назвою: '$title' вже існує");
        }

        return $result;
    }

    public function validate(array $fields = []): bool
    {
        $result = [
            parent::validate($fields),
            $this->checkDuplikateTitles($fields['title'])
        ];

        return !in_array(false, $result);
    }
}