<?php

$id = $_GET['id'] ?? 0;

$post = getDbConnection()->query("SELECT * FROM posts WHERE `id`=:id", [":id" => $id])->findOrFail();
$recent_posts = getDbConnection()->query("SELECT * FROM posts ORDER BY :id ASC LIMIT 3", [":id" => $id])->findAll();

$title = "My blog :: {$post['title']}";

require_once VIEWS . "/post.tpl.php";