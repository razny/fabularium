<?php
include("includes/conn.php");

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

$sort_order = "ID ASC";

if (isset($_GET['sort'])) {
  switch ($_GET['sort']) {
    case 'rand':
      $sort_order = "RAND()";
      break;
    case 'asc':
      $sort_order = "Tytul ASC";
      break;
    case 'desc':
      $sort_order = "Tytul DESC";
      break;
    case 'price_asc':
      $sort_order = "Cena ASC";
      break;
    case 'price_desc':
      $sort_order = "Cena DESC";
      break;
    default:
      $sort_order = "ID ASC";
      break;
  }
}

$items_per_page = 9;

// get current page from query string or default to 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

// fetch total number of items
$total_items_sql = "SELECT COUNT(*) AS total FROM books";
$total_items_result = $conn->query($total_items_sql);

$total_items = $total_items_result->fetch_assoc()['total'];
$total_pages = ceil($total_items / $items_per_page);
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fabularium - katalog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/media-sizes.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.svg">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body class="bg">
  <?php include("includes/header.php"); ?>

  <div class="container pt-5  w-100 w-lg-75">
    <div class="row">
      <!-- sidebar for large devices -->
      <div class="col-lg-3 d-none d-lg-block">
      <?php include("includes/sidebar.php"); ?>
      </div>

      <!-- main content -->
      <div class="col-lg-9">
        <section class="d-flex align-items-center justify-content-center min-vh-100" id="catalog">
          <div class="my-3 px-2">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="products-container">
              <?php
              $category_filter = isset($_GET['category']) ? "WHERE kategoria LIKE '%" . $_GET['category'] . "%'" : "";
              $sql = "SELECT * FROM books $category_filter ORDER BY $sort_order LIMIT $items_per_page OFFSET $offset";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) : ?>
                <div class="col">
                  <div class="card h-100 border-0">
                    <a href="produkt.php?ID=<?php echo htmlspecialchars($row['ID']); ?>">
                      <img src="<?php echo htmlspecialchars($row['Okladka']); ?>" class="mx-auto d-block mt-3" alt="Cover of <?php echo htmlspecialchars($row['Tytul']); ?>" style="height:15rem">
                    </a>
                    <div class="card-body d-flex flex-column align-items-center">
                      <h5 class="card-title">
                        <a href="produkt.php?id=<?php echo htmlspecialchars($row['ID']); ?>">
                          <?php echo htmlspecialchars($row['Tytul']); ?>
                        </a>
                      </h5>
                      <p class="card-text text-secondary">
                        <?php echo htmlspecialchars($row['Autor']); ?>
                      </p>
                      <h6 class="card-price">
                        <?php echo htmlspecialchars($row['Cena']); ?> zł
                      </h6>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <?php include("includes/footer.php"); ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      var currentPage = <?php echo $current_page; ?>;
      var totalPages = <?php echo $total_pages; ?>;
      var loading = false;

      function loadMoreProducts() {
        if (loading || currentPage >= totalPages) return;
        loading = true;
        currentPage++;

        var url = "?page=" + currentPage + "&sort=<?php echo isset($_GET['sort']) ? $_GET['sort'] : ''; ?>";
        if ('<?php echo isset($_GET['category']) ? $_GET['category'] : ''; ?>' !== '') {
          url += "&category=<?php echo urlencode(isset($_GET['category']) ? $_GET['category'] : ''); ?>";
        }

        $.get(url, function(data) {
          var newProducts = $(data).find("#products-container").html();
          $("#products-container").append(newProducts);
          loading = false;
        });
      }

      $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
          loadMoreProducts();
        }
      });
    });
  </script>
</body>

</html>