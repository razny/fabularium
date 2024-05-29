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
        background-color: #070509;
        color: #e3e3e3;
    }

    .dark-mode h2 {
        color: #e3e3e3;
    }

    .dark-mode .swiper::before {
  background: #070509;
}

.dark-mode .swiper::after {
  background: #070509;
}

.dark-mode section > h2 {
    width: 100%;
  text-align: center;
  border-bottom: 1px solid #828282;
  line-height: 0.1em;
  margin: 10px 0 20px;
  padding: 0.2em;
  font-size: 25px;
}

.dark-mode section > h2 span {
    padding: 5px 20px;
  border-style: solid;
  border-width: 1px;
  border-radius: 5px;
  border-color: #828282;
  background-color: #070509 !important;
}

.dark-mode #swiper {
    background: #070509;
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

.dark-mode td, .dark-mode tr {
    color: #e3e3e3;
}

.dark-mode #catalog .card {
  transition: box-shadow 0.3s ease;
}

.dark-mode #catalog .card:hover {
  box-shadow: 0 0 20px #4a4a4a;
}

.dark-mode .counter {
  background-color: #18161a!important;
  padding: 10px 0;
  border-radius: 10px;
}

.dark-mode .card .btn {
    background: #7e3fcc!important;
}

.dark-mode .card .btn:hover {
    background: #9345f5!important;
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

.dark-mode .card-title a {
    color: #e3e3e3;
}

.dark-mode #produkt .btn {
    background: #7e3fcc;
}

.dark-mode #produkt .btn:hover {
    background: #9345f5;
}

.dark-mode section .form-control, .dark-mode section .form-control:hover, .dark-mode section .form-control:focus {
    background-color: #1f1d21;
    color: #e3e3e3;
    border-color: #717171;
}

.dark-mode section input::placeholder{
    color: #717171;
}

.dark-mode .alert {
    background-color: #1f1d21;
    color: #e3e3e3;
    border-color: #717171;
}

.dark-mode .page-link , .dark-mode .page-link a {
    background-color: #1f1d21!important;
    border-color: #717171;
    color: #af7eec;
}

.dark-mode .page-link:hover {
    color: #e3e3e3;
}

.dark-mode #cart td, .dark-mode #cart th {
    border-color: #717171;
}

    /* collapsing the navbar links into a column */
    @media (max-width: 576px) {
        .navbar-nav {
            flex-direction: column !important;
            align-items: flex-start !important;
        }
    }
</style>

<header class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
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
                        <img src="images/shopping-cart-icon.svg" width="29" height="29" alt="Logo" />
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo isset($_SESSION['username']) ? 'Twój login: ' . $_SESSION['username'] : 'Gość'; ?>">
                    <a class="nav-link" href="logowanie.php">
                        <img src="images/user-icon.svg" width="27" height="27" alt="Logo" />
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
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
        ctx.fillStyle = sunColor; // Set sun color
        ctx.beginPath();
        ctx.arc(16, 16, 12, 0, Math.PI * 2);
        ctx.fill();
    }

    function drawMoon(ctx, moonColor, moonBackgroundColor) {
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
        ctx.save();
        ctx.translate(ctx.canvas.width / 2, ctx.canvas.height / 2);
        ctx.rotate((Math.PI / 180) * 90);
        ctx.translate(-ctx.canvas.width / 2, -ctx.canvas.height / 2);
        ctx.fillStyle = moonBackgroundColor; // Set background color
        ctx.beginPath();
        ctx.arc(16, 16, 12, 0, Math.PI * 2);
        ctx.fill();
        ctx.fillStyle = moonColor; // Set moon color
        ctx.beginPath();
        ctx.arc(16, 10, 10, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
    }

    // Mode handling
    let isLightMode = localStorage.getItem('mode') === 'light';

    function setMode() {
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        if (isLightMode) {
            document.body.classList.remove('dark-mode');
            drawSun(ctx, '#ffdb4d'); // Yellow sun
        } else {
            document.body.classList.add('dark-mode');
            drawMoon(ctx, '#ffdb4d', '#222'); // Yellow moon on dark background
        }
    }

    // Set initial mode
    setMode();

    function toggleMode() {
        isLightMode = !isLightMode;
        localStorage.setItem('mode', isLightMode ? 'light' : 'dark');
        setMode();
    }

    document.getElementById('toggleMode').addEventListener('click', toggleMode);
</script>