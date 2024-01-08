<?php

namespace app\validators\Folders;

use app\models\Folder;
use app\validators\BaseValidator;

class CreateFoldersValidator extends BaseValidator
{
    protected array $rules = [
        'title' => '/[\w\d\s\(\)\-]{3,}/i'
    ];

    protected array $errors = [
        'title' => 'Назва не має містити символів, чисел, та довжина має бути більше 3-х'
    ];

    protected array $skip = ['user_id'];

    protected function checkDuplikateFolders(null|int $userId, string $title): bool
    {
        dd(Folder::where('user_id', '=', $userId)
            ->andWhere('title', '=', $title)
            ->get());
    }

    public function validate(array $fields = []): bool
    {
        $result = [
            parent::validate($fields)
        ];

        return !in_array(false, $result);
    }
}
