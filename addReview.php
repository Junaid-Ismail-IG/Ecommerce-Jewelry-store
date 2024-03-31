<?php
// Start the session only if it hasn't been started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "include/dbconfig.php";

$customer_id = isset($_SESSION["customer_id"]) ? $_SESSION["customer_id"] : null;

if ($customer_id) {
    // Check if the customer exists
    $checkCustomerQuery = "SELECT customer_id FROM customers_detail WHERE customer_id = $customer_id";
    $resultCheckCustomer = $connect->query($checkCustomerQuery);

    if ($resultCheckCustomer !== false) {
        if ($resultCheckCustomer->num_rows > 0) {
            // Customer exists, proceed with inserting the review
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $review_text = mysqli_real_escape_string($connect, $_POST["review_text"]);
                $product_id = isset($_POST["product_id"]) ? $_POST["product_id"] : null;

                // Insert review into the reviews table
                $insertReviewQuery = "INSERT INTO reviews (customer_id, product_id, review_text) VALUES ($customer_id, $product_id, '$review_text')";

                if ($connect->query($insertReviewQuery) === TRUE) {
                    // Display an alert using JavaScript
                    echo "<script>alert('Review added successfully.');</script>";
                    // Redirect to the same page
                    echo "<script>window.location.href = '$_SERVER[HTTP_REFERER]';</script>";
                    exit();
                } else {
                    echo "Error inserting review: " . $connect->error;
                }
            } else {
                echo "Invalid request method.";
            }
        } else {
            echo "Error: Customer with ID $customer_id does not exist in the database.";
        }
    } else {
        echo "Error checking customer: " . $connect->error;
    }
} else {
    echo "Error: Customer ID is not set.";
}
?>
