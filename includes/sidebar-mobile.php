<button class="btn btn-secondary dropdown-toggle" type="button" style="flex: 1;" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
        Filtry
      </button>
      <ul class="dropdown-menu" style="width: 100%;">
        <li>
          <h4 class="dropdown-header">Kategorie</h4>
        </li>
        <?php
        $sql = "SELECT kategoria, COUNT(*) AS count FROM books GROUP BY kategoria HAVING count >= 4";
        $result = $conn->query($sql);

        $genres = [];
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $categories = explode(",", $row["kategoria"]);
            foreach ($categories as $category) {
              $trimmedCategory = trim($category);
              if (!in_array($trimmedCategory, $genres)) {
                $genres[] = $trimmedCategory;
              }
            }
          }
          sort($genres);
        } else {
          echo "<li><a class='dropdown-item' href='#'>0 results</a></li>";
        }

        foreach ($genres as $genre) {
          echo '<li><a class="dropdown-item" href="' . $_SERVER['PHP_SELF'] . '?category=' . urlencode($genre) . '&sort=' . urlencode(isset($_GET['sort']) ? $_GET['sort'] : '') . '">' . $genre . '</a></li>';
        }
        ?>
        <li>
          <h4 class="dropdown-header mt-3">Sortuj według:</h4>
        </li>
        <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=rand">Trafność</a></li>
        <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=asc">Nazwy: A do Z</a></li>
        <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=desc">Nazwy: Z do A</a></li>
        <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=price_asc">Cena: od najniższej</a></li>
        <li><a class="dropdown-item" href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=price_desc">Cena: od najwyższej</a></li>
        <li>
          <a class="dropdown-item text-dark mt-3" href="?">
            <h5>Usuń filtry</h5>
          </a>
        </li>
      </ul>