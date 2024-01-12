<?php

namespace app\validators\Notes;

use app\models\Note;
class UpdateNoteValidator extends Base
{
    public function __construct(protected Note $note){}

    public function validateTitle(array $fields): bool
    {
        if (!isset($fields['title'])) {
            return true;
        }

        $result = preg_match('/[\w\d\s\(\)\-]{3,}/i', $fields['title']);

        if (!$result) {
            $this->setError('title', 'Назва не має включати символи, та назва не має бути менше 3-х знаків');
        }

        return $result && $this->checkTitleOnDuplication(
                $fields['title'],
                $fields['folder_id'] ?? $this->note->folder_id,
                $this->note->user_id
            );
    }

    public function validate(array $fields = []): bool
    {
        return !in_array(
            false,
            [
                parent::validate($fields),
                $this->validateFolderId($fields, false),
                $this->validateTitle($fields),
                $this->validateBooleanValue($fields, 'pinned'),
                $this->validateBooleanValue($fields, 'completed'),
            ]
        );
    }
}
