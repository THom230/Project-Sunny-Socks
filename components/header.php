<?php
$menuOpen = ($_GET['menu'] ?? '') === 'open';
?>

<header class="site-header">
        <a class="logo-link" href="../home/index.php">
            <img src="../media/Sunny.png" alt="Sunny Socks home">
        </a>

        <form method="get" class="menu-form">
            <input type="hidden" name="menu" value="<?php echo $menuOpen ? 'closed' : 'open'; ?>">
            <button class="menu-toggle" type="submit" aria-expanded="<?php echo $menuOpen ? 'true' : 'false'; ?>" aria-controls="main-navigation">
                <span class="menu-icon" aria-hidden="true">&#9776;</span>
                <span>Menu</span>
            </button>
        </form>

        <nav id="main-navigation" class="main-navigation<?php echo $menuOpen ? ' is-open' : ''; ?>" aria-label="Hoofdnavigatie">
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