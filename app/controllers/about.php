<?php

require_once ROOT . '/vendor/autoload.php';

$post = [
    'post' => 'Some big post'
];

$recent_posts = [
    1 => [
        "slug" => "title - 1",
    ],
    2 => [
        "slug" => "title - 2",
    ],
    3 => [
        "slug" => "title - 3",
    ],
    4 => [
        "slug" => "title - 4",
    ],
    5 => [
        "slug" => "title - 5",
    ],
    6 => [
        "slug" => "title - 6",
    ],
];


require_once VIEWS . "/about.tpl.php";
