<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles/style.css" />
  <link rel="stylesheet" href="styles/media-sizes.css" />
  <link rel="icon" type="image/x-icon" href="images/favicon.svg">
  <title>Fabularium - katalog</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.infinitescroll/3.0.6/jquery.infinitescroll.min.js"></script>
</head>

<body class="bg">
  <!--header start -->
  <?php include("includes/header.php"); ?>
  <!--header end -->

  <div class="d-flex align-items-center justify-content-center" id="catalog">
    <section class="my-3 px-2 w-75">
      <div class="container pt-5">
        <div class="row">
          <div class="col-md-8 order-md-2 col-lg-9">
            <div class="container-fluid">
              <div class="row">

                <!-- Dropdown column -->
                <div class="col-md-6">
                  <div class="dropdown">
                    <button type="button" class="btn btn-dark secondary border-0 dropdown-toggle" data-bs-toggle="dropdown">
                      Sortuj wg:
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Trafność</a></li>
                      <li><a class="dropdown-item" href="#">Nazwy: A do Z</a></li>
                      <li><a class="dropdown-item" href="#">Nazwy: Z do A</a></li>
                      <li><a class="dropdown-item" href="#">Cena: od najniższej</a></li>
                      <li><a class="dropdown-item" href="#">Cena: od najwyższej</a></li>
                    </ul>
                  </div>
                </div>

                <!-- Pagination column -->
                <div class="col-md-6">
                  <div class="col-md-12 mb-3">
                    <ul class="pagination justify-content-end">
                      <li class="page-item"><a class="page-link" href="#">Poprzednia</a></li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Następna</a></li>
                    </ul>
                  </div>
                </div>


                <!-- Product cards -->
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "blank";

                $conn = new mysqli($servername, $username, $password, $dbname);

                $sql = "SELECT * FROM pierwsze50  ORDER BY RAND() LIMIT 18";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-6 col-md-6 col-lg-4 mb-3">
                      <div class="card h-100 border-0">
                        <div class="card-img-top mt-4">
                          <a href="produkt.php"><img src="<?php echo $row["Okladka"]; ?>" class="img-fluid mx-auto d-block" alt="Card image cap" style="height:200px"></a>
                        </div>
                        <div class="card-body text-center d-flex flex-column">
                          <h5 class="card-title mb-1">
                            <a href="produkt.php" class="font-weight-bold text-dark text-decoration-none"><?php echo $row["Tytul"]; ?></a>
                          </h5>
                          <p class="card-text mb-2 small text-secondary"><?php echo $row["Autor"]; ?></p>
                          <h6 class="card-price font-weight-bold text-dark"><?php echo $row["Cena"]; ?> zł</h6>
                          <div class="mt-auto"> <!-- Use mt-auto to push the button to the bottom of the card body -->
                            <button type="button" class="btn btn-dark btn-sm secondary border-0">Dodaj do koszyka</button>
                          </div>
                        </div>
                      </div>
                    </div>

                <?php
                  }
                }
                ?>

                <!-- pagination - bottom -->
                <div class="col-md-12 mt-3">
                  <ul class="pagination justify-content-end">
                    <li class="page-item"><a class="page-link" href="#">Poprzednia</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Następna</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
            <h4 class="mb-3">Filtruj</h4>
            <!-- Price Filter -->
            <div class="mb-3">
              <label for="price-range" class="form-label">Cena (zł)</label>
              <select class="form-select" id="price-range">
                <option value="" disabled selected>Wybierz zakres cenowy...</option>
                <option value="0-10">0 - 10 zł</option>
                <option value="10-20">10 - 20 zł</option>
                <option value="20-30">20 - 30 zł</option>
                <option value="30-40">30 - 40 zł</option>
                <option value="40-50">40 - 50 zł</option>
                <option value="50+">Powyżej 50 zł</option>
              </select>
            </div>

            <?php
            $sql = "SELECT DISTINCT kategoria FROM pierwsze50"; // Modify the query to select only unique values of "kategoria"
            $result = $conn->query($sql);

            $genres = [];
            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                // Explode the categories by comma and add each separately to the genres array
                $categories = explode(",", $row["kategoria"]);
                foreach ($categories as $category) {
                  $genres[] = trim($category); // Trim to remove any leading or trailing spaces
                }
              }

              // Sort the genres alphabetically
              sort($genres);
            } else {
              echo "0 results";
            }

            $conn->close();
            ?>

            <label class="form-label">Gatunki</label>
            <div>
              <?php
              // Output sorted genres in the specified HTML format
              foreach ($genres as $genre) {
                echo '<a href="#" class="text-decoration-none d-block mb-2 primary-text">' . $genre . '</a>';
              }
              ?>
            </div>
          </div>
    </section>
  </div>

  <!--footer start -->
  <?php include("includes/footer.php"); ?>
  <!--footer end -->

</body>

</html>
<script>
  $(document).ready(function() {
    $('#card-container').infiniteScroll({
      path: 'fetch_data.php', // URL to your server-side script for fetching data
      append: '.col-md-6', // Selector for the element to append new data to
      history: false,
      scrollThreshold: false,
      status: '.page-load-status', // Selector for loading status element
    });
  });
</script>