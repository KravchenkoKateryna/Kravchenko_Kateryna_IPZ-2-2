<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=lab6", 'root', '');

    $stmt = $pdo->query("SELECT * FROM notes");
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($notes);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
