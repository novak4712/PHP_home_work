<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        section {
            display: flex;
            justify-content: center;
            padding-top: 300px;
        }
        div {
            width: 200px;
            height: 200px;
            border: 2px solid black;
            margin: 20px;
        }
    </style>
</head>
<body>
<section>
    <?php
    $array = ["red", "blue", "green", "purple", "orange", "pink", "grey"];
    shuffle($array);
    $newArray = array_slice($array, 0, 4);
    foreach ($newArray as &$value) {
        echo "<div style='background: $value'></div>";
    };
    ?>
</section>
</body>
</html>