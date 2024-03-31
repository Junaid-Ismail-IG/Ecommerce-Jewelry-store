<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

$customer_id = isset($_SESSION["customer_id"]) ? $_SESSION["customer_id"] : null;
$cartItems = isset($_SESSION["cart"]) ? $_SESSION["cart"] : array();

// Retrieve customer details from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$country = $_POST['country'];
$street_address = $_POST['street_address'];
$town = $_POST['town'];
$state = $_POST['state'];
$postcode = $_POST['postcode'];
$phone = $_POST['phone'];
$payment_method = $_POST['payment_method'];

// Save customer details to the database
saveCustomerDetails($first_name, $last_name, $email, $country, $street_address, $town, $state, $postcode, $phone, $customer_id, $connect);

// Save order details to the database
$order_id = saveOrderDetails($customer_id, $cartItems, $payment_method, $connect);

// Save order items to the database
saveOrderItems($order_id, $cartItems, $connect);

// Clear the cart after placing the order
unset($_SESSION['cart']);

// Redirect to a thank you page or order summary page
header("Location: thank_you.php");
exit();
?>
