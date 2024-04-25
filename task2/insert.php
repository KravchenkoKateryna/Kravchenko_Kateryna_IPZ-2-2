<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'homeuser', '1');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        $sql = "INSERT INTO tov (Назва, Опис, Ціна, Категорія) VALUES (:title, :description, :price, :category)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();

        echo "Новий запис успішно додано.";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Product</title>
</head>
<body>
<h2>Додати новий товар</h2>
<form method="post">
    <label for="title">Назва:</label><br>
    <input type="text" id="title" name="title" required><br>

    <label for="description">Опис:</label><br>
    <textarea id="description" name="description" required></textarea><br>

    <label for="price">Ціна:</label><br>
    <input type="number" id="price" name="price" step="0.01" required><br>

    <label for="category">Категорія:</label><br>
    <input type="text" id="category" name="category" required><br>

    <input type="submit" value="Додати">
</form>
</body>
</html>
