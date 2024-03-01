<?php
$filename = "comments.txt";

if (!file_exists($filename)) {
    fopen($filename, "w");
}
$file = fopen($filename, "r");

if ($file) {
    echo "<table border='1'>";
    while (!feof($file)) {
        $line = fgets($file);

        $data = explode(";", $line);

        if (isset($data[1])) {
            echo "<tr><td>{$data[0]}</td><td>{$data[1]}</td></tr>";
        }
    }
    echo "</table>";

    fclose($file);
} else {
    echo "Помилка при відкритті файлу.";
}
?>
