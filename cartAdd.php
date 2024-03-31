<?php
session_start();
include "include/dbconfig.php";
echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';
// Check if the customer is logged in
if (!isset($_SESSION['customer_id'])) {
    // Display an alert and redirect to the login page
    echo '<script>alert("You must login first.");</script>';
    echo '<script>window.location.href = "login-register.php";</script>';
    exit();
}

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];



    

    // Validate quantity (you can add more validation if needed)
    if (!is_numeric($quantity) || $quantity <= 0) {
        // Invalid quantity, handle accordingly (redirect, display error message, etc.)
        echo '<script>alert("Invalid quantity.");</script>';
        echo '<script>window.location.href = "index5.php";</script>';
        exit();
    }

    // Fetch product details from the database
    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        // Create a unique key for the cart item based on product_id
        $cart_key = 'product_' . $product['product_id'];

        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$cart_key])) {
            // If yes, update the quantity
            $_SESSION['cart'][$cart_key]['quantity'] += $quantity;
        } else {
            // If no, add a new item to the cart
            $_SESSION['cart'][$cart_key] = [
                'product_id' => $product['product_id'],
                'product_name' => $product['product_name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'image_url' => $product['image_url'],
            ];
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        // Display a success message
        echo '<script>alert("Item added to cart successfully.");</script>';
        echo '<script>window.location.href = "index5.php";</script>';
        exit();
    } else {
        // Product not found, handle accordingly
        echo '<script>alert("Product not found.");</script>';
        echo '<script>window.location.href = "index5.php";</script>';
        exit();
    }
} else {
    // If form not submitted, redirect or handle accordingly
    header("Location: index5.php");
    exit();
}
?>
