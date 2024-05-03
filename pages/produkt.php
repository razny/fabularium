<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="icon" type="image/x-icon" href="../images/favicon.svg">
  <title>Fabularium - o nas</title>
</head>

<body class="bg">
  <!--header start -->
  <?php include("includes/header.php"); ?>
  <!--hedaer end -->

  <div class="d-flex align-items-center justify-content-center">
    <section class="my-5 px-2 w-75">

      <section class="py-5">
        <div class="container px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/245x350/dee2e6/6c757d.jpg" style="max-width: 400px; height: auto;" alt="..." /></div>
            <div class="col-md-6">
              <h1 class="display-5 fw-bolder mb-3">Strona przykładowego produktu</h1>
              <div class="fs-5 mb-5">
                <span style="color: #908f8f">24,99zł</span>
              </div>
              <p class="lead mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem
                quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus
                ipsam minima ea iste laborum vero?</p>

              <div class="mb-3">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <th style="width: 30%;" scope="row">Autor:</th>
                      <td class="small">John Doe</td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">Wydawnictwo:</th>
                      <td class="small">Example Publisher</td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">Data wydania:</th>
                      <td class="small">January 1, 2023</td>
                    </tr>
                    <tr>
                      <th style="width: 30%;" scope="row">ISBN:</th>
                      <td class="small">978-3-16-148410-0</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="d-flex">
                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                <button type="button" class="btn btn-dark secondary border-0">Dodaj do koszyka</button>
              </div>
            </div>
          </div>
        </div>
      </section>


    </section>
  </div>

  <!--footer start -->
  <?php include("includes/footer.php"); ?>
  <!--footer end -->

</body>

</html>