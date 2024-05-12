<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Особиста сторінка</title>
</head>
<body>
<h1>Ваша сторінка:)</h1>
<p>Привіт, <?php echo htmlspecialchars($_GET['username']); ?>!</p>
</body>
</html>
