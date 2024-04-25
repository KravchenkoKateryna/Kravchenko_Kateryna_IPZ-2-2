<?php
session_start();

if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
    header('location: main.php');
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=lab5', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $sth = $pdo->prepare($sql);
    $sth->execute(array(':username' => $username, ':password' => $password));
    $user = $sth->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['login'] = $username;
        $_SESSION['password'] = $password;
        header("location: main.php");
        exit();
    } else {
        $error = "Неправильний логін або пароль";
    }
}

$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна сторінка</title>
</head>
<body>
<h2>Вхід</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
    <label for="username">Логін:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Увійти">
</form>
<p>Ще не зареєстровані? <a href="register.php">Зареєструватися</a>.</p>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} ?>
</body>
</html>
