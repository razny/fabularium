<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="icon" type="image/x-icon" href="../images/favicon.svg">
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
    <section class="my-5 px-2 w-75">

      <section class="py-5">
        <div class="container px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                src="https://dummyimage.com/245x350/dee2e6/6c757d.jpg" style="max-width: 400px; height: auto;"
                alt="..." /></div>
            <div class="col-md-6">
              <h1 class="display-5 fw-bolder mb-3">Strona przykładowego produktu</h1>
              <div class="fs-5 mb-5">
                <span style="color: #908f8f">24,99zł</span>
              </div>
              <p class="lead mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem
                quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus
                ipsam minima ea iste laborum vero?</p>

              <div class="mb-3">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <th style="width: 30%;" scope="row">Autor:</th>
                      <td class="small">John Doe</td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">Wydawnictwo:</th>
                      <td class="small">Example Publisher</td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">Data wydania:</th>
                      <td class="small">January 1, 2023</td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">ISBN:</th>
                      <td class="small">978-3-16-148410-0</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="d-flex">
                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                  style="max-width: 3rem" />
                <button type="button" class="btn btn-dark secondary border-0">Dodaj do koszyka</button>
              </div>
            </div>
          </div>
        </div>
      </section>


    </section>
  </div>

  <footer class="primary text-center mt-2">
    <div class="text-center p-2">
      © 2024 Copyright:
      <a class="text-body" href="https://github.com/razny">razny</a>
    </div>
  </footer>

</body>

</html>