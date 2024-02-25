<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лр № 2 - Завд. 1.3 Кравченко Катерина ІПЗ-22-2</title>
</head>
<body>

<form method="post">
    <label for="filePath">Шлях до файлу:</label>
    <input type="text" name="filePath" id="filePath" required>
    <br>

    <input type="submit" value="Виділити ім'я без розширення">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filePath = $_POST["filePath"];
    $pathInfo = pathinfo($filePath);
    $fileNameWithoutExtension = $pathInfo['filename'];
    echo "<p>Ім'я файлу без розширення: $fileNameWithoutExtension</p>";
}
?>

</body>
</html>
