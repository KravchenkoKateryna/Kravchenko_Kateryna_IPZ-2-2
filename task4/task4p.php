<?php

$uploadDirectory = 'uploads/';
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Перевірка, чи надіслано форму
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageType = $_FILES['image']['type'];
    $imageError = $_FILES['image']['error'];

    $uniqueName = uniqid() . "_" . $imageName;

    $uploadPath = $uploadDirectory . $uniqueName;

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)) {
        if (move_uploaded_file($imageTmpName, $uploadPath)) {
            echo "Зображення '$imageName' було успішно завантажено.";
        } else {
            echo "Помилка при завантаженні зображення.";
        }
    } else {
        echo "Дозволені тільки файли з розширеннями: jpg, jpeg, png, gif.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завд 4</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label for="image">Оберіть зображення для завантаження:</label>
    <input type="file" name="image" id="image" accept="image/*" required>
    <br>
    <input type="submit" value="Завантажити">
</form>
</body>
</html>
