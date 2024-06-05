<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../logowanie.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    $_SESSION['cart_error'] = isset($_SESSION['cart'][$item_id]) ? "Ten przedmiot znajduje się już w twoim koszyku." : null;

    if (!$_SESSION['cart_error']) {
        $_SESSION['cart'][$item_id] = ['id' => $item_id];
        $_SESSION['cart_success'] = "Dodano do koszyka!";
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']); // cofnij na poprzednia str
    exit();
}
