<?php

require_once ROOT . '/vendor/autoload.php';

$title = "My blog :: About";

$post = [
    'post' => 'Some big post'
];

$recent_posts = getDbConnection()->query("SELECT * FROM posts ORDER BY id ASC LIMIT 3")->findAll();


require_once VIEWS . "/about.tpl.php";
