<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../components/header.css">
</head>

<body>
    <header class="site-header">
        <a class="logo-link" href="../home/index.php">
            <img src="../media/Sunny.png" alt="Sunny Socks home">
        </a>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-navigation">
            <span class="menu-icon" aria-hidden="true">&#9776;</span>
            <span>Menu</span>
        </button>

        <nav id="main-navigation" class="main-navigation" aria-label="Hoofdnavigatie">
            <ul>
                <li><a href="../home/index.php">Home</a></li>
                <li><a href="../producten/index.php">Product</a></li>
                <li><a href="../over_ons/index.php">About</a></li>
                <li><a href="../FAQ/index.php">FAQ</a></li>
                <li><a href="../contact/index.php">Contact</a></li>
                <li><a href="../nieuwsbrief/index.php">Nieuwsbrief</a></li>
                <li><a href="../betaal/index.php">Betaal</a></li>
            </ul>
        </nav>
    </header>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('#main-navigation');

        menuToggle.addEventListener('click', () => {
            const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', String(!isOpen));
            navigation.classList.toggle('is-open', !isOpen);
        });
    </script>

</body>
</html>