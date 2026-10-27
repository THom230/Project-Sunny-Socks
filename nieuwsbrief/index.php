<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
require_once__DIR__.'/../components/header.php';
?>
<form action="/#" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email-gebruiker">
    <button type="submit">Verstuur</button>
</form>
</body>
</html>