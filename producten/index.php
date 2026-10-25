
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="Products.css"
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunny Socks - Producten</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>
<body>
<header>hoi ik ben een header</header>
<div><h1>Producten</h1></div>

<?php
// ?? [] zet de array als leeg als _GET niets ophaald
$color = array_keys($_GET["color"] ?? []);
$size = array_keys($_GET["size"] ?? []);
$material = array_keys($_GET["material"] ?? []);

$products = [
        [
                "name" => "Zonneschijn",
                "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
                "sizes" => ["s","m","l","xl"],
                "material" => ['katoen'],
                "img" => "img/zonneschijn.png",
                "link" => "zonneschijn"


        ],
        [
                "name" => "Wollig",
                "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
                "sizes" => ["s","m","l","xl"],
                "material" => ['wol'],
                "img" => "img/wol.png",
                "link" => "wol"
        ],
        [
                "name" => "Sunny Kids",
                "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
                "sizes" => ["s","m"],
                "material" => ['katoen'],
                "img" => "img/kids.png",
                "link" => "kids"
        ],
        [
                "name" => "Sunny Sports",
                "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
                "sizes" => ["s","m","l","xl"],
                "material" => ['polyester'],
                "img" => "img/sport.png",
                "link" => "sport"
        ],
        [
                "name" => "Restjes",
                "sizes" => ["s","m","l","xl"],
                "img" => "img/restjes.png",
                "colors" => [""],
                "material" => ["overig"],
                "link" => "restjes"


        ],
        [
                "name" => "Werk",
                "colors" => ["blauw", "groen"],
                "sizes" => ["s","m","l","xl"],
                "material" => ['katoen'],
                "img" => "img/werk.png",
                "link" => "werk"
        ]











];
?>
<section>
<?php
// Neemt alle arrays in producten en runt de code daaronder voor ieder daarvan
foreach ($products as $product) {
?>





    <?php
    // default value bij geen filter
    $show_product = true;
    // checkt of er een kleur is geselecteerd (! = not)
    if (!empty($color)) {
        // checkt matchende values van de arrays en zet dat in $matches
        $matches = array_intersect($color, $product["colors"]);
        // laat producten niet zien als $matches leeg is
        if (empty($matches)) {
            $show_product = false;
    }}
    if (!empty($size)) {
        $matches = array_intersect($size, $product["sizes"]);
        if (empty($matches)) {
            $show_product = false;
        }}
    if (!empty($material)) {
        $matches = array_intersect($material, $product["material"]);
        if (empty($matches)) {
            $show_product = false;
        }}
    ?>
<?php
if ($show_product) {
    echo "<article class='item'><figure class='img'><img src='$product[img]' alt='sok'></figure><h2>$product[name]</h2><a class='button' href='http://localhost:8080/product_detail/$product[link]'>Product view &rarr;</a></article>";
}
}
?>


</section>
<aside class="filters">
<form method="get">
    <h1>filters</h1>
    <h2>Kleur</h2>
    <ul>

        <li><label for="blauw">Blauw</label><input type="checkbox" name="color[blauw]" id="blauw"></li>
        <li><label for="geel">geel</label><input type="checkbox" name="color[geel]" id="geel"></li>
        <li><label for="roze">roze</label><input type="checkbox" name="color[roze]" id="roze"></li>
        <li><label for="oranje">oranje</label><input type="checkbox" name="color[oranje]" id="oranje"></li>
        <li><label for="groen">groen</label><input type="checkbox" name="color[groen]" id="groen"></li>
    </ul>
    <hr>
    <h2>Maat</h2>
    <ul>
        <li><label for="s">s</label><input type="checkbox" name="size[s]" id="s"></li>
        <li><label for="m">m</label><input type="checkbox" name="size[m]" id="m"></li>
        <li><label for="l">l</label><input type="checkbox" name="size[l]" id="l"></li>
        <li><label for="xl">xl</label><input type="checkbox" name="size[xl]" id="xl"></li>
    </ul>
    <hr>
    <h2>Materiaal</h2>

    <ul>
        <li><label for="katoen">katoen</label><input type="checkbox" name="material[katoen]" id="katoen"></li>
        <li><label for="overig">overblijfselen</label><input type="checkbox" name="material[overig]" id="overig"></li>
        <li><label for="wol">wol</label><input type="checkbox" name="material[wol]" id="wol"></li>
        <li><label for="polyester">polyester</label><input type="checkbox" name="material[polyester]" id="polyester"></li>
    </ul>
    <hr>
    <input type="submit" name="waltuh">
</form>
</aside>
</body>













</html>


