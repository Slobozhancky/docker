<?php

/**
 * Це проста перевірка на те, щоб ми могли розуміти, яким саме чином були відправлені дані
 * Точніше так, ми маємо сторінку create-post.tpl.php - на якій в нас є форма, з мотодом POST, а
 * її action зсилається сама на себе (якщо цей action явно не сказаний то сам на себе), ну і ми робимо перевірку
 * $_SERVER['REQUEST_METHOD'] == "POST", що якщо ми отримали запит методом POST, то відобразимо дані. А у нашому випадку, будемо виконувати запит в базу
 *
 */


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fillable = ['title', 'excerpt', 'content'];

    $posts = checkFillable($fillable);

    // validation

    /**
     * Знову таки дуже проста перевірка на те, чи не пусті значення масиву $posts
     * Якщо пусті, то будемо ці значення записувати у масив $errors
     */

    $errors = [];

    foreach ($posts as $post_key => $post_value) {
        if (empty(trim($post_value))) {
            $errors[$post_key] = "$post_key values is empty";
        }
    }

    $slug = trim(strtolower(str_replace(' ', '-', $posts['title'])), '-');

    if (empty($errors)) {
        getDbConnection()->query(
            "INSERT INTO posts(`title`, `excerpt`, `content`, `slug`) VALUES(?,?,?,?)",
            [$posts['title'], $posts['excerpt'], $posts['content'], $slug]
        );
    }
}


$title = "My Blog :: Create Post";

require_once VIEWS . "/create-post.tpl.php";