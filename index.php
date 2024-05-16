<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/media-sizes.css" />
  <link rel="icon" type="image/x-icon" href="images/favicon.svg">
  <title>Fabularium - sklep z książkami dla każdego</title>
  <!--TO DO:
  -responsiveness on sm+md devices (lg is def?)
        - navbar.... expanding......
        - please make it look good on mobile 
  - how to add subpage for Every Product
  - client opinions 
-->
</head>

<body class="bg">

  <!--header start -->
  <?php include("includes/header.php"); ?>
  <!--header end -->

  <div class="jumbotron position-relative d-flex justify-content-center align-items-center py-5">
    <div class="mask"></div>
    <section class="py-4 w-md-75 w-l-75 w-xl-75 position-relative z-index-1">
      <div class="w-md-75 w-l-75 w-xl-75 me-5 ms-3">
        <h1 class="display-4 mb-4" style="font-weight: 400;">Odkryj świat literatury!</h1>
        <p class="lead me-5">Oferujemy szeroki wybór tytułów, które zaspokoją nawet najbardziej wymagające gusta
          czytelnicze i pozwolą Ci zgłębić tematykę, która Cię interesuje. Nasza księgarnia to nie tylko miejsce, gdzie
          możesz znaleźć książki - to przestrzeń, w której marzenia o literackich podróżach stają się rzeczywistością.
        </p>
        <p class="lead me-5">
          <a class="btn primary btn-dark border-0 mt-4" href="katalog.php" role="button">Zobacz wszystkie
            produkty</a>
        </p>
      </div>
    </section>
  </div>

  <section class="container-fluid bg mt-5 w-md-75">
    <h2 class="text-center my-5"><span class="bg">Polecane książki</span></h2>
    <div class="row text-center">
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "blank";

          $conn = new mysqli($servername, $username, $password, $dbname);

          $sql = "SELECT * FROM pierwsze50 ORDER BY RAND() LIMIT 5";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <div class="swiper-slide">
                <div class="card align-items-center border-2" style="height: 348px;">
                  <img src="<?php echo $row["Okladka"]; ?>" class="mt-3" alt="Book Cover" style="width: 100px; height: 300px;">
                  <div class="card-body mx-1 d-flex flex-column justify-content-around">
                    <h5 class="card-title"><?php echo $row["Tytul"]; ?></h5>
                    <p class="card-text text-secondary"><?php echo $row["Autor"]; ?></p>
                    <h6 class="card-price font-weight-bold text-dark"><?php echo $row["Cena"]; ?> zł</h6>
                    <button type="button" class="btn btn-dark secondary mt-1 border-0 mx-4">Dodaj do koszyka</button>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          $conn->close();
          ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </section>

  <!--footer start -->
  <?php include("includes/footer.php"); ?>
  <!--footer end -->

  <script src="scripts/swiper.js"></script>
</body>

</html>