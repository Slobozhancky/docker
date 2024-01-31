<?php

require_once dirname(__DIR__) . '/config/constants.php';
require_once ROOT . '/vendor/autoload.php';
require_once CORE . '/funcs.php';

/**
 * trim($_SERVER['REQUEST_URI'], '/'); - це й запис про те, що при вказуванні адреси, в строчці URL вона нам буде показувати інфо, на якій ми зараз знаходимось сторінці
 * якщо ти не розумієш про що ссаме мова, то виведи за допомогою dd() та подивись що повернуться
 * А функція trim() просто обріще слеші, щоб нам сручніше було робити перевірку того, яка саме у нас адреса була введена
 */
$uri = trim($_SERVER['REQUEST_URI'], '/');

if ($uri === '') {
    require_once CONTROLLERS . '/index.php';
} elseif ($uri == "about") {
    require_once CONTROLLERS . '/about.php';
} else {

    /**
     * http_response_code - має повернути бразеру помлку, у разі того, якщо сторінка не знайдена, а не тільки вивсти її вид
     */
    aboard();
}






