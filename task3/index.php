<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab7";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $post_content = $_POST['post_content'];

    ob_start();
    echo $post_content;
    $buffered_content = ob_get_contents();
    ob_end_clean();

    $sql = "INSERT INTO posts (user_id, username, post_content) VALUES ('$user_id', '$username', '$buffered_content')";
    if ($conn->query($sql) === TRUE) {
        echo "Новий запис додано успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог</title>
</head>
<body>
<h1>Додати новий запис</h1>
<form method="POST" action="">
    <label for="post_content">Текст запису:</label><br>
    <textarea id="post_content" name="post_content" rows="4" cols="50" required></textarea><br>
    <button type="submit">Додати</button>
</form>

<h2>Останні записи:</h2>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM posts ORDER BY post_date DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>Користувач:</strong> " . $row['username'] . "</p>";
        echo "<p><strong>Дата:</strong> " . $row['post_date'] . "</p>";
        echo "<p><strong>Текст:</strong><br>" . $row['post_content'] . "</p>";
        echo "</div>";
    }
} else {
    echo "Ще немає записів.";
}

$conn->close();
?>
</body>
</html>
