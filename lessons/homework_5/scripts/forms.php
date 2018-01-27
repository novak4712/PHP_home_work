<?php
require_once "conDB.php";
require_once "insert.php";
require_once "update.php";
require_once "delete.php";
require_once "search.php";

$id = '';
$email = '';
$login = '';
$password = '';

function getPosts()   // создаем функцию которая создает массив из значений наших input и преобразуем в HTML сущность и обрезаем теги
{
    $posts = [];
    $posts[0] = htmlentities(strip_tags($_POST['id']));
    $posts[1] = htmlentities(strip_tags($_POST['email']));
    $posts[2] = htmlentities(strip_tags($_POST['login']));
    $posts[3] = htmlentities(strip_tags($_POST['password']));
    return $posts;
}

?>