<?php
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'homeuser',
    '1');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $position, $salary]);
}

$sql = "SELECT * FROM employees";
$stmt = $pdo->query($sql);
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Management</title>
</head>
<body>
<h1>Employees Management</h1>

<h2>Add Employee</h2>
<form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br><br>

    <label for="position">Position:</label>
    <input type="text" name="position" id="position" required><br><br>

    <label for="salary">Salary:</label>
    <input type="number" name="salary" id="salary" required><br><br>

    <button type="submit">Add Employee</button>
</form>

<h2>Employees List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Salary</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?= $employee['id'] ?></td>
            <td><?= $employee['name'] ?></td>
            <td><?= $employee['position'] ?></td>
            <td><?= $employee['salary'] ?></td>
            <td>
                <a href="edit.php?id=<?= $employee['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $employee['id'] ?>" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<form action="statistics.php" method="GET">
    <button type="submit">Statistics</button>
</form>
</body>
</html>
