<?php
header('Content-Type: application/json');

try {
    $conn = new PDO("mysql:host=localhost;dbname=lab6", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$data['userId']]);

    echo json_encode(['success' => true, 'message' => 'Користувача успішно видалено.']);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}