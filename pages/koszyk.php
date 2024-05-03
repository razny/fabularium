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

    <!--header start -->
    <?php include("includes/header.php"); ?>
    <!--header end -->

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
                                                <img src="../images/cover2.jpeg" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2">Thinking, Fast and Slow</p>
                                                    <p class="mb-0 text-secondary">Daniel Kahneman</p>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle">
                                            <div>
                                                <input id="form1" min="0" name="quantity" value="2" type="number" class="form-control form-control-sm" style="width: 50px;" />
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0">14,99zł</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="border-bottom-0">
                                            <div class="d-flex align-items-center">
                                                <img src="../images/cover5.jpg" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2">Homo Deus: A Brief History of Tomorrow</p>
                                                    <p class="mb-0 text-secondary">Yuval Noah Harari</p>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle border-bottom-0">
                                            <div>
                                                <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control form-control-sm" style="width: 50px;" />
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
                                                    <input type="text" id="typeName" class="form-control form-control" placeholder="Jan Kowalski" />
                                                    <label class="form-label" for="typeName">Imię i nazwisko na
                                                        karcie</label>
                                                </div>

                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="typeExp" class="form-control form-control" placeholder="MM/YY" size="7" id="exp" minlength="7" maxlength="7" />
                                                    <label class="form-label" for="typeExp">Data ważności</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-6">
                                                <div data-mdb-input-init class="form-outline mb-4 mb-xl-5">
                                                    <input type="text" id="typeText" class="form-control form-control" placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                                                    <label class="form-label" for="typeText">Numer karty</label>
                                                </div>

                                                <div data-mdb-input-init class="form-outline"> <!--fix margin on smaller devices-->
                                                    <input type="password" id="typeText" class="form-control form-control" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
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
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block secondary border-0">
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

    <!--footer start -->
    <?php include("includes/footer.php"); ?>
    <!--footer end -->

</body>

</html>