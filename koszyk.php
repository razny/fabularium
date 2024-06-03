<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabularium - koszyk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media-sizes.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body class="bg">
    <?php include("includes/header.php"); ?>
    <?php include("includes/conn.php"); ?>
    <div class="d-flex align-items-center d-flex flex-column min-vh-100">
        <section class="my-2 w-md-75 w-100" id="cart">
            <div class="container h-100 py-5">
                <?php
                if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                    echo '<div class="alert alert-secondary" role="alert">Brak produktów w koszyku. Sprawdź nasz szeroki wybór produktów w katalogu i znajdź coś dla siebie!</div>';
                } else { ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="h5">Koszyk</th>
                                    <th scope="col" style="text-align: center;">Cena</th>
                                    <th scope="col" style="text-align: center;">Usuń</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalPurchaseAmount = 0;

                                foreach ($_SESSION['cart'] as $item) {
                                    $item_id = $item['id'];

                                    $sql = "SELECT ID, Tytul, Autor, Okladka, Cena FROM books WHERE ID = $item_id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="produkt.php?ID=<?php echo ($row['ID']); ?>">
                                                            <img src="<?php echo htmlspecialchars($row['Okladka']); ?>" class="img-fluid rounded-3" alt="Okładka książki <?php echo $row['Tytul']; ?>" style="max-width: 100px; max-height: 100px; width: auto; height: auto;">
                                                        </a>
                                                        <div class="flex-column ms-4">
                                                            <p class="mb-2"><?php echo $row['Tytul']; ?></p>
                                                            <p class="mb-0 text-secondary"><?php echo $row['Autor']; ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php
                                                $item_total_price = $row['Cena'];
                                                $totalPurchaseAmount += $item_total_price; ?>

                                                <td id="price_<?php echo $item_id; ?>" class="align-middle" style="text-align: center; white-space: nowrap;">
                                                    <?php echo number_format($item_total_price, 2); ?> zł
                                                </td>
                                                <td class="align-middle" style="text-align: center;">
                                                    <form method="post" action="includes/remove_from_cart.php">
                                                        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                                                        <button type="submit" class=" m-3" style="background: none; border: none;">
                                                            <img src="images/cross-icon-light.svg" class="close-btn" style="height: 24px; width: 24px;" alt="Usuń produkt z koszyka">
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                    <?php
                    $deliveryCost = 9.99;
                    $totalAmount = $totalPurchaseAmount + $deliveryCost;
                    ?>

                    <div class="mt-3 py-3">
                        <div>
                            <div class="row d-flex flex-column flex-md-row justify-content-center">
                                <div class="col-md-8 mb-4 mb-md-0">
                                    <div class="card shadow-2-strong p-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <input type="text" id="typeName" class="form-control" placeholder="Jan Kowalski" />
                                                    <label class="form-label" for="typeName">Imię i nazwisko na karcie</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <input type="text" id="typeExp" class="form-control" placeholder="MM/RR" size="5" id="exp" minlength="5" maxlength="5" />
                                                    <label class="form-label" for="typeExp">Data ważności</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <input type="text" id="typeText" class="form-control" placeholder="1111 2222 3333 4444" minlength="16" maxlength="16" />
                                                    <label class="form-label" for="typeText">Numer karty</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <input type="password" id="typeCvv" class="form-control" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                                    <label class="form-label" for="typeCvv">CVV</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 card">
                                    <div class="card-body shadow-2-strong p-4">
                                        <div class="flex-column">
                                            <div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <p class="mb-0">Kwota zakupów</p>
                                                    <p class="mb-0"><?php echo number_format($totalPurchaseAmount, 2); ?> zł</p>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <p class="mb-0">Dostawa</p>
                                                    <p class="mb-0"><?php echo number_format($deliveryCost, 2); ?> zł</p>
                                                </div>
                                                <hr class="my-2">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <p class="mb-0">Razem</p>
                                                    <p class="mb-0"><?php echo number_format($totalAmount, 2); ?> zł</p>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()">
                                                    <button type="submit" name="submit" class="btn btn-dark btn-block secondary border-0 mt-2">
                                                        <span>Zamów</span>
                                                    </button>
                                                </form>
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    unset($_SESSION['cart']);
                                                ?>
                                                    <script>
                                                        alert("Dziękujemy za złożenie zamówienia!");
                                                        window.location = "index.php";
                                                    </script>
                                                <?php
                                                    exit;
                                                } ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </section>
    </div>
    <?php include("includes/footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/validate_form.js"></script>
</body>

</html>