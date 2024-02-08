<?php

use core\database\Db;

/**
 * http_response_code - має повернути бразеру помлку, у разі того, якщо сторінка не знайдена, а не тільки вивсти її вид
 */
function aboard($code = 404): void
{
    http_response_code($code);
    require_once VIEWS . "/errors/{$code}.tpl.php";
    die();
}

function getDbConnection(): Db
{
    return (Db::getInstance())->connect();
};

/**
 * @param array $fillable
 * @return array
 *
 * @method checkFillable - це проста фукція, яка приймає масив ключів які ми очікуємо отримати з нашої форми.Тобто,
 * це нам допоможе зробити таким чином, щоб якщо з форми прийде щось лишнє, ми його не опрацьовували, а иільки перевіряли по тим ключам, що нам треба
 *
 * А ті ключі, які будуть у масиві $fillable - перевірялись на їх наявність в глобальному масиві $_POST, та у разі їх
 * знаходження, потраплями в масив $data
 */
function checkFillable(array $fillable = []):array
{
    $data = [];
    foreach ($_POST as $key => $value) {
        if (in_array($key, $fillable)) {
            $data[$key] = $value;
        }
    }

    return $data;
}