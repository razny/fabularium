<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/media-sizes.css" />
  <link rel="icon" type="image/x-icon" href="images/favicon.svg">
  <title>Fabularium - sklep z książkami dla każdego</title>
<!--TO DO:
  -responsiveness on sm+md devices (lg is def?)
        - navbar.... expanding......
        - please make it look good on mobile
  -why does the swiper not work outside of local server
  -make it possible to add comments to books (+php?)
  -plug up php sql db to make book catalogue Complete
  - search function mayb
  -bestsellers still??the webpage??maybe
  - how to add subpage for Every Product (+comments should be added to a particular entry, not to id which can change(?) because if i remove sth the enumeration would change)

-->
</head>

<body class="bg">
  <header class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
    <div class="container-fluid d-flex justify-content-around w-75">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="images/logo.svg" width="30" height="30" alt="Logo" class="me-2" />
        Fabularium</a>
      <form class="w-75">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Wpisz tytuł, autora lub IBSN...">
          <span class="input-group-text">
            <a href="#">
              <img src="images/magnifier-icon.svg" alt="Magnifying Glass" width="16" height="16">
            </a>
          </span>
        </div>
      </form>
      <ul class="navbar-nav d-flex align-items-center ms-2">
        <li class="nav-item">
          <a class="nav-link" href="pages/koszyk.php"><img src="images/shopping-cart-icon.svg" width="32" height="32"
              alt="Logo" /></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/logowanie.php"><img src="images/user-icon.svg" width="28" height="28"
              alt="Logo" /></a>
        </li>
      </ul>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-dark primary p-0">
    <div class="container-fluid d-flex justify-content-around w-50">
      <ul class="navbar-nav flex-row">
        <li class="nav-item me-3">
          <a class="nav-link" href="index.php">Strona główna</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="pages/katalog.php">Katalog</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="pages/bestsellery.php">Bestsellery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/o-nas.php">O nas</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="jumbotron position-relative d-flex justify-content-center align-items-center py-5">
    <div class="mask"></div>
    <section class="py-4 w-md-75 w-l-75 w-xl-75 position-relative z-index-1">
      <div class="w-md-75 w-l-75 w-xl-75 me-5 ms-3">
        <h1 class="display-4 mb-4">Odkryj świat literatury!</h1>
        <p class="lead me-5">Oferujemy szeroki wybór tytułów, które zaspokoją nawet najbardziej wymagające gusta
          czytelnicze i pozwolą Ci zgłębić tematykę, która Cię interesuje. Nasza księgarnia to nie tylko miejsce, gdzie
          możesz znaleźć książki - to przestrzeń, w której marzenia o literackich podróżach stają się rzeczywistością.
        </p>
        <p class="lead me-5">
          <a class="btn secondary btn-dark border-0 mt-4" href="pages/katalog.php" role="button">Zobacz wszystkie
            produkty</a>
        </p>
      </div>
    </section>
  </div>

  <section class="container-fluid bg mt-5 w-md-75">
    <h2 class="text-center my-5"><span class="bg">Polecane książki</span></h2>
    <div class="row text-center">
      <div class="swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="card align-items-center border-1">
              <img src="images/cover1.jpg" class="mt-3" alt="Book 1" style="width: 100px;">
              <div class="card-body mx-2">
                <h5 class="card-title">Tytuł książki pierwszy</h5>
                <p class="card-text text-secondary">Lorem adipisicing ipsum dolor</p>
                <button type="button" class="btn btn-dark secondary mt-2 border-0">Dodaj do koszyka</button>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card align-items-center border-1">
              <img src="images/cover2.jpeg" class="mt-3" alt="Book 2" style="width: 100px;">
              <div class="card-body mx-2">
                <h5 class="card-title">Tytuł książki drugi</h5>
                <p class="card-text text-secondary">Lorem adipisicing ipsum dolor</p>
                <button type="button" class="btn btn-dark secondary mt-2 border-0">Dodaj do koszyka</button>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card align-items-center border-1">
              <img src="images/cover3.png" class="mt-3" alt="Book 3" style="width: 100px;">
              <div class="card-body mx-2">
                <h5 class="card-title">Tytuł książki trzeci</h5>
                <p class="card-text text-secondary">Lorem adipisicing ipsum dolor</p>
                <button type="button" class="btn btn-dark secondary mt-2 border-0">Dodaj do koszyka</button>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card align-items-center border-1">
              <img src="images/cover4.jpg" class="mt-3" alt="Book 4" style="width: 100px;">
              <div class="card-body mx-2">
                <h5 class="card-title">Tytuł książki czwarty</h5>
                <p class="card-text text-secondary">Lorem adipisicing ipsum dolor</p>
                <button type="button" class="btn btn-dark secondary mt-2 border-0">Dodaj do koszyka</button>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card align-items-center border-1">
              <img src="images/cover5.jpg" class="mt-3" alt="Book 5" style="width: 100px;">
              <div class="card-body mx-2">
                <h5 class="card-title">Tytuł książki piąty</h5>
                <p class="card-text text-secondary">Lorem adipisicing ipsum dolor</p>
                <button type="button" class="btn btn-dark secondary mt-2 border-0">Dodaj do koszyka</button>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </section>

  <footer class="primary text-center mt-5">
    <div class="text-center p-2">
      © 2024 Copyright:
      <a class="text-body" href="https://github.com/razny">razny</a>
    </div>
  </footer>

  <script src="scripts/swiper.js"></script>
</body>

</html>