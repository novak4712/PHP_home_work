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
        $arrLogin [] = substr($log, 8);
    }

    $arrStr = implode($arrLogin);   // склеиваю массив в строку
    $str = explode(' ', $arrStr); //  Разбиваю строку с помощью разделителя
    $str2 = explode(' ', $login);  //  Разбиваю строку с помощью разделителя
    $res = array_intersect($str, $str2);  //   проверяю совпадения логинов

    if($res){                        //   если совпал логин выдаю ошибку
        $error [] = "такой логин уже существует";
    }
     //  решение не очень, потому что если не ввести логин, то тоже выдаст ошибку что логин существует,
    // но суть остаеться рабочей в файл не запишиться

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
