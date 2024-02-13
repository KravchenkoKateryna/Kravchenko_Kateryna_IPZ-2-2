<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторна робота 1.Кравченко Катерина ІПЗ-22-2</title>
</head>
<body>

<h2>Завдання 2:</h2>
<?php
echo "<p>Полину в мріях в купель океану,</p>";
echo "<p>Відчую <b>шовковистість</b> глибини,</p>";
echo "<p>Чарівні мушлі з дна собі дістану,</p>";
echo "<p>&emsp;Щоб <i><b>взимку</b></i></p>";
echo "<p>&emsp;&emsp;<u>тішили</u></p>";
echo "<p>&emsp;&emsp;&emsp;мене</p>";
echo "<p>&emsp;&emsp;&emsp;&emsp;вони…</p>";
?>

<h2>Завдання 3:</h2>
<?php
$sumUAH = 2306;
$exchange = 0.038;
$sumUSD = $sumUAH * $exchange;
echo "<p>{$sumUAH} грн. можна обміняти на {$sumUSD} доларів!</p>";
?>

<h2>Завдання 4:</h2>
<?php
$monthNumber = 6;

// Визначення сезону
if ($monthNumber >= 1 && $monthNumber <= 2 || $monthNumber == 12) {
    $season = "Зима";
} elseif ($monthNumber >= 3 && $monthNumber <= 5) {
    $season = "Весна";
} elseif ($monthNumber >= 6 && $monthNumber <= 8) {
    $season = "Літо";
} elseif ($monthNumber >= 9 && $monthNumber <= 11) {
    $season = "Осінь";
} else {
    $season = "Такого місяця не існує!";
}

echo "<p>Номер місяця: {$monthNumber}</p>";
echo "<p>Сезон: {$season}</p>";
?>

<h2>Завдання 5:</h2>
<?php
$letter = 'A';

// Перевірка, чи не є це цифра або знак
if (ctype_alpha($letter) && !is_numeric($letter)) {
    $letter = strtoupper($letter);

    switch ($letter) {
        case 'A':
        case 'E':
        case 'I':
        case 'O':
        case 'U':
            $result = "голосна літера";
            break;
        default:
            $result = "приголосна літера";
            break;
    }

    echo "<p>Символ: {$letter}</p>";
    echo "<p>Це {$result}</p>";
} else {
    echo "<p>Введений символ не є буквою.</p>";
}
?>

<h2>Завдання 6:</h2>
<?php
$randomNum = mt_rand(100, 999);

$digitSum = array_sum(str_split($randomNum));

$reversedNum = (int)strrev((string)$randomNum);

$digits = str_split($randomNum);
rsort($digits);
$maximizedNum = (int)implode('', $digits);

echo "<p>Випадкове тризначне число: $randomNum</p>";
echo "<p>1. Сума цифр: $digitSum</p>";
echo "<p>2. Число в зворотному порядку: $reversedNum</p>";
echo "<p>3. Переставлене до найбільшого числа: $maximizedNum</p>";
?>

<h2>Завдання 7(1):</h2>
<?php
function printColorTable($rows, $columns) {
    echo "<table border='1'>";

    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr>";

        for ($j = 1; $j <= $columns; $j++) {
            $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            echo "<td style='background-color: $color; width: 30px; height: 30px;'></td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}
printColorTable(3, 3);
?>

<h2>Завдання 7(2):</h2>
<?php
function printRedSquares() {
    echo "<div style='position: relative; background-color: black; width: 300px; height: 300px;'>";

    $numberOfSquares = mt_rand(1, 10);

    for ($i = 0; $i < $numberOfSquares; $i++) {
        $positionX = mt_rand(0, 250);
        $positionY = mt_rand(0, 250);
        $size = mt_rand(20, 50);

        echo "<div class='red-square' style='position: absolute; left: {$positionX}px; top: {$positionY}px; width: {$size}px; height: {$size}px; background-color: red;'></div>";
    }

    echo "</div>";
}
printRedSquares();
?>


</body>
</html>
