<?php
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'homeuser', '1');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
} else {
    echo "Invalid request.";
    exit;
}
?>
<?php
