<?php
include 'func.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = $_POST['number'];

    $factorial = my_factorial($number);
    $power = my_power($number);
    $my_tg = my_tg($number);
    $sin = my_sin($number);
    $cos = my_cos($number);
    $tg = tg($number);

    echo "<table border='1' cellpadding='5'>
            <tr>
                <th>X</th>
                <th>X!</th>
                <th>X^</th>
                <th>my_tg(X)</th>
                <th>sin(X)</th>
                <th>cos(X)</th>
                <th>tg(X)</th>
            </tr>
            <tr>
                <td>$number</td>
                <td>$factorial</td>
                <td>$power</td>
                <td>$my_tg</td>
                <td>$sin</td>
                <td>$cos</td>
                <td>$tg</td>
            </tr>
          </table>";
} else {
    header("Location: index.php");
    exit();
}
?>
