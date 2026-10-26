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
$product_id = ([$_GET['product']] ?? []);
print_r($product_id);


$products = [
    [
        "product" => ["zonneschijn"],
        "name" => "Zonneschijn",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['katoen'],
        "img" => "img/zonneschijn.png",
        "link" => "zonneschijn"


    ],
    [
        "product" => ["wol"],
        "name" => "Wollig",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['wol'],
        "img" => "img/wol.png",
        "link" => "wol"
    ],
    [
        "product" => ["kids"],
        "name" => "Sunny Kids",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m"],
        "material" => ['katoen'],
        "img" => "img/kids.png",
        "link" => "kids"
    ],
    [
        "product" => ["sport"],
        "name" => "Sunny Sports",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['polyester'],
        "img" => "img/sport.png",
        "link" => "sport"
    ],
    [
        "product" => ["restjes"],
        "name" => "Restjes",
        "sizes" => ["s","m","l","xl"],
        "img" => "img/restjes.png",
        "colors" => [""],
        "material" => ["overig"],
        "link" => "restjes"


    ],
    [
        "product" => ["werk"],
        "name" => "Werk",
        "colors" => ["blauw", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['katoen'],
        "img" => "img/werk.png",
        "link" => "werk"
    ]
    ];
?>

<?php
foreach ($products as $product) {
?>
<body>

<?php
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