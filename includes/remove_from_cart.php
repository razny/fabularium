<?php
session_start();
// Check if the item ID is set and not empty
if (isset($_POST['item_id']) && !empty($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    // Find the item in the cart and remove it
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $item_id) {
            unset($_SESSION['cart'][$key]);
            break; // Exit loop after removing the item
        }
    }
}

// Redirect back to the cart page
header("Location: ../koszyk.php");
exit();
