<?php

require_once "conDB.php";

if (isset($_POST['search'])) {        //  выборка данных пользователя из таблицы по id
    $data = getPosts();    // получаем данные из формы
    if (empty($data[0])) {  // проверяем было ли введено поле id
        echo "Введите ID пользователя для поиска" . "</br>";
    } else {
        $search_info = $con->prepare("SELECT * FROM users WHERE id = :id"); // отбераем все данные из таблицы users по id
        $search_info->execute(array('id' => $data[0]));
        $user = $search_info->fetch();   //обрабатываем результат запроса, возвращаем ассоциативный массив и записываем в переменную
        if (empty($user)) {  // проверяем переменную на пустоту
            echo "Пользователя с таким ID не существует" . "</br>";
        }
        // выводим результат поиска
        echo "<p>" . "ID: " . $id = $user[0] . "</p>";
        echo "<p>" . "Email: " . $email = $user[1] . "</p>";
        echo "<p>" . "Login: " . $login = $user[2] . "</p>";
        echo "<p>" . "Password: " . $password = $user[3] . "</p>";

    }

}