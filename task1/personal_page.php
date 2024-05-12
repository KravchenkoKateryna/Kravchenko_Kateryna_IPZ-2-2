<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Особиста сторінка</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
        }
        .container {
            text-align: center;
        }
        .personal-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
        }
        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            text-align: center;
        }
        p {
            margin-top: 0;
            margin-bottom: 20px;
            color: #333;
            text-align: left;
        }
        .error-message {
            color: #ff0000;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="personal-container">
        <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
            exit();
        }
        echo "<h2>Особиста сторінка</h2>";
        echo "<p>Ласкаво просимо, {$_SESSION['username']}!</p>";

        if (!empty($_SESSION['error_message'])) {
            echo "<div class='error-message'>";
            foreach ($_SESSION['error_message'] as $message) {
                echo "<p>$message</p>";
            }
            echo "</div>";
            unset($_SESSION['error_message']);
        }
        ?>
    </div>
</div>
</body>
</html>
