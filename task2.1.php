<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лр № 2 - Завд. 2.1 Кравченко Катерина ІПЗ-22-2</title>
</head>
<body>

<?php
function findDuplicateElements($array) {
    $countedValues = array_count_values($array);

    foreach ($countedValues as $value => $count) {
        if ($count > 1) {
            echo "Елемент '$value' повторюється $count разів<br>";
        }
    }
}

$array = [1, 2, 3, 4, 2, 5, 6, 3, 7, 8, 9, 1];
findDuplicateElements($array);
?>

</body>
</html>
