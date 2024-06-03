<aside class="px-4 py-2">
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

    <div>
        <h4 class="mb-3 mt-4">Sortuj według:</h4>
        <ul class="list-unstyled">
            <li><a href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=rand" class="text-decoration-none d-block mb-2 primary-text">Trafność</a></li>
            <li><a href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=asc" class="text-decoration-none d-block mb-2 primary-text">Nazwy: A do Z</a></li>
            <li><a href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=desc" class="text-decoration-none d-block mb-2 primary-text">Nazwy: Z do A</a></li>
            <li><a href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=price_asc" class="text-decoration-none d-block mb-2 primary-text">Cena: od najniższej</a></li>
            <li><a href="?category=<?php echo isset($_GET['category']) ? urlencode($_GET['category']) : ''; ?>&sort=price_desc" class="text-decoration-none d-block mb-2 primary-text">Cena: od najwyższej</a></li>
        </ul>
    </div>

    <div class="mt-4">
        <a href="?" class="text-decoration-none text-dark">
            <h4>Usuń filtry</h4>
        </a>
    </div>
</aside>
