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
    <section class="my-5 w-75">
      <section class="py-3">
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
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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
            }
          }
              $conn->close();
?>
            </div>
          </div>
        </div>
      </section>

      <section>
        <hr>
        <div class="container mt-5">
          <h2 class="mb-4">Product Reviews</h2>

          <div class="row mb-4">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">John Doe</h5>
                  <p class="card-text">January 15, 2024</p>
                  <p class="card-text">This product exceeded my expectations. It's well-made, durable, and performs exactly as described.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">Jane Smith</h5>
                  <p class="card-text">February 3, 2024</p>
                  <p class="card-text">I've been using this product for months now and it's still as good as new. I would definitely recommend it to others.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">Alex Johnson</h5>
                  <p class="card-text">March 10, 2024</p>
                  <p class="card-text">I'm impressed with the quality of this product. It's sturdy, reliable, and worth every penny.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="accountName">Account Name</label>
                      <input type="text" class="form-control" id="accountName" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                      <label for="datePosted">Date Posted</label>
                      <input type="text" class="form-control" id="datePosted" readonly>
                    </div>
                    <div class="form-group">
                      <label for="comment">Comment</label>
                      <textarea class="form-control" id="comment" rows="3" placeholder="Enter your review"></textarea>
                    </div>
                    <button type="submit" class="btn secondary">Submit Review</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
  </div>

  <!--footer start -->
  <?php include("includes/footer.php"); ?>
  <!--footer end -->

  <script>
    // Get current date and format it
    const currentDate = new Date();
    const formattedDate = currentDate.toLocaleDateString('en-US');

    // Set the formatted date as the value of the datePosted input field
    document.getElementById('datePosted').value = formattedDate;
  </script>

</body>

</html>