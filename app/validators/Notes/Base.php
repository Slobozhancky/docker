<?php

namespace app\validators\Notes;

use app\models\Folder;
use app\models\Note;
use app\validators\BaseValidator;
use enums\SQL;

class Base extends BaseValidator
{
    protected array $skip = ['user_id', 'updated_at', 'pinned', 'completed'];

    public function validateBooleanValue(array $fields, string $key): bool
    {
        if (empty($fields[$key])) {
            return true;
        }

        $result = is_bool($fields[$key]) || $fields[$key] === 1;

        if (!$result) {
            $this->setError(
                $key,
                "`$key` має бути типу boolean"
            );
        }

        return $result;
    }

    public function validateFolderId(array $fields, bool $isRequired = true): bool
    {
        if (empty($fields['folder_id']) && !$isRequired) {
            return true;
        }

        return Folder::where('id', '=', $fields['folder_id'])
            ->startCondition()
            ->andWhere('user_id', '=', authId())
            ->orWhere('user_id', SQL::IS_OPERATOR->value, SQL::NULL->value)
            ->endCondition()
            ->exists();
    }

    public function checkTitleOnDuplication(string $title, int $folder_id, int $user_id): bool
    {
        $result = Note::where('title', '=', $title)
            ->andWhere('user_id', '=', $user_id)
            ->andWhere('folder_id', '=', $folder_id)
            ->exists();

        if ($result) {
            $this->setError('title', 'Title з такою назвою, вже існує');
        }

        return $result;
    }
}