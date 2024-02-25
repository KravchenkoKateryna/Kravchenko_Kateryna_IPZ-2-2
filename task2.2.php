<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лр № 2 - Завд. 2.2 Кравченко Катерина ІПЗ-22-2</title>
</head>
<body>

<form method="post">
    <input type="submit" name="generate" value="Згенерувати">
</form>

<?php
function generateAnimalName() {
    $vowels = ["а", "е", "є", "и", "і", "ї", "о", "у", "ю", "я"];
    $consonants = ["б", "в", "г", "ґ", "д", "ж", "з", "й", "к", "л", "м", "н", "п", "р", "с", "т", "ф", "х", "ц", "ч", "ш", "щ"];

    $numSyllables = mt_rand(2, 5);
    $name = '';

    for ($i = 0; $i < $numSyllables; $i++) {
        if ($i % 2 === 0) {
            $name .= $vowels[array_rand($vowels)];
        } else {
            $name .= $consonants[array_rand($consonants)];
        }
    }

    return ucfirst($name);
}

if (isset($_POST["generate"])) {
    $animalName = generateAnimalName();
    echo "Згенероване ім'я тварини: $animalName";
}
?>

</body>
</html>