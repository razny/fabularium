<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fabularium - opinie klientów</title>
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
  <div class="d-flex align-items-center justify-content-center">
    <section class="my-4 px-2 w-md-75 w-100">
      <h3 class="text-center mb-3 mt-3">Opinie klientów o naszym sklepie</h3>
      <hr>
      <div class="container" id="reviews">
        <?php
        if (isset($_POST["submit"])) {
          $nazwa = $_POST["nazwa"];
          $wiad = $_POST["wiad"];

          $zapytanie = "INSERT INTO opinie (nazwa, wiadomosc) VALUES ('$nazwa', '$wiad')";
          mysqli_query($conn, $zapytanie);
        }

        $sql = "SELECT * FROM opinie ORDER BY id DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) { // istniejące już opinie
            echo '<div class="card mb-3">
                    <div class="card-body">
                      <p class="card-text"><strong class="me-2">' . $row["nazwa"] . '</strong>' . $row["wiadomosc"] . '</p>
                    </div>
                  </div>';
          }
        }
        mysqli_close($conn);
        ?>

        <hr class="mt-2">
        <h4 class="card-title my-4">Podziel się swoją opinią!</h4>
        <?php
        if (!isset($_SESSION['username'])) {
          echo "<div class='alert alert-light text-center' role='alert'>Tylko zalogowani użytkownicy mogą dodawać komentarze!</div>";
        } else { // wyświetl formularz dodawania komentarza
        ?>
          <form action="opinie.php" method="POST">
            <div class="form-group">
              <label for="nazwa">Nazwa:</label>
              <?php
              $username = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 
              echo "<input type='text' class='form-control' id='nazwa' name='nazwa' value='$username' readonly>"; // nazwa użytkownika pobierana z sesji
              ?>
            </div>
            <div class="form-group">
              <label for="wiad">Wiadomość:</label>
              <textarea class="form-control" id="wiad" name="wiad" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-dark border-0" name="submit">Wyślij</button>
          </form>
        <?php } ?>
      </div>
    </section>

  </div>
  <?php include("includes/footer.php"); ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>