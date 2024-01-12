<?php

namespace app\models;

use core\Model;

class SharedNote extends Model
{
    public static string|null $tableName = 'shared_notes';

    public int $id, $user_id, $note_id;
}