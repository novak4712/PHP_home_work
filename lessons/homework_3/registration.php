<?php
if (isset($_POST["submit"])) {

    if (empty($_POST["first_name"])) {
        $first_name = "enter first name";
    } else {
        $first_name = $_POST["first_name"];
    }
    if (empty($_POST["second_name"])) {
        $second_name = "enter second name";
    } else {
        $second_name = $_POST["second_name"];
    }
    if (empty($_POST["Date_of_Birth"])) {
        $Date_of_Birth = "enter your date of birth";
    } else {
        $Date_of_Birth = $_POST["Date_of_Birth"];
    }
    if (empty($_POST["Login"])) {
        $Login = "enter login";
    } else {
        $Login = $_POST["Login"];
    }
    if (empty($_POST["password"])) {
        $password = "enter password";
    } else {
        $password = $_POST["password"];
    }
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
<div>
    Your first name: <?php echo $first_name; ?><br>
    Your second name: <?php echo $second_name; ?><br>
    Your date of birth: <?php echo $Date_of_Birth; ?><br>
    Your login: <?php echo $Login; ?><br>
    Your password: <?php echo $password; ?><br>
</div>
</body>
</html>
