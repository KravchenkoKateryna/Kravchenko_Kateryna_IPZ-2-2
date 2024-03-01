<!DOCTYPE html>
<html>
<head>
    <title>Лр№2 - Завд. 1.2 Кравченко Катерина</title>
</head>
<body>

<h2>Завдання 2. Сортування назв міст за алфавітом</h2>

<form method="post">
    <label>Назви міст:</label>
    <input type="text" name="cities" required><br>

    <input type="submit" value="Переставити за алфавітом">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cities = explode(" ", $_POST["cities"]);
    sort($cities);

    echo "<p>Відсортовані назви міст: " . implode(" ", $cities) . "</p>";
}
?>

</body>
</html>
