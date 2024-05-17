<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="stylesheet" href="styles/media-sizes.css" />
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    <title>Fabularium - wyszukiwanie</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php include("includes/header.php"); ?>

    <div class="d-flex align-items-center justify-content-center" id="catalog">
        <section class="my-3 px-2 w-75">
            <?php
            $search_result = ""; // Initialize variable to hold search result HTML

            if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                $search_query = $_GET['search_query'];
                echo "Wyniki wyszukiwania dla <b>" . $search_query . "</b>:<br><br>";
            } else {
                echo "Nie znaleziono produktów dla twojego zapytania.";
            }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "blank";

            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "SELECT * FROM pierwsze50 WHERE Tytul LIKE '%$search_query%' OR Autor LIKE '%$search_query%' OR ISBN LIKE '%$search_query%'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <div class="col-12 col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100 border-0">
                                        <div class="card-img-top mt-4">
                                            <a href="produkt.php?ID=<?php echo htmlspecialchars($row['ID']); ?>">
                                                <img src="<?php echo htmlspecialchars($row['Okladka']); ?>" class="img-fluid mx-auto d-block" alt="Cover of <?php echo htmlspecialchars($row['Tytul']); ?>" style="height:200px">
                                            </a>
                                        </div>
                                        <div class="card-body text-center d-flex flex-column">
                                            <h5 class="card-title mb-1">
                                                <a href="produkt.php?id=<?php echo htmlspecialchars($row['ID']); ?>" class="font-weight-bold text-dark text-decoration-none">
                                                    <?php echo htmlspecialchars($row['Tytul']); ?>
                                                </a>
                                            </h5>
                                            <p class="card-text mb-2 small text-secondary">
                                                <?php echo htmlspecialchars($row['Autor']); ?>
                                            </p>
                                            <h6 class="card-price font-weight-bold text-dark">
                                                <?php echo htmlspecialchars($row['Cena']); ?> zł
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>


            <?php
            } else {
                echo "Nie znaleziono żadnych produktów.";
            }
            ?>
        </section>
    </div>
    <?php include("includes/footer.php"); ?>

</body>

</html>