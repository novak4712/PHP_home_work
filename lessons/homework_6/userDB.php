<?php
require_once 'DB.class.php';  // подключили файл с класом;

$db = new DB();  // создали экземпляр класса данные не передаю потому что я задал по умолчанию и они мне подходят, если другая база данных передаем новые данные для подключения

$getRow = $db->getRow('SELECT * FROM users WHERE id = ?', ['1']); // делаем выборку одной строки по значению

$getRows = $db->getRows('SELECT * FROM users'); // делаем выборку всей таблицы

$insertRow = $db->insertRow('INSERT INTO users (email, login, password) VALUE (?, ?, ?)', ['itstep@mail.by', 'login', '12345']); // делаем запись в таблицу

$updateRow = $db->updateRow('UPDATE users SET email = ?, login = ?, password = ? WHERE id = ?', ['шаг@rambler.ru', 'guest', '5431', '7']); // обновляем существующую запись

$deleteRow = $db->deleteRow('DELETE FROM users WHERE id = ?', [9]); // удаляем запись из таблицы

$db->Dicsonect(); // отключаемся от базы данных

