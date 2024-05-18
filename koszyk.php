<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/media-sizes.css" />
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    <script src="scripts/validate_form.js"></script>
    <title>Fabularium - koszyk</title>
</head>

<body class="bg ">
    <?php include("includes/header.php"); ?>
    <div class="d-flex align-items-center d-flex flex-column min-vh-100">
        <section class="my-2 w-75">
            <div class="container h-100 py-5">
                <?php
                // Check if the cart is empty
                if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                    echo '<div class="alert alert-secondary" role="alert">Brak produktów w koszyku. Sprawdź nasz szeroki wybór produktów w katalogu i znajdź coś dla siebie!</div>';
                } else {
                    // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "blank";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Display the payment form only if the cart is not empty
                    echo '<div class="table-responsive">';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col" class="h5">Koszyk</th>';
                    echo '<th scope="col">Cena</th>';
                    echo '<th scope="col">Usuń</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    $totalPurchaseAmount = 0;

                    // Iterate through cart items
                    foreach ($_SESSION['cart'] as $item) {
                        $item_id = $item['id'];
                        $item_quantity = $item['quantity'];

                        // Fetch product details from the database
                        $sql = "SELECT Tytul, Autor, Okladka, Cena FROM pierwsze50 WHERE ID = $item_id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                // Display the cart item with its details
                                echo '<tr>';
                                echo '<td>';
                                echo '<div class="d-flex align-items-center">';
                                echo '<img src="' . $row['Okladka'] . '" class="img-fluid rounded-3" style="width: 100px;" alt="Book">';
                                echo '<div class="flex-column ms-4">';
                                echo '<p class="mb-2">' . $row['Tytul'] . '</p>';
                                echo '<p class="mb-0 text-secondary">' . $row['Autor'] . '</p>';
                                echo '</div></div></td>';

                                // Before rendering the quantity input field, update the quantity in the session if it's changed
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity_' . $item_id])) {
                                    $new_quantity = $_POST['quantity_' . $item_id];
                                    $_SESSION['cart'][$item_id]['quantity'] = $new_quantity;
                                    $item_quantity = $new_quantity;
                                }

                                $item_total_price = $row['Cena'];
                                $totalPurchaseAmount += $item_total_price;

                                echo '<td id="price_' . $item_id . '" class="align-middle">' . number_format($item_total_price, 2) . ' zł</td>';

                                echo '<td class="align-middle">';
                                // Add a form with a hidden input field to remove the item
                                echo '<form method="post" action="includes/remove_from_cart.php">';
                                echo '<input type="hidden" name="item_id" value="' . $item_id . '">';
                                echo '<button type="submit" class="btn-close m-3"></button>';
                                echo '</form>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';

                    // Calculate the total amount (including delivery cost)
                    $deliveryCost = 9.99; // Assuming fixed delivery cost
                    $totalAmount = $totalPurchaseAmount + $deliveryCost;

                    // Display total amount and checkout button
                    echo '<div class="card shadow-2-strong mt-5 py-3" style="border-radius: 16px;">';
                    echo '<div class="card-body p-4">';
                    echo '<div class="row d-flex justify-content-between">';
                ?>
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
                    <?php
                    echo '<div class="col-lg-4 col-xl-3">';
                    echo '<div class="d-flex justify-content-between">';
                    echo '<p class="mb-2">Kwota zakupów</p>';
                    echo '<p class="mb-2">' . number_format($totalPurchaseAmount, 2) . ' zł</p>';
                    echo '</div>';
                    echo '<div class="d-flex justify-content-between">';
                    echo '<p class="mb-0">Dostawa</p>';
                    echo '<p class="mb-0">' . number_format($deliveryCost, 2) . ' zł</p>';
                    echo '</div>';
                    echo '<hr class="my-4">';
                    echo '<div class="d-flex justify-content-between mb-4">';
                    echo '<p class="mb-2">Razem</p>';
                    echo '<p class="mb-2">' . number_format($totalAmount, 2) . ' zł</p>';
                    echo '</div>';
                    echo '<div class="d-flex justify-content-end mb-4">';
                    echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '" onsubmit="return validateForm()">';
                    echo '<button type="submit" name="submit" class="btn btn-dark btn-block secondary border-0">';
                    echo '<span>Zamów</span>';
                    echo '</button>';
                    echo '</form>';
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Clear the cart
                        unset($_SESSION['cart']);
                    ?>
                        <script>
                            // Po wyczyszczeniu koszyka wyświetl alert i pozwól na przesłanie formularza
                            alert("Dziękujemy za złożenie zamówienia!");
                            // Przekieruj użytkownika na stronę główną lub inną po zakończeniu zamówienia
                            window.location = "index.php"; // Zmień "index.php" na odpowiednią ścieżkę
                        </script>
                <?php
                        // Przerwij wykonanie dalszego kodu PHP, aby nie wyświetlać pustej strony
                        exit;
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </div>
    <?php include("includes/footer.php"); ?>
</body>

</html>