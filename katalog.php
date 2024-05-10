<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles/style.css" />
  <link rel="stylesheet" href="styles/media-sizes.css" />
  <link rel="icon" type="image/x-icon" href="images/favicon.svg">
  <title>Fabularium - katalog</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg">
  <!--header start -->
  <?php include("includes/header.php"); ?>
  <!--header end -->

  <div class="d-flex align-items-center justify-content-center" id="catalog">
    <section class="my-3 px-2 w-75">
      <div class="container pt-5">
        <div class="row">
          <div class="col-md-8 order-md-2 col-lg-9">
            <div class="container-fluid">
              <div class="row">

                <!-- Dropdown column -->
                <div class="col-md-6">
                  <div class="dropdown">
                    <button type="button" class="btn btn-dark secondary border-0 dropdown-toggle" data-bs-toggle="dropdown">
                      Sortuj wg:
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Trafność</a></li>
                      <li><a class="dropdown-item" href="#">Nazwy: A do Z</a></li>
                      <li><a class="dropdown-item" href="#">Nazwy: Z do A</a></li>
                      <li><a class="dropdown-item" href="#">Cena: od najniższej</a></li>
                      <li><a class="dropdown-item" href="#">Cena: od najwyższej</a></li>
                    </ul>
                  </div>
                </div>

                <!-- Pagination column -->
                <div class="col-md-6">
                  <div class="col-md-12 mb-3">
                    <ul class="pagination justify-content-end">
                      <li class="page-item"><a class="page-link" href="#">Poprzednia</a></li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Następna</a></li>
                    </ul>
                  </div>
                </div>

                <!-- Product cards -->
                <div class="col-6 col-md-6 col-lg-4 mb-3">
                  <div class="card h-100 border-0">
                    <div class="card-img-top mt-4">
                      <a href="produkt.php"><img src="https://via.placeholder.com/140x200/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap"></a>
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title mb-1">
                        <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none">Nazwa książki</a>
                      </h5>
                      <p class="card-text mb-2 small text-secondary">Autor utworu</p>
                      <h6 class="card-price font-weight-bold text-dark">49.99zł</h6>
                      <button type="button" class="btn btn-dark btn-sm mt-2 secondary border-0">Dodaj do
                        koszyka</button>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-6 col-lg-4 mb-3">
                  <div class="card h-100 border-0">
                    <div class="card-img-top mt-4">
                      <a href="produkt.php"><img src="https://via.placeholder.com/140x200/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap"></a>
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title mb-1">
                        <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none">Nazwa książki</a>
                      </h5>
                      <p class="card-text mb-2 small text-secondary">Autor utworu</p>
                      <h6 class="card-price font-weight-bold text-dark">49.99zł</h6>
                      <button type="button" class="btn btn-dark btn-sm mt-2 secondary border-0">Dodaj do
                        koszyka</button>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-6 col-lg-4 mb-3">
                  <div class="card h-100 border-0">
                    <div class="card-img-top mt-4">
                      <a href="produkt.php"><img src="https://via.placeholder.com/140x200/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap"></a>
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title mb-1">
                        <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none">Nazwa książki</a>
                      </h5>
                      <p class="card-text mb-2 small text-secondary">Autor utworu</p>
                      <h6 class="card-price font-weight-bold text-dark">49.99zł</h6>
                      <button type="button" class="btn btn-dark btn-sm mt-2 secondary border-0">Dodaj do
                        koszyka</button>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-6 col-lg-4 mb-3">
                  <div class="card h-100 border-0">
                    <div class="card-img-top mt-4">
                      <a href="produkt.php"><img src="https://via.placeholder.com/140x200/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap"></a>
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title mb-1">
                        <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none">Nazwa książki</a>
                      </h5>
                      <p class="card-text mb-2 small text-secondary">Autor utworu</p>
                      <h6 class="card-price font-weight-bold text-dark">49.99zł</h6>
                      <button type="button" class="btn btn-dark btn-sm mt-2 secondary border-0">Dodaj do
                        koszyka</button>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-6 col-lg-4 mb-3">
                  <div class="card h-100 border-0">
                    <div class="card-img-top mt-4">
                      <a href="produkt.php"><img src="https://via.placeholder.com/140x200/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap"></a>
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title mb-1">
                        <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none">Nazwa książki</a>
                      </h5>
                      <p class="card-text mb-2 small text-secondary">Autor utworu</p>
                      <h6 class="card-price font-weight-bold text-dark">49.99zł</h6>
                      <button type="button" class="btn btn-dark btn-sm mt-2 secondary border-0">Dodaj do
                        koszyka</button>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-6 col-lg-4 mb-3">
                  <div class="card h-100 border-0">
                    <div class="card-img-top mt-4">
                      <a href="produkt.php"><img src="https://via.placeholder.com/140x200/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap"></a>
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title mb-1">
                        <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none">Nazwa książki</a>
                      </h5>
                      <p class="card-text mb-2 small text-secondary">Autor utworu</p>
                      <h6 class="card-price font-weight-bold text-dark">49.99zł</h6>
                      <button type="button" class="btn btn-dark btn-sm mt-2 secondary border-0">Dodaj do
                        koszyka</button>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-6 col-lg-4 mb-3">
                  <div class="card h-100 border-0">
                    <div class="card-img-top mt-4">
                      <a href="produkt.php"><img src="https://via.placeholder.com/140x200/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap"></a>
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title mb-1">
                        <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none">Nazwa książki</a>
                      </h5>
                      <p class="card-text mb-2 small text-secondary">Autor utworu</p>
                      <h6 class="card-price font-weight-bold text-dark">49.99zł</h6>
                      <button type="button" class="btn btn-dark btn-sm mt-2 secondary border-0">Dodaj do
                        koszyka</button>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-6 col-lg-4 mb-3">
                  <div class="card h-100 border-0">
                    <div class="card-img-top mt-4">
                      <a href="produkt.php"><img src="https://via.placeholder.com/140x200/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap"></a>
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title mb-1">
                        <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none">Nazwa książki</a>
                      </h5>
                      <p class="card-text mb-2 small text-secondary">Autor utworu</p>
                      <h6 class="card-price font-weight-bold text-dark">49.99zł</h6>
                      <button type="button" class="btn btn-dark btn-sm mt-2 secondary border-0">Dodaj do
                        koszyka</button>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-6 col-lg-4 mb-3">
                  <div class="card h-100 border-0">
                    <div class="card-img-top mt-4">
                      <a href="produkt.php"><img src="https://via.placeholder.com/140x200/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap"></a>
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title mb-1">
                        <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none">Nazwa książki</a>
                      </h5>
                      <p class="card-text mb-2 small text-secondary">Autor utworu</p>
                      <h6 class="card-price font-weight-bold text-dark">49.99zł</h6>
                      <button type="button" class="btn btn-dark btn-sm mt-2 secondary border-0">Dodaj do
                        koszyka</button>
                    </div>
                  </div>
                </div>
                <!-- pagination - bottom -->
                <div class="col-md-12 mt-3">
                  <ul class="pagination justify-content-end">
                    <li class="page-item"><a class="page-link" href="#">Poprzednia</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Następna</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
            <h4 class="mb-3">Filtruj</h4>
            <!-- Price Filter -->
            <div class="mb-3">
              <label for="price-range" class="form-label">Cena (zł)</label>
              <select class="form-select" id="price-range">
                <option value="" disabled selected>Wybierz zakres cenowy...</option>
                <option value="0-10">0 - 10 zł</option>
                <option value="10-20">10 - 20 zł</option>
                <option value="20-30">20 - 30 zł</option>
                <option value="30-40">30 - 40 zł</option>
                <option value="40-50">40 - 50 zł</option>
                <option value="50+">Powyżej 50 zł</option>
              </select>
            </div>


            <label class="form-label">Category Filter</label>
            <div>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Fiction</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Non-Fiction</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Biography</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Fantasy</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Science Fiction</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Mystery</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Thriller</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Romance</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Historical</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Self-Help</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Business</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Travel</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Cookbook</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Art</a>
              <a href="#" class="text-decoration-none d-block mb-2 primary-text">Music</a>
            </div>
          </div>

        </div>
    </section>
  </div>

  <!--footer start -->
  <?php include("includes/footer.php"); ?>
  <!--footer end -->

</body>

</html>