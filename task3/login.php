<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lab7";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error = "Неправильний логін або пароль!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід</title>
</head>
<body>
<h1>Вхід</h1>
<?php if(isset($error)) { ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php } ?>
<form method="post" action="">
    <label for="username">Логін:</label>
    <input type="text" name="username" id="username" required><br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required><br>
    <button type="submit">Увійти</button>
</form>
</body>
</html>
