<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма коментарів</title>
</head>
<body>
<h2>Додати коментар</h2>
<form action="comments.php" method="post">
    <label for="name">Ім'я:</label>
    <input type="text" name="name" required>
    <br>
    <label for="comment">Коментар:</label>
    <textarea name="comment" rows="4" required></textarea>
    <br>
    <input type="submit" value="Додати коментар">
</form>

<h2>Поточні коментарі</h2>
<?php include 'display_comments.php'; ?>
</body>
</html>
