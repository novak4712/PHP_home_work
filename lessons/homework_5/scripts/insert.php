<?php

require_once "conDB.php";

if (isset($_POST['insert'])) {        //  записываем данные пользователя в таблицу
    $data = getPosts();    // получаем данные из формы
    if (empty($data[1]) || empty($data[2]) || empty($data[3])) {  // проверяем были ли введены данные в поля email, login и password
        echo "Введите Данные для записи в базу данных" . "</br>";
    } else {
        $insert_data = $con->prepare("INSERT INTO users (email, login, password) VALUES (:email, :login, :password)");
        $insert_data->execute(array(
            'email' => $data[1],
            'login' => $data[2],
            'password' => $data[3]
        ));

        if ($insert_data){
            echo "Данные записались успешно" . "</br>";
        }

    }
}
?>