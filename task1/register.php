<?php
$host = 'localhost';
$dbname = 'lab6';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($name) || empty($email) || empty($password)) {
    echo json_encode(array("message" => "All fields are required"));
    exit;
}

if(strlen($password) < 6) {
    echo json_encode(array("message" => "Password should be at least 6 characters long"));
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(array(':email' => $email));
if($stmt->rowCount() > 0) {
    echo json_encode(array("message" => "Email already exists"));
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
$stmt->execute(array(':name' => $name, ':email' => $email, ':password' => $hashedPassword));

if($stmt) {
    echo json_encode(array("message" => "New record created successfully"));
} else {
    echo json_encode(array("message" => "Error: Unable to insert record"));
}

$conn = null;
?>
