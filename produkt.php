<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/media-sizes.css" />
  <link rel="icon" type="image/x-icon" href="images/favicon.svg">
  <title>Fabularium - o nas</title>
</head>

<body class="bg">
  <!--header start -->
  <?php include("includes/header.php"); ?>
  <!--hedaer end -->

  <div class="d-flex align-items-center justify-content-center">
    <section class="my-5 w-75 py-3">
      <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blank";

        $conn = new mysqli($servername, $username, $password, $dbname);

        //$sql = "SELECT * FROM pierwsze50";
        $sql = "SELECT * FROM pierwsze50 ORDER BY RAND() LIMIT 1";
        $result = $conn->query($sql);
        if (isset($_GET['ID'])) {
          $id = intval($_GET['ID']); // Sanitize the input to ensure it's an integer

          // Fetch book details using the ID
          $sql = "SELECT * FROM pierwsze50 WHERE ID = $id";
          $result = $conn->query($sql);
          if ($result === false) {
            echo "Error: " . $conn->error;
          } else {
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
        ?>
              <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $row["Okladka"]; ?>" style="max-width: 350px; height: auto;" alt="..." /></div>
                <div class="col-md-6">
                  <h1 class="display-5 fw-bolder mb-3"><?php echo $row["Tytul"]; ?></h1>
                  <div class="fs-5 mb-5">
                    <span style="color: #908f8f"><?php echo $row["Cena"]; ?> zł</span>
                  </div>
                  <p class="lead mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem
                    quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus
                    ipsam minima ea iste laborum vero?</p>

                  <div class="mb-3">
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
                          <th style="width: 30%;" scope="row">Data premiery:</th>
                          <td class="small"><?php echo $row["Data premiery"]; ?></td>
                        </tr>
                        <tr>
                          <th style="width: 30%;" scope="row">ISBN:</th>
                          <td class="small"><?php echo $row["ISBN"]; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <button type="button" class="btn btn-dark secondary border-0">Dodaj do koszyka</button>
                  </div>
            <?php
            } else {
              echo "No book found with this ID.";
            }
          }
        } else {
          echo "No book ID specified.";
        }
        $conn->close();
            ?>
                </div>
              </div>
      </div>
    </section>
  </div>

  <!--footer start -->
  <?php include("includes/footer.php"); ?>
  <!--footer end -->
</body>

</html>