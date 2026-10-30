<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../components/header.css">
    <link rel="stylesheet" type="text/css" href="./betaal.css?v=20261030-2">
    <title>Betaal formulier</title>
</head>
<body>
    <?php require_once __DIR__ . '/../components/header.php'; ?>

    <main class="order-page">
        <h1>Bestelformulier</h1>

        <form class="order-form">
            <div class="order-card">
                <h2>Gegevens</h2>
                <label for="name">Naam</label>
                <input type="text" id="name" name="name" placeholder="Jouw naam">

                <label for="email">E-mailadres</label>
                <input type="email" id="email" name="email" placeholder="jij@voorbeeld.nl">

                <label for="address">Adres</label>
                <input type="text" id="address" name="address" placeholder="Jouw adres">
            </div>

            <div class="order-card">
                <h2>Bestelling</h2>
                <label for="product">Product</label>
                <select id="product" name="product">
                    <option>Sunny Socks</option>
                    <option>Sunny Kids</option>
                </select>

                <label for="size">Maat</label>
                <select id="size" name="size">
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                </select>

                <button class="order-button" type="button">Bestellen</button>
            </div>
        </form>
    </main>
</body>
</html>