<?php
header('Content-Type: application/json');
try {
    $pdo = new PDO("mysql:host=localhost;dbname=lab6", 'root', '');

    $data = json_decode(file_get_contents("php://input"), true);
    $title = $data["title"];
    $text = $data["text"];

    $stmt = $pdo->prepare("INSERT INTO notes (title, text) VALUES (:title, :text)");
    $stmt->execute(['title' => $title, 'text' => $text]);

    http_response_code(200);
} catch (PDOException $e) {
    http_response_code(500);
    die("Error: " . $e->getMessage());
}
?>
