<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лр № 2 - Завд. 2.4 Кравченко Катерина ІПЗ-22-2</title>
</head>

<body>

<?php
$users = array(
    "Ivan" => 25,
    "Veronika" => 30,
    "Kateryna" => 18,
    "Andrii" => 28,
    "Denys" => 35
);

function sortUsers($users, $sortBy)
{
    if ($sortBy === "вік") {
        asort($users);
    } elseif ($sortBy === "ім'я") {
        ksort($users);
    }

    return $users;
}

echo "<p>Початковий асоціативний масив:</p>";
foreach ($users as $name => $age) {
    echo "<p>$name: $age років</p>";
}

$sortedByAge = sortUsers($users, "вік");
echo "<p>Відсортований за віком:</p>";
foreach ($sortedByAge as $name => $age) {
    echo "<p>$name: $age років</p>";
}

$sortedByName = sortUsers($users, "ім'я");
echo "<p>Відсортований за іменами в алфавітному порядку:</p>";
ksort($sortedByName);
foreach ($sortedByName as $name => $age) {
    echo "<p>$name: $age років</p>";
}

?>

</body>

</html>
