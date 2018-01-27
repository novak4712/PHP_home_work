<?php

require_once "conDB.php";

if (isset($_POST['delete'])) {        //  удаление данных пользователя из таблицы по id
    $data = getPosts();    // получаем данные из формы
    if (empty($data[0])) {  // проверяем было ли введено поле id
        echo "Введите ID пользователя для удаления" . "</br>";
    } else {
        $delete_info = $con->prepare("DELETE FROM users WHERE id = :id"); // удаляем данные из таблицы users по id
        $delete_info->execute(array('id' => $data[0]));
        if ($delete_info){
            echo "Данные пользователя удалены успешно" . "</br>";
        }
    }

}