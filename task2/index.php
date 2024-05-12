<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab7";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getMenuItems() {
    global $conn;
    $sql = "SELECT title, url FROM menu_items";
    $result = $conn->query($sql);
    $menuItems = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $menuItems[] = $row;
        }
    }
    return $menuItems;
}

function displayMenu() {
    $menuItems = getMenuItems();
    echo "<ul>";
    foreach ($menuItems as $item) {
        echo "<li><a href='{$item['url']}'>{$item['title']}</a> ";
        echo "<a href='?delete={$item['title']}'>[Видалити]</a></li>"; // Додано посилання для видалення
    }
    echo "</ul>";
}

if (isset($_GET['add']) && isset($_GET['url'])) {
    $newItemTitle = $_GET['add'];
    $newItemURL = $_GET['url'];
    $sql = "INSERT INTO menu_items (title, url) VALUES ('$newItemTitle', '$newItemURL')"; // Оновлений запит для вставки
    $conn->query($sql);
    ob_clean();
}

if (isset($_GET['delete'])) {
    $deleteItem = $_GET['delete'];
    $sql = "DELETE FROM menu_items WHERE title='$deleteItem'";
    $conn->query($sql);
    ob_clean();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: calc(100% - 10px);
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button[type="submit"] {
            background-color: #ff69b4;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #ff4f9e;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="GET" action="">
        <label for="newItem">Назва:</label>
        <input type="text" name="add" id="newItem" required>
        <label for="newItemURL">URL:</label>
        <input type="text" name="url" id="newItemURL" required>
        <button type="submit">Додати</button>
    </form>

    <?php
    displayMenu();
    ?>
</div>
</body>
</html>

