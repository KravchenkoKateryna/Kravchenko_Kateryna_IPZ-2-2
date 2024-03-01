<?php
session_start();

$loginValue = isset($_SESSION['login']) ? $_SESSION['login'] : '';
$genderValue = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
$cityValue = isset($_SESSION['city']) ? $_SESSION['city'] : '';
$favoriteGamesValue = isset($_SESSION['favorite_games']) ? $_SESSION['favorite_games'] : [];
$aboutMeValue = isset($_SESSION['about_me']) ? $_SESSION['about_me'] : '';
$photoPath = isset($_SESSION['photo_path']) ? $_SESSION['photo_path'] : '';

$selectedLanguage = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'ukr';

function displayLanguage($language) {
    switch ($language) {
        case 'ukr':
            echo 'Вибрана мова: Українська';
            break;
        case 'eng':
            echo 'Selected language: English';
            break;
        case 'spa':
            echo 'Idioma seleccionado: Español';
            break;
        case 'deu':
            echo 'Ausgewählte Sprache: Deutsch';
            break;
        default:
            echo 'Вибрана мова: Українська';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: 300px;
            margin: 0 auto;
        }

        label, input, select, textarea {
            margin-bottom: 10px;
        }

        .game-checkboxes {
            display: flex;
            gap: 20px;
        }

        .gender-radio {
            display: flex;
            gap: 20px;
        }

        .language-icons {
            display: flex;
            gap: 10px;
        }

        .language-icons img {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        #user-details {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }

        #user-details img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
<div class="language-icons">
    <a href="?lang=ukr"><img src="images/2.jpg" alt="Українська"></a>
    <a href="?lang=eng"><img src="images/3.png" alt="English"></a>
    <a href="?lang=spa"><img src="images/4.jpg" alt="Español"></a>
    <a href="?lang=deu"><img src="images/1.jpg" alt="Deutsch"></a>
</div>

<form action="pform.php" method="post" enctype="multipart/form-data">
</form>

<div id="user-details">
    <h2>Ваші дані:</h2>
    <p><strong>Логін:</strong> <?php echo $loginValue; ?></p>
    <p><strong>Стать:</strong> <?php echo $genderValue; ?></p>
    <p><strong>Місто:</strong> <?php echo $cityValue; ?></p>
    <p><strong>Улюблені ігри:</strong> <?php echo implode(', ', $favoriteGamesValue); ?></p>
    <p><strong>Про себе:</strong> <?php echo $aboutMeValue; ?></p>
    <?php if (!empty($photoPath)) : ?>
        <p><strong>Фотографія:</strong></p>
        <img src="<?php echo $photoPath; ?>" alt="User Photo">
    <?php endif; ?>
</div>

<div>
    <?php displayLanguage($selectedLanguage); ?>
</div>
</body>
</html>
