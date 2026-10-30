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

function requestArray(string $key): array
{
    $value = $_GET[$key] ?? [];
    return is_array($value) ? array_values($value) : [$value];
}

$requestedProducts = requestArray('product');
$requestedColors = requestArray('color');
$requestedSizes = requestArray('size');
$requestedAmounts = requestArray('amount');
$rowCount = max(count($requestedProducts), count($requestedColors), count($requestedSizes), count($requestedAmounts), 1);
$rowCount = min($rowCount, 20);
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

            <label for="email">E-mailadres</label>
            <input type="email" id="email" name="email" placeholder="jij@voorbeeld.nl" value="<?= escape($_GET['email'] ?? '') ?>">

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
                        <button class="remove-item" type="button" aria-label="Product <?= $index + 1 ?> verwijderen">Verwijderen</button>

                        <label>Product</label>
                        <select name="product[]" data-product-select>
                            <?php foreach ($products as $key => $option): ?>
                                <option value="<?= escape($key) ?>" <?= $key === $item['product'] ? 'selected' : '' ?>>
                                    <?= escape($option['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label>Kleur</label>
                        <select name="color[]" data-color-select>
                            <?php foreach ($product['colors'] as $color): ?>
                                <option value="<?= escape($color) ?>" <?= $color === $item['color'] ? 'selected' : '' ?>>
                                    <?= escape($color) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label>Maat</label>
                        <select name="size[]" data-size-select>
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

            <button class="add-item" type="button" id="add-item">+ Nog een product toevoegen</button>
            <button class="order-button" type="submit">Bestelling bijwerken</button>
            <p class="order-total">Totaal: &euro;<?= number_format($total, 2, ',', '.') ?></p>
        </div>
    </form>
</main>

<?php require_once __DIR__ . '/../components/footer.php'; ?>
<script>
const products = <?= json_encode($products, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>;
const orderItems = document.getElementById('order-items');
const addItemButton = document.getElementById('add-item');

function optionMarkup(values, selectedValue, uppercase = false) {
    return values.map(value => {
        const label = uppercase ? value.toUpperCase() : value;
        const selected = value === selectedValue ? ' selected' : '';
        return `<option value="${value}"${selected}>${label}</option>`;
    }).join('');
}

function updateItemOptions(item, productKey) {
    const product = products[productKey];
    const colorSelect = item.querySelector('[data-color-select]');
    const sizeSelect = item.querySelector('[data-size-select]');
    colorSelect.innerHTML = optionMarkup(product.colors, product.colors[0]);
    sizeSelect.innerHTML = optionMarkup(product.sizes, product.sizes[0], true);
}

function updateRemoveButtons() {
    const items = orderItems.querySelectorAll('.order-item');
    items.forEach((item, index) => {
        item.querySelector('legend').textContent = `Product ${index + 1}`;
        item.querySelector('.remove-item').disabled = items.length === 1;
    });
}

function addItem() {
    const template = orderItems.querySelector('.order-item').cloneNode(true);
    template.querySelector('[data-product-select]').value = 'zonneschijn';
    template.querySelector('[data-color-select]').innerHTML = optionMarkup(products.zonneschijn.colors, products.zonneschijn.colors[0]);
    template.querySelector('[data-size-select]').innerHTML = optionMarkup(products.zonneschijn.sizes, products.zonneschijn.sizes[0], true);
    template.querySelector('input[type="number"]').value = 1;
    orderItems.appendChild(template);
    updateRemoveButtons();
}

orderItems.addEventListener('change', event => {
    if (event.target.matches('[data-product-select]')) {
        updateItemOptions(event.target.closest('.order-item'), event.target.value);
    }
});

orderItems.addEventListener('click', event => {
    if (event.target.matches('.remove-item')) {
        event.target.closest('.order-item').remove();
        updateRemoveButtons();
    }
});

addItemButton.addEventListener('click', addItem);
updateRemoveButtons();
</script>
</body>
</html>
