<?php
session_start();

if (isset($_POST['item_id']) && !empty($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $item_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

header("Location: ../koszyk.php");
exit();
