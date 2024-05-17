<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page or display a message
    header('Location: ../logowanie.php');
    exit();
}

// Process adding item to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    if (isset($_SESSION['cart'][$item_id])) {
        $_SESSION['cart'][$item_id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$item_id] = [
            'id' => $item_id,
            'quantity' => 1,
        ];
    }

    // Store the current page URL in the session
    $_SESSION['redirect_url'] = $_SERVER['HTTP_REFERER'];

    // Redirect back to the previous page
    header('Location: ' . $_SESSION['redirect_url']);
    exit();
}
?>