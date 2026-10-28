<?php
    include '../components/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="FAQ.css">
    <title>Document</title>
</head>
<body>
<div class="background">
    <t1>Veelgestelde vragen</t1>
    <div class="box">
        <p>Wat is de levertijd van mijn bestelling?</p>
        <img src="../media/FAQ/icons/arrow_icon.png" alt="Toon antwoord">
    </div>
    <div class="box">
        <p>hoeveel kost een bestelling?</p>
        <img src="../media/FAQ/icons/arrow_icon.png" alt="Toon antwoord">
    </div>
    <div class="box">
        <p>Hoe kan ik mijn bestelling annuleren?</p>
        <img src="../media/FAQ/icons/arrow_icon.png" alt="Toon antwoord">
    </div>
    <div class="box">
       <form action="FAQ.php" method="post" class="vraag-formulier">

        <p>Ik heb een vraag, hoe kan ik deze indienen?</p>

        <input
            type="text"
            name="vraag"
            placeholder="Vul hier uw vraag in">

        <button type="submit" class="submit-btn">
            Verstuur →
        </button>

    </form>
    </div>
</div>
</body>
</html>