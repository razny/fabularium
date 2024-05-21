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
</head>

<body class="bg">
    <?php include("includes/header.php"); ?>
    <?php include("includes/conn.php"); ?>
    <div class="d-flex align-items-center d-flex flex-column min-vh-100">
        <section class="my-2 w-75">
            <div class="container h-100 py-5">
                <?php
                // Check if the cart is empty
                if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                    echo '<div class="alert alert-secondary" role="alert">Brak produktów w koszyku. Sprawdź nasz szeroki wybór produktów w katalogu i znajdź coś dla siebie!</div>';
                } else { ?>
                    <!-- Display the payment form only if the cart is not empty -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="h5">Koszyk</th>
                                    <th scope="col">Cena</th>
                                    <th scope="col">Usuń</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalPurchaseAmount = 0;

                                // Iterate through cart items
                                foreach ($_SESSION['cart'] as $item) {
                                    $item_id = $item['id'];
                                    $item_quantity = $item['quantity'];

                                    // Fetch product details from the database
                                    $sql = "SELECT ID, Tytul, Autor, Okladka, Cena FROM pierwsze50 WHERE ID = $item_id";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) { ?>
                                            <!--Display the cart item with its details-->
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="produkt.php?ID=<?php echo ($row['ID']); ?>">
                                                            <img src="<?php echo htmlspecialchars($row['Okladka']); ?>" class="img-fluid rounded-3" alt="Cover of <?php echo htmlspecialchars($row['Tytul']); ?>" style="width:100px">
                                                        </a>
                                                        <div class="flex-column ms-4">
                                                            <p class="mb-2"><?php echo $row['Tytul']; ?></p>
                                                            <p class="mb-0 text-secondary"><?php echo $row['Autor']; ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php
                                                // Before rendering the quantity input field, update the quantity in the session if it's changed
                                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity_' . $item_id])) {
                                                    $new_quantity = $_POST['quantity_' . $item_id];
                                                    $_SESSION['cart'][$item_id]['quantity'] = $new_quantity;
                                                    $item_quantity = $new_quantity;
                                                }

                                                $item_total_price = $row['Cena'];
                                                $totalPurchaseAmount += $item_total_price; ?>

                                                <td id="price_<?php echo $item_id; ?>" class="align-middle">
                                                    <?php echo number_format($item_total_price, 2); ?> zł
                                                </td>
                                                <td class="align-middle">
                                                    <!-- Add a form with a hidden input field to remove the item -->
                                                    <form method="post" action="includes/remove_from_cart.php">
                                                        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                                                        <button type="submit" class="btn-close m-3"></button>
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
                    // Calculate the total amount (including delivery cost)
                    $deliveryCost = 9.99; // Assuming fixed delivery cost
                    $totalAmount = $totalPurchaseAmount + $deliveryCost;

                    // Display total amount and checkout button
                    ?>
                    <div class="card shadow-2-strong mt-5 py-3" style="border-radius: 16px;">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-6 col-lg-4 col-xl-6">
                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <div data-mdb-input-init class="form-outline mb-4 mb-xl-5">
                                                <input type="text" id="typeName" class="form-control form-control" placeholder="Jan Kowalski" />
                                                <label class="form-label" for="typeName">Imię i nazwisko na karcie</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <div data-mdb-input-init class="form-outline mb-4 mb-xl-5">
                                                <input type="text" id="typeExp" class="form-control form-control" placeholder="MM/RR" size="5" id="exp" minlength="5" maxlength="5" />
                                                <label class="form-label" for="typeExp">Data ważności</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <div data-mdb-input-init class="form-outline mb-4 mb-xl-5">
                                                <input type="text" id="typeText" class="form-control form-control" placeholder="1111 2222 3333 4444" minlength="16" maxlength="16" />
                                                <label class="form-label" for="typeText">Numer karty</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <div data-mdb-input-init class="form-outline mb-4 mb-xl-5">
                                                <input type="password" id="typeCvv" class="form-control form-control" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                                <label class="form-label" for="typeCvv">CVV</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Kwota zakupów</p>
                                        <p class="mb-2"><?php echo number_format($totalPurchaseAmount, 2); ?> zł</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">Dostawa</p>
                                        <p class="mb-0"><?php echo number_format($deliveryCost, 2); ?> zł</p>
                                    </div>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-2">Razem</p>
                                        <p class="mb-2"><?php echo number_format($totalAmount, 2); ?> zł</p>
                                    </div>
                                    <div class="d-flex justify-content-end mb-4">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()">
                                            <button type="submit" name="submit" class="btn btn-dark btn-block secondary border-0">
                                                <span>Zamów</span>
                                            </button>
                                        </form>
                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            // Clear the cart
                                            unset($_SESSION['cart']);
                                        ?>
                                            <script>
                                                // After clearing the cart, display an alert and allow the form submission
                                                alert("Dziękujemy za złożenie zamówienia!");
                                                // Redirect the user to the homepage or elsewhere after completing the order
                                                window.location = "index.php"; // Change "index.php" to the appropriate path
                                            </script>
                                        <?php
                                            // Terminate further PHP execution to avoid displaying a blank page
                                            exit;
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
        </section>
    </div>
    <?php include("includes/footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/validate_form.js"></script>
</body>

</html>