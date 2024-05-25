<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fabularium - o nas</title>
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
  <div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="my-3 px-2 w-75">
      <section class="py-3 py-md-5 py-xl-8">
        <div class="container">
          <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6 col-xl-5 align-self-start">
              <img class="img-fluid rounded mb-4 mt-2" src="images/team.jpg" alt="">
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
              <div class="row justify-content-xl-center">
                <div class="col-12 col-xl-11">
                  <h2 class="h1 mb-3">Kim jesteśmy?</h2>
                  <div class="d-flex flex-column justify-content-around">
                    <p class="lead fs-5 text-secondary mb-4">Jesteśmy pasjonatami literatury i wierzymy, że dobre książki
                      mogą zmieniać świat. W Fabularium dbamy o to, aby dostarczać naszym klientom najlepsze tytuły z
                      różnorodnych gatunków literackich. Niezależnie od tego, czy jesteś miłośnikiem literatury
                      klasycznej, fantastyki, czy kryminałów, mamy coś dla Ciebie. Nasz zespół pasjonatów z przyjemnością dzieli się swoją
                      wiedzą i służy pomocą w wyborze odpowiednich książek.</p>
                    <div class="row gy-4 gy-md-2 gx-xxl-5X my-sm-4">
                      <div class="col-12 col-md-6">
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <img src="images/victory-motivation-icon.svg" alt="" class="icon" width="32" height="32">
                          </div>
                          <div>
                            <h4 class="mb-3">Profesjonalizm</h4>
                            <p class="text-secondary mb-0">Nasz zespół dba o każdy szczegół, starannie obsługując
                              klientów
                              i zawsze gotowy wysłuchać ich potrzeb.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <img src="images/hands-helping-icon.svg" alt="" class="icon" width="32" height="32">
                          </div>
                          <div>
                            <h4 class="mb-3">Zaangażowanie</h4>
                            <p class="text-secondary mb-0">Promujemy czytelnictwo i angażujemy się w działania
                              społeczne,
                              organizując akcje charytatywne.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <hr class="mb-5">
      <section class="container">
        <div class="row">
          <div class="col text-center mb-3">
            <h3>Nasz sklep w liczbach</h3>
          </div>
          <?php
          $sql = "SELECT * FROM books";
          $result = $conn->query($sql);

          $count_sql = "SELECT COUNT(DISTINCT autor) AS total_authors, COUNT(*) AS total_books FROM books";
          $count_result = $conn->query($count_sql);
          $counts = $count_result->fetch_assoc();

          $total_categories = 0; // Initialize total_categories variable

          $sql = "SELECT DISTINCT kategoria FROM books"; // Modify the query to select only unique values of "kategoria"
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
              // Explode the categories by comma and count each separately
              $categories = explode(",", $row["kategoria"]);
              $total_categories += count($categories);
            }
          }

          $conn->close();
          ?>
        </div>
        <div class="row text-center">
          <div class="col-md mb-4">
            <div class="counter">
              <i class="fa fa-2x"></i>
              <h2 class="timer count-title count-number" data-to="<?php echo $counts['total_books']; ?>" data-speed="3000"></h2>
              <p class="count-text mb-3">
                <?php
                // Get the last digit of the total count
                $last_digit = substr($counts['total_books'], -1);

                // Check the last digit to determine the correct plural form
                switch ($last_digit) {
                  case '2':
                  case '3':
                  case '4':
                    echo "Książki w magazynie";
                    break;
                  default:
                    echo "Książek w magazynie";
                    break;
                }
                ?>
              </p>
            </div>
          </div>
          <div class="col-md mb-4">
            <div class="counter">
              <i class="fa fa-2x"></i>
              <h2 class="timer count-title count-number" data-to="<?php echo $counts['total_authors']; ?>" data-speed="3000"></h2>
              <p class="count-text mb-3">Różnych autorów</p>
            </div>
          </div>
          <div class="col-md mb-4">
            <div class="counter">
              <i class="fa fa-2x"></i>
              <h2 class="timer count-title count-number" data-to="<?php echo $total_categories; ?>" data-speed="3000"></h2>
              <p class="count-text mb-3">Dostępnych kategorii</p>
            </div>
          </div>
        </div>
      </section>

    </div>
  </div>
  <?php include("includes/footer.php"); ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="scripts/counter.js"></script>
</body>

</html>