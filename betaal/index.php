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

function requestArray(string $key, array $input): array
{
    $value = $input[$key] ?? [];
    return is_array($value) ? array_values($value) : [$value];
}

$input = $_GET;
$requestedProducts = requestArray('product', $input);
$requestedColors = requestArray('color', $input);
$requestedSizes = requestArray('size', $input);
$requestedAmounts = requestArray('amount', $input);
$action = $input['action'] ?? '';
$removeIndex = filter_var($input['remove'] ?? null, FILTER_VALIDATE_INT);
if ($removeIndex !== false && $removeIndex !== null) {
    foreach ([&$requestedProducts, &$requestedColors, &$requestedSizes, &$requestedAmounts] as &$values) {
        unset($values[$removeIndex]);
        $values = array_values($values);
    }
    unset($values);
}
if ($action === 'add' && count($requestedProducts) < 5) {
    $requestedProducts[] = 'zonneschijn';
    $requestedColors[] = 'blauw';
    $requestedSizes[] = 's';
    $requestedAmounts[] = 1;
}

$rowCount = max(count($requestedProducts), count($requestedColors), count($requestedSizes), count($requestedAmounts), 1);
$rowCount = min($rowCount, 5);
$items = [];
$total = 0;

for ($index = 0; $index < $rowCount; $index++) {
    $productKey = $requestedProducts[$index] ?? 'zonneschijn';
    if (!array_key_exists($productKey, $products)) {
        $productKey = 'zonneschijn';
    }

    $product = $products[$productKey];
    $color = $requestedColors[$index] ?? $product['colors'][0];
    $color = in_array($color, $product['colors'], true) ? $color : $product['colors'][0];
    $size = $requestedSizes[$index] ?? $product['sizes'][0];
    $size = in_array($size, $product['sizes'], true) ? $size : $product['sizes'][0];
    $amount = filter_var($requestedAmounts[$index] ?? 1, FILTER_VALIDATE_INT);
    $amount = $amount !== false && $amount > 0 ? min($amount, 10000) : 1;
    $lineTotal = $product['price'] * $amount;

    $items[] = [
        'product' => $productKey,
        'color' => $color,
        'size' => $size,
        'amount' => $amount,
        'lineTotal' => $lineTotal,
    ];
    $total += $lineTotal;
}

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$customerName = trim((string) ($input['name'] ?? ''));
$customerAddress = trim((string) ($input['address'] ?? ''));
$orderLines = [];
foreach ($items as $index => $item) {
    $product = $products[$item['product']];
    $orderLines[] = sprintf(
        '%d. %s | kleur: %s | maat: %s | aantal: %d | subtotaal: €%.2f',
        $index + 1,
        $product['name'],
        $item['color'],
        strtoupper($item['size']),
        $item['amount'],
        $item['lineTotal']
    );
}
$mailBody = "Naam: {$customerName}\nAdres: {$customerAddress}\n\n"
    . "Bestelling:\n" . implode("\n", $orderLines)
    . sprintf("\n\nTotaal: €%.2f", $total);
$mailto = 'mailto:thom.wijngaard@gmail.com?subject='
    . rawurlencode('Nieuwe Sunny Socks bestelling')
    . '&body=' . rawurlencode($mailBody);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../components/header.css">
    <link rel="stylesheet" type="text/css" href="../components/footer.css">
    <link rel="stylesheet" type="text/css" href="./betaal.css?v=3">
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
            <input type="text" id="name" name="name" placeholder="Jouw naam" value="<?= escape($_GET['name'] ?? '') ?>">

            <label for="address">Adres</label>
            <input type="text" id="address" name="address" placeholder="Jouw adres" value="<?= escape($_GET['address'] ?? '') ?>">
        </div>

        <div class="order-card order-card--products">
            <h2>Bestelling</h2>
            <div id="order-items">
                <?php foreach ($items as $index => $item): ?>
                    <?php $product = $products[$item['product']]; ?>
                    <fieldset class="order-item">
                        <legend>Product <?= $index + 1 ?></legend>
                        <button class="remove-item" type="submit" name="remove" value="<?= $index ?>" aria-label="Product <?= $index + 1 ?> verwijderen">Verwijderen</button>

                        <label>Product</label>
                                        <select name="product[]">
                            <?php foreach ($products as $key => $option): ?>
                                <option value="<?= escape($key) ?>" <?= $key === $item['product'] ? 'selected' : '' ?>>
                                    <?= escape($option['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label>Kleur</label>
                        <select name="color[]">
                            <?php foreach ($product['colors'] as $color): ?>
                                <option value="<?= escape($color) ?>" <?= $color === $item['color'] ? 'selected' : '' ?>>
                                    <?= escape($color) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label>Maat</label>
                        <select name="size[]">
                            <?php foreach ($product['sizes'] as $size): ?>
                                <option value="<?= escape($size) ?>" <?= $size === $item['size'] ? 'selected' : '' ?>>
                                    <?= escape(strtoupper($size)) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label>Aantal</label>
                        <input type="number" name="amount[]" min="1" max="10000" value="<?= $item['amount'] ?>">
                    </fieldset>
                <?php endforeach; ?>
            </div>

            <button class="add-item" type="submit" name="action" value="add" <?= count($items) >= 5 ? 'disabled' : '' ?>>+ Nog een product toevoegen</button>
            <a class="order-button" href="<?= escape($mailto) ?>">Bestelling maken</a>
            <p class="order-total">Totaal: &euro;<?= number_format($total, 2, ',', '.') ?></p>
        </div>
    </form>
</main>

<?php require_once __DIR__ . '/../components/footer.php'; ?>
</body>
</html>
