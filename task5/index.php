<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    $userDirectory = "users/" . $login;

    if (!file_exists($userDirectory)) {
        mkdir($userDirectory);

        $subdirectories = ["video", "music", "photo"];
        foreach ($subdirectories as $subdirectory) {
            mkdir($userDirectory . "/" . $subdirectory);
        }

        file_put_contents($userDirectory . "/video/video1.mp4", "Content of video1.mp4");
        file_put_contents($userDirectory . "/music/music1.mp3", "Content of music1.mp3");
        file_put_contents($userDirectory . "/photo/photo1.jpg", "Content of photo1.jpg");

        echo "Папка для користувача '$login' була успішно створена з підпапками та файлами.";
    } else {
        echo "Папка для користувача '$login' вже існує. Виберіть інше ім'я.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Створення папки користувача</title>
</head>
<body>
<h2>Створення папки користувача</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="login">Логін:</label>
    <input type="text" name="login" id="login" required>
    <br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" value="Створити папку">
</form>
</body>
</html>
