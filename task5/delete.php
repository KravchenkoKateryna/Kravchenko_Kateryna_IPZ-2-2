<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginToDelete = $_POST["login"];
    $passwordToDelete = $_POST["password"];

    $userDirectoryToDelete = "users/" . $loginToDelete;

    if (file_exists($userDirectoryToDelete) && is_dir($userDirectoryToDelete)) {
        rrmdir($userDirectoryToDelete);
        echo "Папка для користувача '$loginToDelete' була вилучена разом з усім вмістом.";
    } else {
        echo "Папки для користувача '$loginToDelete' не існує.";
    }
}

function rrmdir($dir) {
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file))
            rrmdir($file);
        else
            unlink($file);
    }
    rmdir($dir);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вилучення</title>
</head>
<body>
<h2>Вилучення папки користувача</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="login">Логін:</label>
    <input type="text" name="login" id="login" required>
    <br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" value="Вилучити папку">
</form>
</body>
</html>
