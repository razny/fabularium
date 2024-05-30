<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
}
?>
<style>
    #toggleMode {
        border: none;
        background: none;
        cursor: pointer;
        margin-top: 5px;
    }

    .dark-mode {
        background-color: #1b1d1e;
        color: #e3e3e3;
    }

    .dark-mode-header {
        background-color: #151718 !important;
    }

    .dark-mode-header .navbar-brand {
        color: #d6d6d6;
    }

    .dark-mode-header .form-control,
    .dark-mode-header .form-control:hover,
    .dark-mode-header .form-control:focus {
        background-color: #1f1d21;
        color: #e3e3e3;
        border-color: #2c2e2f;
    }

    .dark-mode-header input::placeholder {
        color: #717171;
    }

    .dark-mode-header .input-group-text {
        background: #2c292f;
        border-color: #2c292f;
    }

    .dark-mode-header .input-group-text:hover {
        background: #1b1d1e;
    }

    .dark-mode-header .nav-link {
        color: #d6d6d6;
    }

    .dark-mode-header .nav-link:hover {
        color: #e3e3e3;
    }

    .dark-mode h2 {
        color: #e3e3e3;
    }

    .dark-mode .swiper::before {
        background: #1b1d1e;
    }

    .dark-mode .swiper::after {
        background: #1b1d1e;
    }

    .dark-mode section>h2 {
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #828282;
        line-height: 0.1em;
        margin: 10px 0 20px;
        padding: 0.2em;
        font-size: 25px;
    }

    .dark-mode section>h2 span {
        padding: 5px 20px;
        border-style: solid;
        border-width: 1px;
        border-radius: 5px;
        border-color: #828282;
        background-color: #1b1d1e !important;
    }

    .dark-mode #swiper {
        background: #1b1d1e;
    }

    .dark-mode .card {
        background: #1f1d21;
    }

    .dark-mode .card-title {
        color: #e3e3e3;
    }

    .dark-mode .card-price {
        color: #e3e3e3;
    }

    .dark-mode td p {
        color: #e3e3e3;
    }

    .dark-mode td,
    .dark-mode tr {
        color: #e3e3e3;
    }

    .dark-mode #catalog .card {
        transition: box-shadow 0.3s ease;
    }

    .dark-mode #catalog .card:hover {
        box-shadow: 0 0 20px #4a4a4a;
    }

    .dark-mode .counter {
        background-color: #18161a !important;
        padding: 10px 0;
        border-radius: 10px;
    }

    .dark-mode .card .btn {
        background: #7e3fcc !important;
    }

    .dark-mode .card .btn:hover {
        background: #9345f5 !important;
    }

    .dark-mode #reviews .btn {
        background: #7e3fcc;
    }

    .dark-mode #reviews .btn:hover {
        background: #9345f5;
    }

    .dark-mode .dropdown .btn {
        background: #7e3fcc;
    }

    .dark-mode .dropdown .btn:hover {
        background: #9345f5;
    }

    .dark-mode .dropdown-menu,
    .dark-mode .dropdown-item {
        background: #1b1d1e !important;
        color: #d6d6d6;
    }

    .dark-mode .dropdown-item:hover {
        background: #272a2b !important;
    }

    .dark-mode .card-title a {
        color: #e3e3e3;
    }

    .dark-mode #produkt .btn {
        background: #7e3fcc;
    }

    .dark-mode #produkt .btn:hover {
        background: #9345f5;
    }

    .dark-mode section .form-control,
    .dark-mode section .form-control:hover,
    .dark-mode section .form-control:focus {
        background-color: #1f1d21;
        color: #e3e3e3;
        border-color: #2c292f;
    }

    .dark-mode section input::placeholder {
        color: #717171;
    }

    .dark-mode .alert {
        background-color: #1f1d21;
        color: #e3e3e3;
        border-color: #717171;
    }

    .dark-mode .page-link,
    .dark-mode .page-link a {
        background-color: #1f1d21 !important;
        border-color: #717171;
        color: #7e3fcc;
    }

    .dark-mode .page-link:hover {
        background-color: #2c292f !important;
        color: #af7eec;
    }

    .dark-mode .page-item.active a {
        background-color: #7e3fcc !important;
    }

    .dark-mode .page-item.active a:hover {
        color: #e3e3e3 !important;
    }

    .dark-mode #cart td,
    .dark-mode #cart th {
        border-color: #2c292f;
    }

    /* collapsing the navbar links into a column */
    @media (max-width: 576px) {
        .navbar-nav {
            flex-direction: column !important;
            align-items: flex-start !important;
        }
    }
</style>

