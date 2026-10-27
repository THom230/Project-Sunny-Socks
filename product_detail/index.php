<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunny Socks - Product</title>
    <link rel="stylesheet" href="Product_detail.css">
</head>
<body>
<?php
$product_id = ([$_GET['product']] ?? []);



$products = [
    [
        "product" => ["zonneschijn"],
        "name" => 'Zonneschijn',
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['katoen'],
        "img" => "img/zonneschijn.png",
        "link" => "zonneschijn",
        "price" => 15


    ],
    [
        "product" => ["wol"],
        "name" => "Wollig",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['wol'],
        "img" => "img/wol.png",
        "link" => "wol",
        "price" => 12.49
    ],
    [
        "product" => ["kids"],
        "name" => "Sunny Kids",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m"],
        "material" => ['katoen'],
        "img" => "img/kids.png",
        "link" => "kids",
        "price" => 8
    ],
    [
        "product" => ["sport"],
        "name" => "Sunny Sports",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['polyester'],
        "img" => "img/sport.png",
        "link" => "sport",
        "price" => 13,49
    ],
    [
        "product" => ["restjes"],
        "name" => "Restjes",
        "sizes" => ["s","m","l","xl"],
        "img" => "img/restjes.png",
        "colors" => [""],
        "material" => ["overig"],
        "link" => "restjes",
        "price" => 9,45

    ],
    [
        "product" => ["werk"],
        "name" => "Werk",
        "colors" => ["blauw", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['katoen'],
        "img" => "img/werk.png",
        "link" => "werk",
        "price" => 13
    ]
    ];

?>

<?php
foreach ($products as $product) {

?>

<section>

<?php


        if (!empty ($product_id)) {
            $match = array_intersect($product['product'], $product_id);
            if ($match) {
                $product['price'] = str_replace(".", ",", $product['price']);

                echo "<article class='product'
                <figure><img src='placeholder.png' alt='$product[name]'></figure>
                <h1>$product[name]</h1>
                <h2>Prijs: €$product[price]</h2>
                
                <form>
                <label for='color_select'>Kleur</label>
                
                <select name='color' id='color_select'>";
                foreach ($product['colors'] as $colors) {
                    echo "<option value=$colors>$colors</option>";

                }
                echo "</select>";
                echo "<label for='size_select'>Maat</label>
                      <select name='size' id='size_select'>";
                foreach ($product['sizes'] as $sizes) {
                    echo "<option value=$sizes>$sizes</option>";
                }
                echo "
                

                <label for='amount_select'>Aantal</label>
                <input type='number' name='amount' id='amount_select' max='10000' min='0'>
               <input type='submit' formaction='/contact' id='submit' value='Contactformulier'>
               <input type='hidden' name='product' value='$product[name]'>
               
                </form>";






            }
        }
}
                ?>



                
                
                




</section>
</body>
</html>