<!DOCTYPE html>
<html>
<head>
    <title>Лр № 2 - Завд. 1.1 Кравченко Катерина ІПЗ-22-2</title>
</head>
<body>

<?php
$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = htmlspecialchars($_POST["text"]);
    $find = htmlspecialchars($_POST["find"]);
    $replace = htmlspecialchars($_POST["replace"]);

    $result = str_replace($find, $replace, $text);
}
?>

<form method="post">
    <label>Текст:</label>
    <input type="text" name="text" required><br>

    <label>Знайти:</label>
    <input type="text" name="find" required><br>

    <label>Замінити на:</label>
    <input type="text" name="replace" required><br>

    <input type="submit" value="Виконати">
</form>

<?php
if ($result != '') {
    echo "<p>Результат: " . $result . "</p>";
}
?>

</body>
</html>
