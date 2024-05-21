<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header('Location: ../logowanie.php');
    exit();
}

// Process adding item to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    // Check if the item is already in the cart
    if (isset($_SESSION['cart'][$item_id])) {
        // Item is already in the cart, return an error
        $_SESSION['cart_error'] = "Ten przedmiot znajduje się już w twoim koszyku.";
    } else {
        // Add the item to the cart
        $_SESSION['cart'][$item_id] = [
            'id' => $item_id,
        ];
    }

    // Store the current page URL in the session
    $_SESSION['redirect_url'] = $_SERVER['HTTP_REFERER'];

    // Redirect back to the previous page
    header('Location: ' . $_SESSION['redirect_url']);
    exit();
}
