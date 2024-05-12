<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab7";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("Location: personal_page.php");
} else {
    $_SESSION['error_message'][] = "Помилка входу. Будь ласка, спробуйте ще раз.";
    header("Location: index.php");
}

$conn->close();
?>
