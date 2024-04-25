<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $city = $_POST["city"];

    $pdo = new PDO('mysql:host=localhost;dbname=lab5', 'root', '');

    // Перевірка наявності користувача в базі
    $check_query = "SELECT * FROM users WHERE username=? OR email=?";
    $sth_check = $pdo->prepare($check_query);
    $sth_check->execute(array($username, $email));
    $user_check = $sth_check->fetch(PDO::FETCH_ASSOC);

    if ($user_check) {
        echo "Користувач з таким ім'ям користувача або email вже існує!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO users (username, password, email, first_name, last_name, age, gender, country, city) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sth_insert = $pdo->prepare($insert_query);
        $result = $sth_insert->execute(array(
            $username,
            // Вставляємо хешований пароль
            $hashed_password,
            $email,
            $first_name,
            $last_name,
            $age,
            $gender,
            $country,
            $city
        ));

        if ($result) {
            echo "Реєстрація пройшла успішно!";
            header('Location: index.php');
            exit();
        } else {
            echo "Помилка при реєстрації: " . $pdo->errorInfo()[2];
        }
    }

    $pdo = null;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
<form action="" method="post">
    <label for="username">Логін:</label><br>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="first_name">Ім'я:</label><br>
    <input type="text" id="first_name" name="first_name" required><br>

    <label for="last_name">Прізвище:</label><br>
    <input type="text" id="last_name" name="last_name" required><br>

    <label for="age">Вік:</label><br>
    <input type="number" id="age" name="age" required><br>

    <label for="gender">Стать:</label><br>
    <select id="gender" name="gender" required>
        <option value="Male">Чоловік</option>
        <option value="Female">Жінка</option>
        <option value="Other">Інше</option>
    </select><br>

    <label for="country">Країна:</label><br>
    <input type="text" id="country" name="country" required><br>

    <label for="city">Місто:</label><br>
    <input type="text" id="city" name="city" required><br>

    <input type="submit" value="Зареєструватися">
</form>
</body>
</html>
