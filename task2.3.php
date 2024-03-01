<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лр № 2 - Завд. 2.3 Кравченко Катерина ІПЗ-22-2</title>
</head>
<body>

<form method="post">
    <input type="submit" name="generateArrays" value="Згенерувати масив">
</form>

<?php
function createArray() {
    $length = mt_rand(3, 7);
    $array = array();

    for ($i = 0; $i < $length; $i++) {
        $array[] = mt_rand(10, 20);
    }

    return $array;
}

function processArrays($array1, $array2) {
    $mergedArray = array_merge($array1, $array2);
    $uniqueArray = array_unique($mergedArray);
    sort($uniqueArray);

    return $uniqueArray;
}

if (isset($_POST["generateArrays"])) {
    $arrayA = createArray();
    $arrayB = createArray();

    echo "<p>Масив A: " . implode(", ", $arrayA) . "</p>";
    echo "<p>Масив B: " . implode(", ", $arrayB) . "</p>";

    $resultArray = processArrays($arrayA, $arrayB);
    echo "<p>Результат обробки масивів: " . implode(", ", $resultArray) . "</p>";
}
?>

</body>
</html>
