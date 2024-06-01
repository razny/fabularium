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

  <style>
    /* Custom Styles */
    .product-image {
      max-width: 100%;
      height: auto;
    }

    .product-details {
      padding: 0 20px;
    }
  </style>
</head>

<body class="bg">
  <?php include("includes/header.php");
  include("includes/conn.php"); ?>
  <div class="d-flex align-items-center justify-content-center" id="produkt">
    <section class="my-5 w-75 py-3">
      <?php

      if (isset($_GET['ID'])) {
        $id = intval($_GET['ID']);
        $sql = "SELECT * FROM books WHERE ID = $id";
        $result = $conn->query($sql);
        if ($result === false) {
          echo "Nie znaleziono produktu.";
        } else {
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
      ?>
            <div class="row gx-4 gx-lg-5">
              <div class="col-sm-12 col-md-6 col-lg-6">
                <img class="product-image mb-4" src="<?php echo $row["Okladka"]; ?>" alt="Product Image" />
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6 product-details">
                <h1 class="display-5 fw-bolder mb-3"><?php echo $row["Tytul"]; ?></h1>
                <div class="fs-5 mb-3">
                  <span style="color: #908f8f"><?php echo $row["Cena"]; ?> zł</span>
                </div>
                <p class="lead mb-4"><?php echo $row["Opis"]; ?></p>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <th style="width: 30%;" scope="row">Autor:</th>
                      <td class="small"><?php echo $row["Autor"]; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">Wydawnictwo:</th>
                      <td class="small"><?php echo $row["Wydawnictwo"]; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">Premiera:</th>
                      <td class="small"><?php echo $row["Data_premiery"]; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">ISBN:</th>
                      <td class="small"><?php echo $row["ISBN"]; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">Liczba stron:</th>
                      <td class="small"><?php echo $row["Liczba_stron"]; ?></td>
                    </tr>
                  </tbody>
                </table>
                <form action="includes/add_to_cart.php" method="POST" id="cart_form">
                  <input type="hidden" name="item_id" value="<?php echo $row['ID']; ?>">
                  <button type="submit" class="btn btn-dark secondary border-0">
                    Dodaj do koszyka
                  </button>
                </form>

                <script>
                  <?php if (isset($_SESSION['cart_error'])) : ?>
                    alert("<?php echo $_SESSION['cart_error']; ?>");
                    <?php unset($_SESSION['cart_error']); ?>
                  <?php elseif (isset($_SESSION['cart_success'])) : ?>
                    alert("<?php echo $_SESSION['cart_success']; ?>");
                    <?php unset($_SESSION['cart_success']); ?>
                  <?php endif; ?>
                </script>

              </div>
            </div>
    </section>
  </div>
<?php
          } else {
            echo "Nie znaleziono produktu o tym ID.";
          }
        }
      } else {
        echo "Nie podano ID.";
      }
      $conn->close();
?>
</div>

<?php include("includes/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>