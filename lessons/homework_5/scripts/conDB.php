<?php
//   скрипт для подключения к базе данных
$server_name = "localhost";

$DB_name = "DB_USERS";

$dsn = "mysql:host=$server_name; dbname=$DB_name";

$login_server = "root";

$password_server = "";

try {
    $con = new PDO($dsn, $login_server, $password_server);
    echo "Соединение удалось " . "</br>";
} catch (PDOException $e) {
    echo "Соединение не удалось " . $e->getMessage() . "</br>";
}

?>