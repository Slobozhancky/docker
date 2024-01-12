<?php

namespace app\models;

use core\Model;

class Folder extends Model
{
    public static string|null $tableName = 'folders';

    public string $title, $create_at, $updated_at;
    public int|null $user_id;
}