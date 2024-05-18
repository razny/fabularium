<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles/style.css" />
  <link rel="stylesheet" href="styles/media-sizes.css" />
  <link rel="icon" type="image/x-icon" href="images/favicon.svg">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Fabularium - katalog</title>
</head>

<body class="bg">
  <?php
  include("includes/header.php");
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "blank";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Define the default sorting order
  $sort_order = "ID ASC";

  if (isset($_GET['sort'])) {
    switch ($_GET['sort']) {
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

  $items_per_page = 15;
  $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $offset = ($current_page - 1) * $items_per_page;

  $sql = "SELECT * FROM pierwsze50";
  // Additional clauses for filtering by category
  if (isset($_GET['category'])) {
    $selected_category = $_GET['category'];
    $where_clauses[] = "Kategoria LIKE '%$selected_category%'";
  }

  // Check if there are any additional clauses
  if (!empty($where_clauses)) {
    $sql .= ' WHERE ' . implode(' AND ', $where_clauses);
  }

  // Add sorting order
  $sql .= " ORDER BY $sort_order";

  // Count total items (considering filters)
  $total_items_sql = "SELECT COUNT(*) as total FROM pierwsze50";
  if (!empty($where_clauses)) {
    $total_items_sql .= ' WHERE ' . implode(' AND ', $where_clauses);
  }

  // Execute the query to get total items count
  $total_items_result = $conn->query($total_items_sql);
  $total_items = $total_items_result->fetch_assoc()['total'];

  // Calculate total pages based on total items and items per page
  $total_pages = ceil($total_items / $items_per_page);

  // Calculate offset based on current page
  $offset = ($current_page - 1) * $items_per_page;

  // Add LIMIT and OFFSET to the SQL query
  $sql .= " LIMIT $items_per_page OFFSET $offset";

  // Execute the main query to fetch products for the current page
  $result = $conn->query($sql);
  if ($result === false) {
    echo "Error: " . $conn->error;
    exit();
  }
  ?>

  <div class="d-flex align-items-center justify-content-center" id="catalog">
    <section class="my-3 px-2 w-75">
      <div class="container pt-5">
        <div class="row">
          <div class="col-md-8 order-md-2 col-lg-9">
            <div class="container-fluid">
              <div class="row">

                <div class="col-md-6">
                  <div class="dropdown">
                    <button type="button" class="btn btn-dark secondary border-0 dropdown-toggle" data-bs-toggle="dropdown">
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

                <?php
                // Function to build pagination links with optional parameters
                function buildPaginationLink($page, $category = null, $sort = null)
                {
                  $url = "?page=$page";
                  if ($category !== null) {
                    $url .= "&category=" . urlencode($category);
                  }
                  if ($sort !== null) {
                    $url .= "&sort=" . urlencode($sort);
                  }
                  return $url;
                }

                ?>

                <div class="col-md-6">
                  <div class="col-md-12 mb-3">
                    <ul class="pagination justify-content-end">
                      <?php if ($current_page > 1) : ?>
                        <li class="page-item"><a class="page-link" href="<?php echo buildPaginationLink($current_page - 1, isset($_GET['category']) ? $_GET['category'] : null, isset($_GET['sort']) ? $_GET['sort'] : null); ?>">Poprzednia</a></li>
                      <?php endif; ?>

                      <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item <?php echo ($i === $current_page) ? 'active' : ''; ?>"><a class="page-link" href="<?php echo buildPaginationLink($i, isset($_GET['category']) ? $_GET['category'] : null, isset($_GET['sort']) ? $_GET['sort'] : null); ?>"><?php echo $i; ?></a></li>
                      <?php endfor; ?>

                      <?php if ($current_page < $total_pages) : ?>
                        <li class="page-item"><a class="page-link" href="<?php echo buildPaginationLink($current_page + 1, isset($_GET['category']) ? $_GET['category'] : null, isset($_GET['sort']) ? $_GET['sort'] : null); ?>">Następna</a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>

                <div class="row">
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
                              <a href="produkt.php?id=<?php echo htmlspecialchars($row['ID']); ?>" class="font-weight-bold text-dark text-decoration-none">
                                <?php echo htmlspecialchars($row['Tytul']); ?>
                              </a>
                            </h5>
                            <p class="card-text mb-2 small text-secondary">
                              <?php echo htmlspecialchars($row['Autor']); ?>
                            </p>
                            <h6 class="card-price font-weight-bold text-dark">
                              <?php echo htmlspecialchars($row['Cena']); ?> zł
                            </h6>
                            <div class="mt-auto">
                              <form action="includes/add_to_cart.php" method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $row['ID'] ?>">
                                <button type="submit" class="btn btn-dark btn-sm secondary border-0">
                                  Dodaj do koszyka
                                </button>
                              </form>
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
            $sql = "SELECT DISTINCT kategoria FROM pierwsze50";
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

            $conn->close();
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
    </section>
  </div>
  <?php include("includes/footer.php"); ?>
</body>

</html>