<?php
// Determine the base URL based on the current page's location
$baseUrl = ($_SERVER['REQUEST_URI'] === '/index.php') ? '' : '../';
?>

<header class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
    <div class="container-fluid d-flex justify-content-around w-75">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="../images/logo.svg" width="30" height="30" alt="Logo" class="me-2" />
            Fabularium</a>
        <form class="w-75">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Wpisz tytuł, autora lub IBSN...">
                <span class="input-group-text">
                    <a href="#">
                        <img src="../images/magnifier-icon.svg" alt="Magnifying Glass" width="16" height="16">
                    </a>
                </span>
            </div>
        </form>
        <ul class="navbar-nav d-flex align-items-center ms-2">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $baseUrl; ?>pages/koszyk.php"><img src="../images/shopping-cart-icon.svg" width="32" height="32" alt="Logo" /></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $baseUrl; ?>pages/logowanie.php"><img src="../images/user-icon.svg" width="28" height="28" alt="Logo" /></a>
            </li>
        </ul>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-dark primary p-0">
    <div class="container-fluid d-flex justify-content-around w-50">
        <ul class="navbar-nav flex-row">
            <li class="nav-item me-3">
                <a class="nav-link" href="<?php echo $baseUrl; ?>index.php">Strona główna</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link" href="<?php echo $baseUrl; ?>pages/katalog.php">Katalog</a>
            </li>
            <li class="nav-item me-3">
                <a class="nav-link" href="<?php echo $baseUrl; ?>pages/bestsellery.php">Bestsellery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $baseUrl; ?>pages/o-nas.php">O nas</a>
            </li>
        </ul>
    </div>
</nav>