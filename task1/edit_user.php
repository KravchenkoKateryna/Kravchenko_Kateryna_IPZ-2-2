<?php
header('Content-Type: application/json');

try {
    $conn = new PDO("mysql:host=localhost;dbname=lab6", 'root', '');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    $hashed_password = password_hash($data['newPassword'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
    $stmt->execute([ $data['newName'], $data['newEmail'], $hashed_password, $data['userId']]);

    echo json_encode(['success' => true, 'message' => 'Дані користувача успішно оновлено.']);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}