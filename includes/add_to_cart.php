<?php
session_start();

// logged out users cant access cart
if (!isset($_SESSION['user_id'])) {
    header('Location: ../logowanie.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    // same item cant be added twice
    if (isset($_SESSION['cart'][$item_id])) {
        $_SESSION['cart_error'] = "Ten przedmiot znajduje się już w twoim koszyku.";
    } else {
        $_SESSION['cart'][$item_id] = [
            'id' => $item_id,
        ];
    }

    // output js to update the parent page
    echo "<script>
        var error = " . (isset($_SESSION['cart_error']) ? "'" . $_SESSION['cart_error'] . "'" : 'null') . ";
        if (error) {
            alert(error);
        } else {
            alert('Dodano do koszyka!');
            // Optionally, you can update the cart UI here if needed
        }
        // Reset the form to clear the iframe content
        document.getElementById('cart_form').reset();
    </script>";


    if (isset($_SESSION['cart_error'])) {
      echo '<script>alert("' . $_SESSION['cart_error'] . '");</script>';
      unset($_SESSION['cart_error']);
    }

}
