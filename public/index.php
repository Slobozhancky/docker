<?php
use core\classes\Db;

require_once dirname(__DIR__) . '/config/constants.php';
require_once ROOT . '/vendor/autoload.php';
require_once CORE . '/funcs.php';


$dbconf = require CONFIG . '/db_conf.php';

$connected = new Db($dbconf);
dd($connected);
/**
 * require_once CORE . '/router.php'; - конфігурації самого роутеру
 */
require_once CORE . '/router.php';






