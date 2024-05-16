<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/media-sizes.css" />
  <link rel="icon" type="image/x-icon" href="images/favicon.svg">
  <title>Fabularium - opinie klientów</title>
</head>

<body class="bg">
  <!--header start -->
  <?php include("includes/header.php"); ?>
  <!--header end -->

  <div class="d-flex align-items-center justify-content-center">
    <section class="my-5 px-2 w-75">
      <h3 class="text-center mb-3">Opinie klientów o naszym sklepie</h3>
      <hr>

      <div class="container">
        <?php
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "blank");

        // Process form submission
        if (isset($_POST["submit"])) {
          $nazwa = $_POST["nazwa"];
          $wiad = $_POST["wiad"];

          $zapytanie = "INSERT INTO opinie (nazwa, wiadomosc) VALUES ('$nazwa', '$wiad')";
          mysqli_query($conn, $zapytanie);
        }

        // Fetch and display reviews
        $sql = "SELECT * FROM opinie ORDER BY id DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="card mb-3">
                    <div class="card-body">
                      <p class="card-text"><strong class="me-2">' . $row["nazwa"] . '</strong>' . $row["wiadomosc"] . '</p>
                    </div>
                  </div>';
          }
        }
        // Close the database connection
        mysqli_close($conn);
        ?>

        <hr class="mt-5 ">
        <h4 class="card-title mb-4">Podziel się swoją opinią!</h4>
        <form action="opinie.php" method="POST">
          <div class="form-group">
            <label for="nazwa">Nazwa:</label>
            <input type="text" class="form-control" id="nazwa" name="nazwa" required>
          </div>
          <div class="form-group">
            <label for="wiad">Wiadomość:</label>
            <textarea class="form-control" id="wiad" name="wiad" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-dark secondary border-0" name="submit">Wyślij</button>
        </form>

      </div>
    </section>
  </div>

  <!--footer start -->
  <?php include("includes/footer.php"); ?>
  <!--footer end -->

</body>

</html>
