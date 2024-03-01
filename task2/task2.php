<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo "Добрий день, {$_SESSION['username']}! <a href='logout.php'>Вийти</a>";
} else {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if ($login === 'Admin' && $password === 'password') {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $login;

            echo "Добрий день, {$_SESSION['username']}! <a href='logout.php'>Вийти</a>";
        } else {
            echo "Невірний логін або пароль. Спробуйте ще раз.";
            displayLoginForm();
        }
    } else {
        displayLoginForm();
    }
}

function displayLoginForm() {
    ?>
    <form method="post" action="">
        <label for="login">Логін:</label>
        <input type="text" name="login" required><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Увійти">
    </form>
    <?php
}
?>
