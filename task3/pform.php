<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $favoriteGames = isset($_POST['favorite_games']) ? $_POST['favorite_games'] : '';
    $aboutMe = isset($_POST['about_me']) ? $_POST['about_me'] : '';

    $uploadDir = 'uploads/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        echo "Фотографія успішно завантажена.\n";
        $_SESSION['photo_path'] = $uploadFile;
    } else {
        echo "Помилка завантаження фотографії.\n";
    }
    $_SESSION['login'] = $login;
    $_SESSION['gender'] = $gender;
    $_SESSION['city'] = $city;
    $_SESSION['favorite_games'] = $favoriteGames;
    $_SESSION['about_me'] = $aboutMe;

    header("Location: display_data.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
