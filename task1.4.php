<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лр № 2 - Завд. 1.4 Кравченко Катерина ІПЗ-22-2</title>
</head>
<body>

<form method="post">
    <label for="date1">Дата 1 (День-Місяць-Рік):</label>
    <input type="text" name="date1" id="date1" placeholder="ДД-ММ-РРРР" required>
    <br>

    <label for="date2">Дата 2 (День-Місяць-Рік):</label>
    <input type="text" name="date2" id="date2" placeholder="ДД-ММ-РРРР" required>
    <br>

    <input type="submit" value="Визначити кількість днів">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1String = $_POST["date1"];
    $date2String = $_POST["date2"];

    $date1 = DateTime::createFromFormat('d-m-Y', $date1String);
    $date2 = DateTime::createFromFormat('d-m-Y', $date2String);

    if ($date1 && $date2) {
        $interval = $date1->diff($date2);
        $daysDifference = $interval->days;

        echo "<p>Між датами $date1String та $date2String пройшло $daysDifference днів</p>";
    } else {
        echo "<p>Помилка у введенні дат!</p>";
    }
}
?>

</body>
</html>
