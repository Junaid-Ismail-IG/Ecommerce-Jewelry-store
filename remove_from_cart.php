<?php
session_start();

if (isset($_POST['remove_from_cart'])) {
    $key = $_POST['key'];

    // Remove item from cart based on key
    unset($_SESSION['cart'][$key]);

    // Reset array keys to maintain continuous indexing
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

header("Location: cart.php");
exit();
?>
