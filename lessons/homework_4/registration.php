<?php
$error = []; //пустой массив для ошибок

if (isset($_POST["submit"])) {
    if (empty($_POST["email"])) {  //  проверил ввели ли адрес
        $error [] = "введите ваш email адрес";
    } else {
        $email = $_POST["email"];
    }

    if ($_POST["login"]) {
        if (mb_strlen($_POST["login"]) < 3) {      //  проверил логин на длинну
            $error [] = "логин должен быть больше 3 символов";
        } else if (mb_strlen($_POST["login"]) > 30) {   //  проверил логин на длинну
            $error [] = "логин должен быть меньше 30 символов";
        } else {
            $login = $_POST["login"];
        }
    } else {
        $error [] = "введите ваш логин";
    }
    $arr = file("users.txt");    // создал массив из файла
    $arrLogin = [];  // пустой массив для логинов
    foreach ($arr as $value) {
        list($mail, $log, $pass) = explode("||", $value); // отобрал из массива файла все логины
        $arrLogin [] = $log;
    }
    $lenLog = "Login: " . $login;

    foreach ($arrLogin as $key) {
        $pos = strripos($key, $lenLog);  // проверил логины на совпадение
        if ($pos) {
            $error [] = "такой логин уже существует";
        }
    }

    if (empty($_POST["password"])) { //  проверил наличие пороля
        $error [] = "введите ваш пароль";
    } else {
        $password = $_POST["password"];
    }

    if (count($error) == 0) {        //  проверил наличие ошибок если их нет то записал в файл
        $file = fopen("users.txt", "a+");
        $user = "Email: " . $email . " || " . "Login: " . $login . " || " . "Password: " . $password . PHP_EOL;
        fwrite($file, $user);
        fclose($file);
    }
    echo '<p style="color:red">';   //  если есть ошибки вывел на экран
    foreach ($error as $value) {
        echo $value . "<br />";
    }
    echo '</p>';
}
?>
