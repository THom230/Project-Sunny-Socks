<?php

        $color = array_keys($_GET["color"] ?? []);
        $size = array_keys($_GET["size"] ?? []);
        $material = array_keys($_GET["material"] ?? []);

        $products = [
                [
                        "name" => "Zonneschijn",
                        "colors" => ["blauw", "geel", "roze", "oranje", "groen"],
                        "sizes" => ["s","m","l","xl"],
                        "material" => ['katoen'],
                        "img" => "img/zonneschijn.png"


                ]];

        ?>


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
<h1>products</h1>


<section>

    <article class="item" datatype="wollig" data-color="blauw oranje roze groen geel" data-size="s m l xl" data-material="wol"><figure class="img"><img src="img/wol.png" alt="sok"></figure><h2>Wollig</h2><a class="button" href="http://localhost:8080/product_detail">Product view &rarr;</a></article>
    <article class="item" datatype="restjes" data-size="s m l xl" data-material="overig"><figure class="img"><img src="img/restjes.png" alt="sok"></figure><h2>Restjes</h2><a class="button" href="http://localhost:8080/product_detail">Product view &rarr;</a></article>
    <article class="item" datatype="sunny_kids" data-color="blauw oranje roze groen geel" data-size="s m" data-material="katoen"><figure class="img"><img src="img/kids.png" alt="sok"></figure><h2>Sunny Kids</h2><a class="button" href="http://localhost:8080/product_detail">Product view &rarr;</a></article>
    <article class="item" datatype="sunny_sport" data-color="blauw oranje roze groen geel" data-size="s m l xl" data-material="polyester"><figure class="img"><img src="img/sport.png" alt="sok"></figure><h2>Sunny Sport</h2><a class="button" href="http://localhost:8080/product_detail">Product view &rarr;</a></article>
    <article class="item" datatype="werk" data-color="blauw groen" data-size="s m l xl" data-material="katoen"><figure class="img"><img src="img/werk.png" alt="sok"></figure><h2>Werk</h2><a class="button" href="http://localhost:8080/product_detail">Product view &rarr;</a></article>









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


