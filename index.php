<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fabularium - sklep z książkami dla każdego</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" type="text/css" href="styles/style.css" id="light">
  <link rel="stylesheet" href="styles/media-sizes.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.svg">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body class="bg">
  <?php include("includes/header.php"); ?>
  <?php include("includes/conn.php"); ?>
  <section class="jumbotron position-relative d-flex justify-content-center align-items-center py-4">
    <div class="mask"></div>
    <div class="py-5 w-sm-75 w-md-75 w-l-75 w-xl-75 position-relative z-index-1 text-center text-md-start">
      <div class="w-md-75 w-l-75 w-xl-75 me-md-5 ms-md-3 ms-0 me-0 p-sm-0 p-4">
        <h1 class="display-4 mb-4" style="font-weight: 400;">Odkryj świat literatury!</h1>
        <p class="lead me-md-5 me-l-5 me-xl-5">Oferujemy szeroki wybór tytułów, które zaspokoją nawet najbardziej wymagające gusta
          czytelnicze i pozwolą Ci zgłębić tematykę, która Cię interesuje. Nasza księgarnia to nie tylko miejsce, gdzie
          możesz znaleźć książki - to przestrzeń, w której marzenia o literackich podróżach stają się rzeczywistością.
        </p>
        <p class="me-md-5 me-l-5 me-xl-5 me-sm-0">
          <a class="btn primary border-0 mt-4" href="katalog.php" role="button">Zobacz wszystkie
            produkty</a>
        </p>
      </div>
    </div>
  </section>

  <section class="container-fluid bg mt-5 w-md-75" id="swiper">
    <h2 class="text-center my-5"><span class="bg">Polecane książki</span></h2>
    <div class="row text-center">
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php
          $sql = "SELECT * FROM books ORDER BY RAND() LIMIT 5";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <div class="swiper-slide" style="height: auto;">
                <div class="card align-items-center border-2">
                  <a href="produkt.php?ID=<?php echo ($row['ID']); ?>">
                    <img src="<?php echo ($row["Okladka"]); ?>" class="mt-3" alt="Okładka książki <?php echo $row['Tytul']; ?>" style="width: 90px; height: 150px;">
                  </a>
                  <div class="card-body mx-1 d-flex flex-column justify-content-around">
                    <h5 class="card-title"><?php echo $row["Tytul"]; ?></h5>
                    <p class="card-text text-secondary"><?php echo $row["Autor"]; ?></p>
                    <h6 class="card-price"><?php echo $row["Cena"]; ?> zł</h6>
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
  <?php include("includes/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="scripts/swiper.js"></script>
</body>

</html>