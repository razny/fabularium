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

// fetch products for the current page
$sql = "SELECT * FROM books ORDER BY $sort_order LIMIT $items_per_page OFFSET $offset";
$result = $conn->query($sql);
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

  <section class="d-flex align-items-center justify-content-center min-vh-100" id="catalog">
    <div class="my-3 px-2 w-75">
      <div class="container pt-5">
        <div class="row">
          <div class="col-md-8 order-md-2 col-lg-9">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="dropdown">
                    <button type="button" class="btn btn-dark border-0 dropdown-toggle" data-bs-toggle="dropdown">
                      Sortuj wg:
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=rand">Trafność</a></li>
                      <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=asc">Nazwy: A do Z</a></li>
                      <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=desc">Nazwy: Z do A</a></li>
                      <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=price_asc">Cena: od najniższej</a></li>
                      <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=price_desc">Cena: od najwyższej</a></li>
                    </ul>
                  </div>
                </div>

                <div class="row" id="products-container">
                  <?php if ($result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                      <div class="col-6 col-md-6 col-lg-4 mb-3">
                        <div class="card h-100 border-0">
                          <div class="card-img-top mt-4">
                            <a href="produkt.php?ID=<?php echo htmlspecialchars($row['ID']); ?>">
                              <img src="<?php echo htmlspecialchars($row['Okladka']); ?>" class="img-fluid mx-auto d-block" alt="Cover of <?php echo htmlspecialchars($row['Tytul']); ?>" style="height:200px">
                            </a>
                          </div>
                          <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title mb-1">
                              <a href="produkt.php?id=<?php echo htmlspecialchars($row['ID']); ?>">
                                <?php echo htmlspecialchars($row['Tytul']); ?>
                              </a>
                            </h5>
                            <p class="card-text mb-2 small text-secondary">
                              <?php echo htmlspecialchars($row['Autor']); ?>
                            </p>
                            <h6 class="card-price">
                              <?php echo htmlspecialchars($row['Cena']); ?> zł
                            </h6>
                            <div class="mt-auto">
                              <form action="includes/add_to_cart.php" method="POST" target="hidden_iframe" id="cart_form">
                                <input type="hidden" name="item_id" value="<?php echo $row['ID']; ?>">
                                <button type="submit" class="btn btn-dark btn-sm border-0">
                                  Dodaj do koszyka
                                </button>
                              </form>
                              <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;"></iframe> <!-- prevents from reloading page -->
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endwhile; ?>
                  <?php else : ?>
                    <p>No results found.</p>
                  <?php endif; ?>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
            <?php
            $sql = "SELECT DISTINCT kategoria FROM books";
            $result = $conn->query($sql);

            $genres = [];
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $categories = explode(",", $row["kategoria"]);
                foreach ($categories as $category) {
                  $genres[] = trim($category);
                }
              }
              sort($genres);
            } else {
              echo "0 results";
            }
            ?>
            <h4 class="mb-3">Kategorie</h4>
            <div>
              <?php
              foreach ($genres as $genre) {
                echo '<a href="' . $_SERVER['PHP_SELF'] . '?category=' . urlencode($genre) . '&sort=' . urlencode(isset($_GET['sort']) ? $_GET['sort'] : '') . '" class="text-decoration-none d-block mb-2 primary-text">' . $genre . '</a>';
              }
              ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
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