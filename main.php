<?php
session_start();

// Перевірка, чи користувач увійшов в систему
if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
    header('location: index.php');
    exit();
}

// Підключення до бази даних
$pdo = new PDO('mysql:host=localhost;dbname=lab5', 'root', '');

// Отримання даних користувача
$username = $_SESSION['login'];
$sql = "SELECT * FROM users WHERE username = :username";
$sth = $pdo->prepare($sql);
$sth->execute(array(':username' => $username));
$user = $sth->fetch(PDO::FETCH_ASSOC);
if (!$user) {
    echo "Помилка: не вдалося отримати дані користувача.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $city = $_POST['city'];

    $update_query = "UPDATE users SET first_name = :first_name, last_name = :last_name, age = :age, gender = :gender, country = :country, city = :city WHERE username = :username";
    $update_sth = $pdo->prepare($update_query);
    $update_sth->execute(array(
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':age' => $age,
        ':gender' => $gender,
        ':country' => $country,
        ':city' => $city,
        ':username' => $username
    ));

    if ($update_sth->rowCount() > 0) {
        $user['first_name'] = $first_name;
        $user['last_name'] = $last_name;
        $user['age'] = $age;
        $user['gender'] = $gender;
        $user['country'] = $country;
        $user['city'] = $city;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
<h2>Вітаємо, <?php echo $user['first_name']; ?>!</h2>
<p>Це головна сторінка після успішного входу в систему.</p>
<p>Ваші дані:</p>
<ul>
    <li>Логін: <?php echo $user['username']; ?></li>
    <li>Email: <?php echo $user['email']; ?></li>
    <li>Ім'я: <?php echo $user['first_name']; ?></li>
    <li>Прізвище: <?php echo $user['last_name']; ?></li>
    <li>Вік: <?php echo $user['age']; ?></li>
    <li>Стать: <?php echo $user['gender']; ?></li>
    <li>Країна: <?php echo $user['country']; ?></li>
    <li>Місто: <?php echo $user['city']; ?></li>
</ul>

<h3>Редагування профілю</h3>
<form action="" method="post">
    <label for="first_name">Ім'я:</label><br>
    <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required><br>

    <label for="last_name">Прізвище:</label><br>
    <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" required><br>

    <label for="age">Вік:</label><br>
    <input type="number" id="age" name="age" value="<?php echo $user['age']; ?>" required><br>

    <label for="gender">Стать:</label><br>
    <select id="gender" name="gender" required>
        <option value="Male" <?php if ($user['gender'] === 'Male') echo 'selected'; ?>>Чоловік</option>
        <option value="Female" <?php if ($user['gender'] === 'Female') echo 'selected'; ?>>Жінка</option>
        <option value="Other" <?php if ($user['gender'] === 'Other') echo 'selected'; ?>>Інше</option>
    </select><br>

    <label for="country">Країна:</label><br>
    <input type="text" id="country" name="country" value="<?php echo $user['country']; ?>" required><br>

    <label for="city">Місто:</label><br>
    <input type="text" id="city" name="city" value="<?php echo $user['city']; ?>" required><br>

    <input type="submit" value="Зберегти зміни">
</form>

<a href="logout.php">Вийти</a>
</body>
</html>
