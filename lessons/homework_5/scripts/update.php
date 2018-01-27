<?php

require_once "conDB.php";

if (isset($_POST['update'])) {        //  обновляем данные пользователя в таблицу
    $data = getPosts();    // получаем данные из формы
    if (empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3])) {  // проверяем были ли введены данные в поля id, email, login и password
        echo "Введите Данные для обновления в базу данных" . "</br>";
    } else {
        $update_data = $con->prepare("UPDATE users SET email = :email, login = :login, password = :password WHERE id = :id");
        $update_data->execute(array(
            'id' => $data[0],
            'email' => $data[1],
            'login' => $data[2],
            'password' => $data[3]
        ));

        if ($update_data){
            echo "Данные обновились успешно" . "</br>";
        }

    }
}