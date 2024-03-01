<?php
$fontSize = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : 'medium';

if (isset($_GET['font_size'])) {
    $fontSize = $_GET['font_size'];

    setcookie('font_size', $fontSize, time() + 3600, '/');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завдання 1 Кравченко Катерина</title>
    <style>
        body {
            font-size: <?php echo $fontSize; ?>;
        }
    </style>
</head>
<body>
<h1>Виберіть шрифт:</h1>
<ul>
    <li><a href="?font_size=large">Великий шрифт</a></li>
    <li><a href="?font_size=medium">Середній шрифт</a></li>
    <li><a href="?font_size=small">Маленький шрифт</a></li>
</ul>
</body>
</html>