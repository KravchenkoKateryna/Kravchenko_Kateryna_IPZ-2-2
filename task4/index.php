<?php
include 'func.php';

$number = isset($_POST['number']) ? $_POST['number'] : '';
$selectedOperation = isset($_POST['operation']) ? $_POST['operation'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<table border='1'>";
    echo "<tr bgcolor=''><th>Operation</th><th>Result</th></tr>";

    switch ($selectedOperation) {
        case 'sin':
            $result = my_sin($number);
            displayResult('sin', $result);
            break;
        case 'cos':
            $result = my_cos($number);
            displayResult('cos', $result);
            break;
        case 'tg':
            $result = my_tg($number);
            displayResult('tg', $result);
            break;
        case 'factorial':
            $result = my_factorial($number);
            displayResult('x!', $result);
            break;
        case 'power':
            $result = my_power($number);
            displayResult('x^2', $result);
            break;
        default:
            echo "<tr><td colspan='2'>Invalid operation</td></tr>";
            break;
    }

    echo "</table>";
}

function displayResult($operation, $result) {
    echo "<tr><td>$operation</td><td>$result</td></tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form action="calculate.php" method="post">
    <label for="number">Число:</label>
    <input type="text" name="number" id="number" value="<?php echo $number; ?>" required>
    <input type="submit" value="Рахувати">
</form>
</body>
</html>
