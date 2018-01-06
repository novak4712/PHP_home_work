<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        div {
            text-align: center;
            margin: 20px;
        }

        table {
            border: 2px solid black;
            background: silver;
        }

        td, tr {
            text-align: center;
            padding: 3px;
        }

        tr {
            background: #4682b4;
            color: white;
            border-bottom: 2px solid black;
        }
    </style>
</head>
<body>

<?php
//задача 1
echo "<div>" . "Функция,  принимающая  массив  строк  и  выводящая  каждую строку  в  отдельном параграфе." . "</div>";

$arr = ["red", "black", "orange", "yellow"];
function arrShow($arr)
{
    if (is_array($arr)) {
        foreach ($arr as $value) {
            echo "<p>" . $value . "</p>";
        }
    } else {
        echo "введите массив";
        return;
    }

}

arrShow($arr);

// задача 2
echo "<div>" . "Функция, принимающая 2 параметра ­ массив чисел и строку, обозначающую арифметическое действие,
которое нужно выполнить со всеми элементами массива. Функция должна выводить результат на экран." . "</div>";

$arrNum = [1, 2, 3, 4, 5, 6, 7];
$string = "+";
function arrSum($arrNum, $string)
{
    $count = 0;
    foreach ($arrNum as $key => $item) {
        if ($key > 0) {
            switch ($string) {
                case "-":
                    $count -= $item;
                    break;
                case "+":
                    $count += $item;
                    break;
                case "*":
                    $count *= $item;
                    break;
                case "/":
                    $count /= $item;
                    break;
            }
        } else {
            $count = $item;
        }
    }
    echo $count;
}

arrSum($arrNum, $string);

//задача 3
echo "<div>" . "Функция, принимающая переменное число аргументов, но первым аргументов
обязательно должна быть строка, обозначающее арифметическое действие,
которое необходимо выполнить со всеми передаваемыми аргументами." . "</div>";

function arrSumN($str)
{
    if (is_string($str)) {
        if (in_array($str, array("-", "+", "/", "*"))) {
            $arr = func_get_args();
            $i = $arr[0];
            array_shift($arr);
            function arrSum2($arrNum, $string)
            {
                $count = 0;
                foreach ($arrNum as $key => $item) {
                    if ($key > 0) {
                        switch ($string) {
                            case "-":
                                $count -= $item;
                                break;
                            case "+":
                                $count += $item;
                                break;
                            case "*":
                                $count *= $item;
                                break;
                            case "/":
                                $count /= $item;
                                break;
                        }
                    } else {
                        $count = $item;
                    }
                }
                echo $count;
            }

            arrSum2($arr, $i);
        } else {
            echo "Первый аргумент должен быть математическим знаком";
            return;
        }
    } else {
        echo "Первый аргумент должен быть строкой";
        return;
    }
}

arrSumN("*", 1, 2, 3, 4, 5, 6, 7);

//задача 4
echo "<div>" . "Функция принимающая два параметра ­ 2 целых числа. Если вводятся не 2 целых
числа ­ то функция должна выводить ошибку на экран. Если пользователь вводит 2
целых числа ­ то ему должна отрисовываться таблица умножение размером со
значения параметров, переданных функции. Например, если вызовем нашу
функцию таким образом tabl​(4,3), то функция нарисует следующую таблицу
1 2 3 4
2 4 6 8
3 6 9 12" . "</div>";

function multiTable($num1, $num2)
{
    if (gettype($num1) == "integer" && gettype($num2) == "integer") {
        $table = "";
        $table .= "<table>";
        for ($i = 1; $i < $num2 + 1; $i++) {
            $table .= "<tr>";
            for ($j = 1; $j < $num1 + 1; ++$j) {
                $table .= "<td>";
                $table .= $j * $i;
                $table .= "</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</table>";
        echo $table;
    } else {
        echo "введите целое число";
        return;
    }
}

multiTable(9, 6);

//задача 5
echo "<div>" . "Функция, принимающая в качестве аргумента массив чисел вида: 1, 22, 5, 66, 3, 57
и возвращает массив по возрастанию: 1, 3, 5, 22, 57, 66." . "</div>";

$arr = [1, 22, 5, 66, 3, 57];
function sorting($arr)
{
    echo "полученный массив: " . implode(", ", $arr) . "<br>";
    if (is_array($arr)) {
        usort($arr, function ($a, $b) {
            if ($a == $b) {
                return 0;
            } else if ($a < $b) {
                return -1;
            } else {
                return 1;
            }
        });
        echo "отсортированный массив: " . implode(", ", $arr) . "<br>";
    } else {
        echo "введите массив чисел";
        return;
    }

}

sorting($arr);

//задача 6
echo "<div>" . "Рекурсивную функцию, принимающую два целых числа ­ начальное значение и
конечное значение. Например, первый аргумент 10, второй ­ 35. Функция должна
вывести на список нечетных чисел от 10 до 35." . "</div>";
$num1 = 10;
$num2 = 35;
function oddBust($num1, $num2)
{
    if (gettype($num1) == "integer" && gettype($num2) == "integer") {
        for ($i = $num1; $i < $num2; $i++) {
            if ($i % 2 != 0) {
                echo $i . ", ";
            }
        }
    } else {
        echo "введите целое число";
        return;
    }
}

oddBust($num1, $num2);

//задача 7
echo "<div>" . "Функция, получающая 1 параметр (строку) и возвращающая TRUE ­ если строка
является палиндромом, FALSE ­ в противном случае" . "</div>";

$polindrom = "заказ";
function checkPolindrom($string)
{
    function utf8_strrev($str){
        preg_match_all("/./us", $str, $ar);
        return join("", array_reverse($ar[0]));
    }
    $reversArr = utf8_strrev($string);
    if (gettype($string) == "string") {
        if ($reversArr == $string) {
            echo "полиндром";
            return true;
        } else {
            echo "не полиндром";
            return false;
        }
    } else {
        echo "введите строку";
        return;
    }
}

checkPolindrom($polindrom);
?>
</body>
</html>