<?php
session_start();

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../logowanie.php');
    exit();
}

// Process adding item to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    // Check if the item is already in the cart
    $_SESSION['cart_error'] = isset($_SESSION['cart'][$item_id]) ? "Ten przedmiot znajduje się już w twoim koszyku." : null;

    // Add the item to the cart or set error message
    if (!$_SESSION['cart_error']) {
        $_SESSION['cart'][$item_id] = ['id' => $item_id];
        $_SESSION['cart_success'] = "Dodano do koszyka!";
    }

    // Redirect back to the previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
