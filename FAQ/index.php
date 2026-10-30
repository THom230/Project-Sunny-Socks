<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/header.css">
    <link rel="stylesheet" href="../components/footer.css">
    <link rel="stylesheet" href="FAQ.css">
    <title>Veelgestelde vragen - Sunny Socks</title>
</head>
<body>
<?php include '../components/header.php'; ?>
<?php
$questions = [
    'Wat is de levertijd van mijn bestelling?' => 'Bestellingen worden meestal binnen 2 tot 5 werkdagen geleverd.',
    'Hoeveel kost een bestelling?' => 'De prijs hangt af van de gekozen producten en aantallen. Het totaal zie je op de betaalpagina.',
    'Hoe kan ik mijn bestelling annuleren?' => 'Stuur zo snel mogelijk een e-mail met je bestelgegevens naar Sunny Socks.',
];
$question = trim($_GET['vraag'] ?? '');
$mailto = 'mailto:thom.wijngaard@gmail.com?subject='
    . rawurlencode('Vraag over Sunny Socks')
    . '&body=' . rawurlencode($question);
?>
<div class="background">
    <h1>Veelgestelde vragen</h1>
    <div class="faq-list">
        <?php foreach ($questions as $questionText => $answer): ?>
            <details class="box">
                <summary><?= htmlspecialchars($questionText, ENT_QUOTES, 'UTF-8') ?></summary>
                <p><?= htmlspecialchars($answer, ENT_QUOTES, 'UTF-8') ?></p>
            </details>
        <?php endforeach; ?>
    </div>
    <form class="box vraag-formulier" method="get">
        <h2>Staat je vraag er niet bij?</h2>
        <label for="vraag">Stel je vraag aan Sunny Socks</label>
        <textarea id="vraag" name="vraag" rows="4" placeholder="Vul hier je vraag in" required><?= htmlspecialchars($question, ENT_QUOTES, 'UTF-8') ?></textarea>
        <button class="submit-btn" type="submit">Vraag voorbereiden</button>
        <?php if ($question !== ''): ?>
            <a class="submit-btn" href="<?= htmlspecialchars($mailto, ENT_QUOTES, 'UTF-8') ?>">Vraag versturen via e-mail</a>
        <?php endif; ?>
    </form>
</div>
<?php include '../components/footer.php'; ?>
</body>
</html>