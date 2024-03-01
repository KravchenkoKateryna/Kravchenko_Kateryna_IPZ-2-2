<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лр № 2 - Завд. 1.5 Кравченко Катерина ІПЗ-22-2</title>
</head>
<body>

<form method="post">
    <label for="passwordLength">Довжина паролю (не менше 8 символів та не більше 100):</label>
    <input type="number" name="passwordLength" id="passwordLength" min="8" max="100" required>
    <br>

    <input type="submit" value="Згенерувати та перевірити пароль">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passwordLength = filter_input(INPUT_POST, 'passwordLength', FILTER_VALIDATE_INT, array('options' => array('min_range' => 8, 'max_range' => 100)));

    if ($passwordLength !== false) {
        function generatePassword($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_+=<>?';
            $password = '';

            for ($i = 0; $i < $length; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $password .= $characters[$index];
            }

            return $password;
        }

        function isStrongPassword($password) {
            return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
        }

        $generatedPassword = generatePassword($passwordLength);

        echo "<p>Згенерований пароль: $generatedPassword</p>";

        if (!isStrongPassword($generatedPassword)) {
            echo "<p style='color: red;'>Пароль не є достатньо міцним. Спробуйте ще раз.</p>";
        }
    } else {
        echo "<p>Некоректна довжина паролю. Введіть значення від 8 до 100.</p>";
    }
}
?>

</body>
</html>
