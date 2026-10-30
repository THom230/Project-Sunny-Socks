<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../components/header.css">
    <link rel="stylesheet" type="text/css" href="../components/footer.css">
    <link rel="stylesheet" href="nieuwsbrief.css">
    <link rel="stylesheet" type="text/css" href="../components/header.css">
    <title>Document</title>
</head>
<body>
<?php
require_once __DIR__ . '/../components/header.php';
?>
<section id="tekst">
    <h1>The bright side of socks</h1>
    <h3>Schrijf je in voor de nieuwsbrief</h3>
</section>
<form action="/nieuwsbrief/" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email-gebruiker">
    <button type="submit">Verstuur</button>
</form>

<?php require_once __DIR__ . '/../components/footer.php'; ?>
</body>
</html>
