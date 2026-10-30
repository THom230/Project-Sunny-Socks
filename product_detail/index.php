
<!doctype html>
<html lang="nl">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details - Sunny Socks</title>
    <link rel="stylesheet" href="Product_detail.css">
    <link rel="stylesheet" type="text/css" href="../components/header.css">
    <link rel="stylesheet" type="text/css" href="../components/footer.css">
</head>
<?php include __DIR__ . '/../components/header.php'; ?>
<body>
<main>
<?php
include __DIR__ . '/../components/header.php';
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
        "price" => 15,
        "description" => "Een kleurrijke collectie met opvallende strepen en kleurvlakken, gemaakt van een mix met gerecycled katoen.",
        "material_description" => "katoen"


    ],
    [
        "product" => ["wol"],
        "name" => "Wollig",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['wol'],
        "img" => "img/wol.png",
        "link" => "wol",
        "price" => 12.49,
        "description" => "Een warme en comfortabele collectie van een merinowolmix, met een dikkere breistructuur en kleuren die passen bij het najaar en de winter.",
        "material_description" => "wol"

    ],
    [
        "product" => ["kids"],
        "name" => "Sunny Kids",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m"],
        "material" => ['katoen'],
        "img" => "img/kids.png",
        "link" => "kids",
        "price" => 8,
        "description" => "Een speelse collectie kindersokken met vrolijke kleuren, een comfortabele pasvorm en extra versteviging voor dagelijks gebruik.",
        "material_description" => "katoen"
    ],
    [
        "product" => ["sport"],
        "name" => "Sunny Sports",
        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['polyester'],
        "img" => "img/sport.png",
        "link" => "sport",
        "price" => 13,49,
        "description" => "Een functionele collectie sportsokken, ontworpen voor hardlopen en fietsen. Gericht op comfort, ondersteuning en prestaties.",
        "material_description" => "polyester"
    ],
    [
        "product" => ["restjes"],
        "name" => "Restjes",
        "sizes" => ["s","m","l","xl"],
        "img" => "img/restjes.png",
        "colors" => [""],
        "material" => ["overig"],
        "link" => "restjes",
        "price" => 9,45,
        "description" => "Een unieke collectie gemaakt van restjes uit andere collecties. Elk paar heeft een eigen combinatie van kleuren en patronen.",
        "material_description" => "een combinatie van alle andere materialen"

    ],
    [
        "product" => ["werk"],
        "name" => "Werk",
        "colors" => ["blauw", "groen"],
        "sizes" => ["s","m","l","xl"],
        "material" => ['katoen'],
        "img" => "img/werk.png",
        "link" => "werk",
        "price" => 13,
        "description" => "Een stevige, slijtvaste werksok voor dagelijks gebruik. Een klassiek ontwerp dat sinds 1981 onveranderd is gebleven.",
        "material_description" => "katoen"
    ]
    ];

?>

<section>

<?php
foreach ($products as $product) {

?>

<?php
        if (!empty ($product_id)) {
            $match = array_intersect($product['product'], $product_id);
            if ($match) {
                $product['price'] = str_replace(".", ",", $product['price']);

                echo "
                 <figure><img src='$product[img]' alt='$product[name]'></figure>
                <article class='buy'>
                
                <h1>$product[name]</h1>
                <h2>€$product[price]</h2>
                
                <form>
                <ul>
                <li><label for='color_select'>Kleur</label>
                
                <select name='color' id='color_select'>";
                foreach ($product['colors'] as $colors) {
                    echo "
                    
                    <option value=$colors>$colors</option>";

                }
                echo "</select></li>";
                echo "<li><label for='size_select'>Maat</label>
                      <select name='size' id='size_select'>";
                foreach ($product['sizes'] as $sizes) {
                    echo "<option value=$sizes>$sizes</option>";
                }
                echo "</select></li>
                

                <li><label for='amount_select'>Aantal</label>
                <input type='number' name='amount' id='amount_select' max='10000' min='100'></li>
               <li><input type='submit' formaction='/betaal' id='submit' value='Bestelformulier &rarr;'></li>
               <li><input type='hidden' name='product' value='$product[name]'></li>
               
                </ul></form></article>";


                echo "<article class='info'>
<h1>Productinfo</h1>
<details name='sigma'>
<summary>Omschrijving</summary>
<p>$product[description]</p>
</details>
<details name='sigma'>
<summary>Duurzaamheid en Materialen</summary>
<p>Alle Sunny Socks producten worden gemaakt vanuit gerecyclede materialen. $product[name] wordt 
gemaakt met $product[material_description]</p>
</details>
<details name='sigma'>
<summary>Garantie</summary>
<p>Wij bieden bovenop de wettelijke garantie een extra garantie van 2 jaar aan consumenten.</p>
</details>
</article>";






            }
        }
}
                ?> 










</section>
<?php include __DIR__ . '/../components/footer.php'; ?>

</main>
</body>
</html>
