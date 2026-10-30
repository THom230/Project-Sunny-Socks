<?php
$products = [
    'zonneschijn' => ['name' => 'Zonneschijn', 'price' => 15, 'colors' => ['blauw', 'geel', 'roze', 'oranje', 'groen'], 'sizes' => ['s', 'm', 'l', 'xl']],
    'wol' => ['name' => 'Wollig', 'price' => 12.49, 'colors' => ['blauw', 'geel', 'roze', 'oranje', 'groen'], 'sizes' => ['s', 'm', 'l', 'xl']],
    'kids' => ['name' => 'Sunny Kids', 'price' => 8, 'colors' => ['blauw', 'geel', 'roze', 'oranje', 'groen'], 'sizes' => ['s', 'm']],
    'sport' => ['name' => 'Sunny Sports', 'price' => 13.49, 'colors' => ['blauw', 'geel', 'roze', 'oranje', 'groen'], 'sizes' => ['s', 'm', 'l', 'xl']],
    'restjes' => ['name' => 'Restjes', 'price' => 9.45, 'colors' => ['mix'], 'sizes' => ['s', 'm', 'l', 'xl']],
    'werk' => ['name' => 'Werk', 'price' => 13, 'colors' => ['blauw', 'groen'], 'sizes' => ['s', 'm', 'l', 'xl']],
    'warm' => ['name' => 'Warm', 'price' => 14, 'colors' => ['geel', 'oranje', 'roze'], 'sizes' => ['s', 'm', 'l', 'xl']],
    'style' => ['name' => 'Style', 'price' => 12, 'colors' => ['blauw', 'roze', 'groen'], 'sizes' => ['s', 'm', 'l', 'xl']],
    'dangerous' => ['name' => 'Dangerous', 'price' => 13, 'colors' => ['blauw', 'geel', 'groen'], 'sizes' => ['s', 'm', 'l', 'xl']],
];

$selectedProduct = $_GET['product'] ?? 'zonneschijn';
if (!array_key_exists($selectedProduct, $products)) {
    $selectedProduct = 'zonneschijn';
}

$product = $products[$selectedProduct];
$selectedColor = in_array($_GET['color'] ?? '', $product['colors'], true)
    ? $_GET['color']
    : $product['colors'][0];
$selectedSize = in_array($_GET['size'] ?? '', $product['sizes'], true)
    ? $_GET['size']
    : $product['sizes'][0];
$amount = filter_var($_GET['amount'] ?? 1, FILTER_VALIDATE_INT);
$amount = $amount !== false && $amount > 0 ? min($amount, 10000) : 1;
$total = $product['price'] * $amount;
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../components/header.css">
    <link rel="stylesheet" type="text/css" href="../components/footer.css">
    <link rel="stylesheet" type="text/css" href="./betaal.css?v=2">
    <title>Betaal formulier</title>
</head>
<body>
<?php require_once __DIR__ . '/../components/header.php'; ?>

<main class="order-page">
    <h1>Bestelformulier</h1>

    <form class="order-form" action="./index.php" method="get">
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
                <?php foreach ($products as $key => $option): ?>
                    <option value="<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?>" <?= $key === $selectedProduct ? 'selected' : '' ?>>
                        <?= htmlspecialchars($option['name'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="color">Kleur</label>
            <select id="color" name="color">
                <?php foreach ($product['colors'] as $color): ?>
                    <option value="<?= htmlspecialchars($color, ENT_QUOTES, 'UTF-8') ?>" <?= $color === $selectedColor ? 'selected' : '' ?>>
                        <?= htmlspecialchars($color, ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="size">Maat</label>
            <select id="size" name="size">
                <?php foreach ($product['sizes'] as $size): ?>
                    <option value="<?= htmlspecialchars($size, ENT_QUOTES, 'UTF-8') ?>" <?= $size === $selectedSize ? 'selected' : '' ?>>
                        <?= htmlspecialchars(strtoupper($size), ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="amount">Aantal</label>
            <input type="number" id="amount" name="amount" min="1" max="10000" value="<?= $amount ?>">

            <button class="order-button" type="submit">Bestelling bijwerken</button>
            <p class="order-total">Totaal: &euro;<?= number_format($total, 2, ',', '.') ?></p>
        </div>
    </form>
</main>

<?php require_once __DIR__ . '/../components/footer.php'; ?>
</body>
</html>
