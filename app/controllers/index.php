<?php

/**
 * @var Db $db
 */

use core\database\Db;

$posts = $db->query("SELECT * FROM posts ORDER BY id ASC")->findAll();
$recent_posts = $db->query("SELECT * FROM posts ORDER BY id ASC LIMIT 3")->findAll();

$title = 'My blog :: Index';

require_once VIEWS . "/index.tpl.php";