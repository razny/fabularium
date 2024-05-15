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
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["Tytul"];
            echo " - ";
            echo $row["Autor"];
            echo " ";
            echo "(ISBN: ";
            echo $row["ISBN"];
            echo ")";
            ?>
            <br>
    <?php
        }
    } else {
        echo "Nie znaleziono żadnych produktów.";
    }

    $a = 0;
    while ($a <= 19) {
        echo "<br>";
        $a++;
    }
    ?>
</section>
</div>
    <?php include("includes/footer.php"); ?>

</body>

</html>