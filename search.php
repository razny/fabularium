<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabularium - wyszukiwanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="styles/media-sizes.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/conn.php"); ?>

    <section class="d-flex align-items-center justify-content-center" id="catalog">
        <div class="my-4 px-2 w-75 min-vh-100">
            <div class="text-center">
                <?php
                $search_result = ""; // Initialize variable to hold search result HTML

                if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                    $search_query = $_GET['search_query'];
                    echo "<h4>Wyniki wyszukiwania dla <b>" . $search_query . "</b>:</h4>";
                } else {
                    echo "Nie znaleziono produktów dla twojego zapytania.";
                }
                ?> </div>
            <hr> <?php
                    $sql = "SELECT * FROM books WHERE Tytul LIKE '%$search_query%' OR Autor LIKE '%$search_query%' OR ISBN LIKE '%$search_query%'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { ?>
                <div class="row mt-4">
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
        </div>
    </section>
    <?php include("includes/footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>