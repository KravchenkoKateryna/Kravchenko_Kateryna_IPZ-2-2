<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформлення замовлення</title>
</head>
<body>
<h1>Оформлення замовлення</h1>
<form action="process_order.php" method="post">
    <label for="product_name">Назва товару:</label><br>
    <input type="text" id="product_name" name="product_name" required><br>
    <label for="quantity">Кількість:</label><br>
    <input type="number" id="quantity" name="quantity" required><br>
    <button type="submit">Замовити</button>
</form>
</body>
</html>
