<?php
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'homeuser', '1');

$sqlAvgSalary = "SELECT AVG(salary) AS average_salary FROM employees";
$stmtAvgSalary = $pdo->query($sqlAvgSalary);
$rowAvgSalary = $stmtAvgSalary->fetch(PDO::FETCH_ASSOC);
$averageSalary = $rowAvgSalary['average_salary'];

$sqlEmployeeCount = "SELECT position, COUNT(*) AS employee_count FROM employees GROUP BY position";
$stmtEmployeeCount = $pdo->query($sqlEmployeeCount);
$positions = $stmtEmployeeCount->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
</head>
<body>
<h1>Statistics</h1>

<h2>Average Salary of Employees</h2>
<p><?php echo "Average Salary: $averageSalary"; ?></p>

<h2>Employee Count by Position</h2>
<ul>
    <?php foreach ($positions as $position): ?>
        <li><?php echo "{$position['position']}: {$position['employee_count']}"; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>

