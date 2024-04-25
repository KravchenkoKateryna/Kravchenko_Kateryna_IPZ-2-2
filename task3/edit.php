<?php
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'homeuser', '1');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET name = ?, position = ?, salary = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $position, $salary, $id]);

    header("Location: index.php");
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->execute([$id]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$employee) {
        echo "Employee not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
<h1>Edit Employee</h1>
<form action="" method="POST">
    <input type="hidden" name="id" value="<?= $employee['id'] ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?= $employee['name'] ?>" required><br><br>
    <label for="position">Position:</label>
    <input type="text" name="position" id="position" value="<?= $employee['position'] ?>" required><br><br>
    <label for="salary">Salary:</label>
    <input type="number" name="salary" id="salary" value="<?= $employee['salary'] ?>" required><br><br>
    <button type="submit">Save Changes</button>
</form>
</body>
</html>
