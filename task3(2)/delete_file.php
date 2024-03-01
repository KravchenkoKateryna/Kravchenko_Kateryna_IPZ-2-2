<?php
$filenameToDelete = isset($_POST['filenameToDelete']) ? $_POST['filenameToDelete'] : '';

if (!empty($filenameToDelete)) {
    unlink($filenameToDelete);
    echo "Файл '$filenameToDelete' був видалений.";
} else {
    echo "Будь ласка, введіть ім'я файлу для видалення.";
}
?>
