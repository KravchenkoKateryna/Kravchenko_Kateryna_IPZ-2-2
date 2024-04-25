<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'homeuser', '1');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $idToDelete = $_POST['idToDelete'];

        $sql = "DELETE FROM tov WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $idToDelete, PDO::PARAM_INT);
        $stmt->execute();

        echo "Запис з ID $idToDelete успішно видалено.";
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
    <title>Delete Product</title>
</head>
<body>
<h2>Видалити ще запис</h2>
<form method="post">
    <label for="idToDelete">ID нового запису для видалення:</label><br>
    <input type="number" id="idToDelete" name="idToDelete" required><br>

    <input type="submit" name="delete" value="Видалити">
</form>
</body>
</html>

