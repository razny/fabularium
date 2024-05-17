<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/media-sizes.css" />
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    <title>Fabularium - koszyk</title>
</head>

<body class="bg">
   <?php include("includes/header.php"); ?>
    <div class="d-flex align-items-center justify-content-center">
        <section class="my-2 w-75">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-between align-items-center h-100">
                    <div class="col">
                        <?php
                        // Check if the cart is empty
                        $cartIsEmpty = !isset($_SESSION['cart']) || empty($_SESSION['cart']);
                        ?>
                        <?php if (!$cartIsEmpty) { ?>
                            <!-- Display the payment form only if the cart is not empty -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="h5">Koszyk</th>
                                            <th scope="col">Liczba</th>
                                            <th scope="col">Cena</th>
                                            <th scope="col">Usuń</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Database connection
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "blank";

                                        $conn = new mysqli($servername, $username, $password, $dbname);

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
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "<div class='d-flex align-items-center'>";
                                                    echo "<img src='{$row['Okladka']}' class='img-fluid rounded-3' style='width: 100px;' alt='Book'>";
                                                    echo "<div class='flex-column ms-4'>";
                                                    echo "<p class='mb-2'>{$row['Tytul']}</p>";
                                                    echo "<p class='mb-0 text-secondary'>{$row['Autor']}</p>";
                                                    echo "</div></div></td>";
                                                    // Before rendering the quantity input field, update the quantity in the session if it's changed
                                                    if (isset($_POST['quantity']) && isset($_POST['item_id'])) {
                                                        $item_id = $_POST['item_id'];
                                                        $new_quantity = $_POST['quantity'];
                                                        $_SESSION['cart'][$item_id]['quantity'] = $new_quantity;
                                                    }

                                                    // Check if there's a saved quantity in the session for the current item, and use that value
                                                    $item_quantity = isset($_SESSION['cart'][$item['id']]['quantity']) ? $_SESSION['cart'][$item['id']]['quantity'] : $item['quantity'];

                                                    // Render the quantity input field
                                                    echo "<td class='align-middle'>";
                                                    echo "<form id='updateForm_{$item['id']}' method='post' action='{$_SERVER['PHP_SELF']}'>";
                                                    echo "<input id='quantity_{$item['id']}' min='1' name='quantity' value='{$item_quantity}' type='number' class='form-control form-control-sm' style='width: 50px;' onchange='this.form.submit()' form='updateForm_{$item['id']}' />";
                                                    echo "<input type='hidden' name='item_id' value='{$item['id']}' />";
                                                    echo "</form>";
                                                    echo "</td>";
                                                    echo "<td id='price_{$item['id']}' class='align-middle'>" . number_format($item_quantity * $row['Cena'], 2) . " zł" . "</td>";

                                                    echo "<td class='align-middle'>";
                                                    // Add a form with a hidden input field to remove the item
                                                    echo "<form method='post' action='includes/remove_from_cart.php'>";
                                                    echo "<input type='hidden' name='item_id' value='$item_id'>";
                                                    echo "<button type='submit' class='btn-close m-3'></button>";
                                                    echo "</form>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        ?>
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
                                            $totalPurchaseAmount = 0;
                                            // Calculate the total purchase amount based on the quantities selected by the user
                                            // Check if $_SESSION['cart'] is set and not null
                                            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                                                // Calculate the total purchase amount based on the quantities selected by the user
                                                foreach ($_SESSION['cart'] as $item) {
                                                    $item_id = $item['id'];
                                                    $sql = "SELECT Cena FROM pierwsze50 WHERE ID = $item_id";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $totalPurchaseAmount += $item['quantity'] * $row['Cena'];
                                                        }
                                                    }
                                                }
                                            }
                                            // Calculate the total amount (including delivery cost)
                                            $deliveryCost = 9.99; // Assuming fixed delivery cost
                                            $totalAmount = $totalPurchaseAmount + $deliveryCost;
                                        ?>

                                        <div class="col-lg-4 col-xl-3">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Kwota zakupów</p>
                                                <p class="mb-2"><?php echo number_format($totalPurchaseAmount, 2); ?>zł</p>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0">Dostawa</p>
                                                <p class="mb-0"><?php echo number_format($deliveryCost, 2); ?>zł</p>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Razem</p>

                                                <p class="mb-2"><?php echo number_format($totalAmount, 2); ?>zł</p>
                                            </div>
                                            <div class="d-flex justify-content-end mb-4">
                                                <form method="POST" action="koszyk.php" onsubmit="return validateForm()">
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
                                                        // Po wyczyszczeniu koszyka wyświetl alert i pozwól na przesłanie formularza
                                                        alert("Dziękujemy za złożenie zamówienia!");
                                                        // Przekieruj użytkownika na stronę główną lub inną po zakończeniu zamówienia
                                                        window.location = "index.php"; // Zmień "index.php" na odpowiednią ścieżkę
                                                    </script>
                                                <?php
                                                    // Przerwij wykonanie dalszego kodu PHP, aby nie wyświetlać pustej strony
                                                    exit;
                                                }
                                                ?>
                                            </div>
                                    <?php }
                                    } else {
                                        echo '<div class="alert alert-secondary" role="alert">Brak produktów w koszyku. Sprawdź nasz szeroki wybór produktów w katalogu i znajdź coś dla siebie!</div>';
                                    }
                                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include("includes/footer.php"); ?>
</body>
<script>
    function updatePrice(itemId, basePrice) {
        var quantity = document.getElementById('quantity_' + itemId).value;
        var totalPrice = quantity * basePrice;
        // Format totalPrice with dots as separators
        var formattedPrice = totalPrice.toLocaleString('en-US', {
            minimumFractionDigits: 2
        }) + " zł";
        document.getElementById('price_' + itemId).innerText = formattedPrice;
    }
</script>
<script src="scripts/validate_form.js"></script>

</html>