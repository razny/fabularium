<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="icon" type="image/x-icon" href="../images/favicon.svg">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Fabularium - o nas</title>
</head>

<body class="bg">
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
          <a class="nav-link" href="#"><img src="../images/shopping-cart-icon.svg" width="32" height="32"
              alt="Logo" /></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><img src="../images/user-icon.svg" width="28" height="28" alt="Logo" /></a>
        </li>
      </ul>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-dark primary p-0">
    <div class="container-fluid d-flex justify-content-around w-50">
      <ul class="navbar-nav flex-row">
        <li class="nav-item me-3">
          <a class="nav-link" href="../index.php">Strona główna</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="katalog.php">Katalog</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="bestsellery.php">Bestsellery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="o-nas.php">O nas</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="d-flex align-items-center justify-content-center">
    <section class="my-3 px-2 w-75">

      <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
          <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6 col-xl-5 align-self-start">
              <img class="img-fluid rounded mb-4 mt-2" src="../images/team.jpg" alt="">
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
              <div class="row justify-content-xl-center">
                <div class="col-12 col-xl-11">
                  <h2 class="h1 mb-3">Kim jesteśmy?</h2>
                  <div class="d-flex flex-column justify-content-around">
                    <p class="lead fs-5 text-secondary">Jesteśmy pasjonatami literatury i wierzymy, że dobre książki
                      mogą zmieniać świat. W Fabularium dbamy o to, aby dostarczać naszym klientom najlepsze tytuły z
                      różnorodnych gatunków literackich. Niezależnie od tego, czy jesteś miłośnikiem literatury
                      klasycznej, fantastyki,
                      czy kryminałów, mamy coś dla Ciebie. Nasz zespół pasjonatów z przyjemnością dzieli się swoją
                      wiedzą i służy pomocą w wyborze odpowiednich książek.</p>
                    <div class="row gy-4 gy-md-0 gx-xxl-5X my-sm-3">
                      <div class="col-12 col-md-6">
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <img src="../images/victory-motivation-icon.svg" alt="" class="icon" width="32" height="32">
                          </div>
                          <div>
                            <h4 class="mb-3">Profesjonalizm</h4>
                            <p class="text-secondary mb-0">Nasz zespół dba o każdy szczegół, starannie obsługując
                              klientów
                              i zawsze gotowy wysłuchać ich potrzeb.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <img src="../images/hands-helping-icon.svg" alt="" class="icon" width="32" height="32">
                          </div>
                          <div>
                            <h4 class="mb-3">Zaangażowanie</h4>
                            <p class="text-secondary mb-0">Promujemy czytelnictwo i angażujemy się w działania
                              społeczne,
                              organizując akcje charytatywne.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <hr>
      <div class="container">
        <div class="row">
          <br />
          <div class="col text-center mb-3">
            <h2>Nasz sklep w liczbach</h2>
          </div>

        </div>
        <div class="row text-center">
          <div class="col">
            <div class="counter">
              <i class="fa fa-2x"></i>
              <h2 class="timer count-title count-number" data-to="8237" data-speed="600"></h2>
              <p class="count-text mb-3">Książek w magazynie</p>
            </div>
          </div>
          <div class="col">
            <div class="counter">
              <i class="fa fa-2x"></i>
              <h2 class="timer count-title count-number" data-to="55" data-speed="600"></h2>
              <p class="count-text mb-3">Dostępnych gatunków</p>
            </div>
          </div>
          <div class="col">
            <div class="counter">
              <i class="fa fa-2x"></i>
              <h2 class="timer count-title count-number" data-to="2192" data-speed="600"></h2>
              <p class="count-text mb-3">Różnych autorów</p>
            </div>
          </div>

    </section>
  </div>

  <footer class="primary text-center mt-5">
    <div class="text-center p-2">
      © 2024 Copyright:
      <a class="text-body" href="https://github.com/razny">razny</a>
    </div>
  </footer>

  <script src="../scripts/counter.js"></script>

</body>

</html>