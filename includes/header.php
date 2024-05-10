<header class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
    <div class="container-fluid w-l-75 w-xl-75">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.svg" width="30" height="30" alt="Logo" class="me-2" />
            Fabularium
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <form class="w-100 d-none d-sm-block">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Wpisz tytuł, autora lub IBSN...">
                    <span class="input-group-text">
                        <a href="#">
                            <img src="images/magnifier-icon.svg" alt="Magnifying Glass" width="16" height="16">
                        </a>
                    </span>
                </div>
            </form>
            <ul class="navbar-nav w-100 justify-content-end mt-2 mt-sm-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="katalog.php">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bestsellery.php">Bestsellery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="o-nas.php">O nas</a>
                </li>
                <li class="nav-item d-none d-sm-block">
                    <a class="nav-link" href="koszyk.php">
                        <img src="images/shopping-cart-icon.svg" width="32" height="32" alt="Logo" />
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block">
                    <a class="nav-link" href="logowanie.php">
                        <img src="images/user-icon.svg" width="28" height="28" alt="Logo" />
                    </a>
                </li>
                <li class="nav-item d-block d-sm-none">
                    <a class="nav-link" href="koszyk.php">Koszyk</a>
                </li>
                <li class="nav-item d-block d-sm-none">
                    <a class="nav-link" href="logowanie.php">Logowanie</a>
                </li>
            </ul>
            <form class="w-100 d-sm-none">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Wpisz tytuł, autora lub IBSN...">
                    <span class="input-group-text">
                        <a href="#">
                            <img src="images/magnifier-icon.svg" alt="Magnifying Glass" width="16" height="16">
                        </a>
                    </span>
                </div>
            </form>
        </div>

    </div>
</header>


<style>
    /* Custom CSS for collapsing the navbar links into a column */
    @media (max-width: 576px) {
        .navbar-nav {
            flex-direction: column !important;
            align-items: flex-start !important;
        }
    }
</style>