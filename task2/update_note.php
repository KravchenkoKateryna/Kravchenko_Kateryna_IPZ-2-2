<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=lab6", 'root', '');
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data["id"];
    $title = $data["title"];
    $text = $data["text"];
    $stmt = $pdo->prepare("UPDATE notes SET title = :title, text = :text WHERE id = :id");
    $stmt->execute(['title' => $title, 'text' => $text, 'id' => $id]);
    http_response_code(200);
} catch (PDOException $e) {
    http_response_code(500);
    die("Error: " . $e->getMessage());
}
?>
