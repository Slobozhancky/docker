<?php
use core\database\Db;

require_once dirname(__DIR__) . '/config/constants.php';
require_once ROOT . '/vendor/autoload.php';
require_once CORE . '/funcs.php';

/**
 * Підключення до бази
 */
$dbconf = require CONFIG . '/db_conf.php';
$db = new Db($dbconf);


/**
 * Нижче приведено приклад, простого запиту до бази, щоб витягнути всі пости
 * За що відповідає функція fetchAll()
 */


/**
 * require_once CORE . '/router.php'; - конфігурації самого роутеру
 */
require_once CORE . '/router.php';






