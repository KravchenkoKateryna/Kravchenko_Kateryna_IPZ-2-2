<?php
header('Content-Type: application/json');

try {
    $conn = new PDO("mysql:host=localhost;dbname=lab6", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $json_str = file_get_contents('php://input');
    $data = json_decode($json_str, true);

    $email = $data['email'];
    $password = $data['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        throw new Exception('Невірна електронна адреса');
    }

    if (!password_verify($password, $user['password'])) {
        throw new Exception('Невірна електронна адреса або пароль.');
    }

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