<header class="navbar navbar-expand-sm navbar-light bg-light sticky-top" id="header">
    <div class="container-fluid w-l-75 w-xl-75">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.svg" width="30" height="30" alt="Logo" class="me-1" />
            Fabularium
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <form class="w-100 d-none d-sm-block" action="search.php" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search_query" placeholder="Wpisz tytuł, autora lub IBSN..." required>
                    <span class="input-group-text">
                        <div class="col-auto">
                            <button type="submit" name="submit" class="btn btn-link p-0 d-flex justify-content-center align-items-center">
                                <img src="images/magnifier-icon.svg" alt="Magnifying Glass" width="16" height="16">
                            </button>
                        </div>
                    </span>
                </div>
            </form>
            <ul class="navbar-nav w-100 justify-content-end mt-2 mt-sm-0">
                <li class="nav-item">
                    <a class="nav-link" href="katalog.php">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="o-nas.php">O nas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="opinie.php">Opinie</a>
                </li>
                <li class="nav-item d-none d-sm-block">
                    <a class="nav-link" href="koszyk.php">
                        <img id="cart-icon" src="images/shopping-cart-icon.svg" width="29" height="29" alt="Logo" />
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo isset($_SESSION['username']) ? 'Twój login: ' . $_SESSION['username'] : 'Gość'; ?>">
                    <a class="nav-link" href="logowanie.php">
                        <img id="user-icon" src="images/user-icon.svg" width="27" height="27" alt="Logo" />
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block">
                    <button id="toggleMode">
                        <canvas id="canvas" width="32" height="32"></canvas>
                    </button>
                </li>
                <li class="nav-item d-block d-sm-none">
                    <a class="nav-link" href="koszyk.php">Koszyk</a>
                </li>
                <li class="nav-item d-block d-sm-none">
                    <a class="nav-link" href="logowanie.php">Logowanie</a>
                </li>
                <li class="nav-item d-block d-sm-none mb-2">
                    <a class="nav-link" id="toggleModeText" href="#a" onclick="toggleMode()">Tryb jasny/ciemny</a>
                </li>
            </ul>
            <form class="w-100 d-sm-none" action="search.php" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search_query" placeholder="Wpisz tytuł, autora lub IBSN..." required>
                    <span class="input-group-text">
                        <div class="col-auto">
                            <button type="submit" name="submit" class="btn btn-link p-0 d-flex justify-content-center align-items-center">
                                <img src="images/magnifier-icon.svg" alt="Magnifying Glass" width="16" height="16">
                            </button>
                        </div>
                    </span>
                </div>
            </form>
        </div>
    </div>
</header>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>

<script>
    // Drawing functions
    function drawSun(ctx, sunColor) {
        ctx.fillStyle = sunColor;
        ctx.beginPath();
        ctx.arc(16, 16, 12, 0, Math.PI * 2);
        ctx.fill();
    }

    function drawMoon(ctx, moonColor, moonBackgroundColor) {
        ctx.save();
        ctx.translate(ctx.canvas.width / 2, ctx.canvas.height / 2);
        ctx.rotate((Math.PI / 180) * 85);
        ctx.translate(-ctx.canvas.width / 2, -ctx.canvas.height / 2);
        ctx.fillStyle = moonBackgroundColor;
        ctx.beginPath();
        ctx.arc(16, 16, 12, 0, Math.PI * 2);
        ctx.fill();
        ctx.fillStyle = moonColor;
        ctx.beginPath();
        ctx.arc(16, 10, 10, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
    }

    // Mode handling
    let isLightMode = localStorage.getItem('mode') === 'light';

    function setMode() {
        const canvas = document.getElementById('canvas');
        const header = document.getElementById('header');
        const cartIcon = document.getElementById('cart-icon');
        const userIcon = document.getElementById('user-icon');
        const ctx = canvas.getContext('2d');

        // Clear canvas
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);

        // Set mode
        document.body.classList.toggle('dark-mode', !isLightMode);
        header.classList.toggle('dark-mode-header', !isLightMode);
        cartIcon.src = isLightMode ? 'images/shopping-cart-icon-light.svg' : 'images/shopping-cart-icon-dark.svg';
        userIcon.src = isLightMode ? 'images/user-icon-light.svg' : 'images/user-icon-dark.svg';

        // Draw appropriate celestial body
        if (isLightMode) {
            drawSun(ctx, '#ffdb4d');
        } else {
            drawMoon(ctx, '#151718', '#d6d6d6');
        }
    }

    setMode(); // Apply initial mode

    // Set initial mode
    setMode();

    function toggleMode() {
        isLightMode = !isLightMode;
        localStorage.setItem('mode', isLightMode ? 'light' : 'dark');
        setMode();
    }

    document.getElementById('toggleMode').addEventListener('click', toggleMode);
</script>