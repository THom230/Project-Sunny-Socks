<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunny Socks - </title>
</head>
<?php
$product_id = ([$_GET['product']]) ?? [];
print_r($product_id);


$products = [
  [
      'product' => ['test']
]
];
?>
<body>
<?php
foreach ($products as $product) {
    $errormsg = true;
        if (!empty ($product_id)) {
            $match = array_intersect($product['product'], $product_id);
            if ($match) {
                echo "hi hello test";
            }
        }

}
?>
</body>
</html>