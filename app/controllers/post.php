<?php

/**
 * @var Db $db
 */

use core\database\Db;

$id = $_GET['id'] ?? 0;

$post = $db->query("SELECT * FROM posts WHERE `id`=:id", [":id" => $id])->findOrFail();
$recent_posts = $db->query("SELECT * FROM posts ORDER BY :id ASC LIMIT 3", [":id" => $id])->findAll();

$title = "My blog :: {$post['title']}";

require_once VIEWS . "/post.tpl.php";