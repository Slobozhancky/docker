<?php

use core\classes\Db;

require_once dirname(__DIR__) . '/config/constants.php';
require_once ROOT . '/vendor/autoload.php';
require_once CORE . '/funcs.php';
require CONFIG . '/db_conf.php';

dd((new Db())->getConnection());

/**
 * require_once CORE . '/router.php'; - конфігурації самого роутеру
 */
require_once CORE . '/router.php';






