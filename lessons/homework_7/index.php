<?php
spl_autoload_register(function ($class) {
    include $class . '.php';
});

$msg = [];
$db = new DB();
$formLogin = new Login($_POST["login"]);
$formPass = new Password($_POST["password"], $_POST["password_confirm"]);


$checkLengthLogin = $formLogin->checkLength(4, 20);
$checkSpaceLogin = $formLogin->checkSpace();
$checkLogin = $formLogin->checkLogin();
$checkLoginExists = $formLogin->checkLoginExists();
$validateLogin = $formLogin->validate();

$checkLengthPassword = $formPass->checkLength(4, 20);
$checkSpacePassword = $formPass->checkSpace();
$checkPassword = $formPass->checkPassword();
$validatePassword = $formPass->validate();
$passwordMatch = $formPass->passwordMatch();

if (isset($_POST["submit"])) {
    if (!$validateLogin || !$validatePassword) {
        $msg[] = 'заполните все поля';
    } elseif (!$checkLengthLogin) {
        $msg[] = 'логин должен быть не менее 4 и не более 20 символов';
    } elseif (!$checkSpaceLogin) {
        $msg[] = 'логин не должен содержать пробелов';
    } elseif (!$checkLogin) {
        $msg[] = 'логин должен состоять из цифр, букв латинского алфавита верхнего и нижнего регистра, и знака _';
    } elseif ($checkLoginExists) {
        $msg[] = 'Такой пользователь уже существует';
    } else {
        $resultLog = $_POST["login"];
    }

    if (!$passwordMatch) {
        $msg[] = 'пороль не совпадает';
    } elseif (!$checkLengthPassword) {
        $msg[] = 'пороль должен быть не менее 4 и не более 20 символов';
    } elseif (!$checkSpacePassword) {
        $msg[] = 'пороль не должен содержать пробелов';
    } elseif (!$checkPassword) {
        $msg[] = 'пороль должен состоять из цифр, букв латинского алфавита верхнего и нижнего регистра, и знака _';
    } else {
        $resultPass = $_POST["password"];
    }

    if ($resultLog && $resultPass) {
        $insertRow = $db->insertRow('INSERT INTO users (login, password) VALUE (?, ?)', [$resultLog, $resultPass]);
    }
//    var_dump($result);

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Регистрация пользователя</h1>
<br/>
<br/>
<?php
foreach ($msg as $error) {
    echo "<p style='color: red'>$error</p>";
}
?>
<br/>
<br/>
<form method="post">
    Login: <input type="text" name="login" value=""/> <br/><br/>
    Password: <input type="password" name="password" value=""/> <br/><br/>
    Confirm Password: <input type="password" name="password_confirm" value=""/> <br/><br/>
    <input type="submit" name="submit" value="зарегистрироваться"/>
</form>
</body>
</html>