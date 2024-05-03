<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="icon" type="image/x-icon" href="../images/favicon.svg">
    <title>Fabularium - koszyk</title>
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
                    <a class="nav-link" href="#"><img src="../images/user-icon.svg" width="28" height="28"
                            alt="Logo" /></a>
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
        <section class="my-2 w-75">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="h5">Koszyk</th>
                                        <th scope="col">Liczba</th>
                                        <th scope="col">Cena</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="../images/cover2.jpeg" class="img-fluid rounded-3"
                                                    style="width: 120px;" alt="Book">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2">Thinking, Fast and Slow</p>
                                                    <p class="mb-0 text-secondary">Daniel Kahneman</p>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle">
                                            <div>
                                                <input id="form1" min="0" name="quantity" value="2" type="number"
                                                    class="form-control form-control-sm" style="width: 50px;" />
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0">14,99zł</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="border-bottom-0">
                                            <div class="d-flex align-items-center">
                                                <img src="../images/cover5.jpg" class="img-fluid rounded-3"
                                                    style="width: 120px;" alt="Book">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2">Homo Deus: A Brief History of Tomorrow</p>
                                                    <p class="mb-0 text-secondary">Yuval Noah Harari</p>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle border-bottom-0">
                                            <div>
                                                <input id="form1" min="0" name="quantity" value="1" type="number"
                                                    class="form-control form-control-sm" style="width: 50px;" />
                                            </div>
                                        </td>
                                        <td class="align-middle border-bottom-0">
                                            <p class="mb-0">14,99zł</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card shadow-2-strong mt-5 py-3" style="border-radius: 16px;">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-6 col-lg-4 col-xl-6">
                                        <div class="row">
                                            <div class="col-12 col-xl-6">
                                                <div data-mdb-input-init class="form-outline mb-4 mb-xl-5">
                                                    <input type="text" id="typeName"
                                                        class="form-control form-control"
                                                        placeholder="Jan Kowalski" />
                                                    <label class="form-label" for="typeName">Imię i nazwisko na
                                                        karcie</label>
                                                </div>

                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="typeExp" class="form-control form-control"
                                                        placeholder="MM/YY" size="7" id="exp" minlength="7"
                                                        maxlength="7" />
                                                    <label class="form-label" for="typeExp">Data ważności</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-6">
                                                <div data-mdb-input-init class="form-outline mb-4 mb-xl-5">
                                                    <input type="text" id="typeText"
                                                        class="form-control form-control"
                                                        placeholder="1111 2222 3333 4444" minlength="19"
                                                        maxlength="19" />
                                                    <label class="form-label" for="typeText">Numer karty</label>
                                                </div>

                                                <div data-mdb-input-init class="form-outline"> <!--fix margin on smaller devices-->
                                                    <input type="password" id="typeText"
                                                        class="form-control form-control"
                                                        placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                        maxlength="3" />
                                                    <label class="form-label" for="typeText">CVV</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-3">
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Kwota zakupów</p>
                                            <p class="mb-2">29,98zł</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0">Dostawa</p>
                                            <p class="mb-0">9,99zł</p>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Razem</p>
                                            <p class="mb-2">39,97zł</p>
                                        </div>
                                        <div class="d-flex justify-content-end mb-4">
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-dark btn-block secondary border-0">
                                                <span>Zamów</span>
                                        </button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>