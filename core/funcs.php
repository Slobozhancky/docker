<?php

/**
 * http_response_code - має повернути бразеру помлку, у разі того, якщо сторінка не знайдена, а не тільки вивсти її вид
 */
function aboard($code = 404): void
{
    http_response_code($code);
    require_once VIEWS . "/errors/{$code}.tpl.php";
    die();
}