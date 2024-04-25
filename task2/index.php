<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'homeuser',
'1');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT * FROM tov";
    $result = $pdo->query($sql);
    $items = $result->fetchAll();

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Товари</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Список товарів</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Опис</th>
        <th>Ціна</th>
        <th>Категорія</th>
    </tr>
    <?php foreach ($items as $item) : ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['Назва'] ?></td>
            <td><?= $item['Опис'] ?></td>
            <td><?= $item['Ціна'] ?></td>
            <td><?= $item['Категорія'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<form action="insert.php">
    <div>
        <button>Додати запис</button>
    </div>
    <br>
</form>
<form action="delete.php" method="post">
    <button type="submit" name="delete">Видалити запис</button>
    <input type="number" name="idToDelete" placeholder="ID запису" required>
</form>
</body>
</html>
