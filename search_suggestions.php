<?php
// Include your database connection and necessary functions
include "include/dbconfig.php";

if (isset($_GET['query'])) {
    $searchQuery = mysqli_real_escape_string($connect, $_GET['query']);

    // Perform a search query based on the product name
    $query = "SELECT product_id, product_name FROM products WHERE product_name LIKE '%$searchQuery%' LIMIT 5";
    $result = mysqli_query($connect, $query);

    $suggestions = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $suggestions[] = $row;
        }
    }

    // Return the suggestions as JSON
    echo json_encode($suggestions);
}
?>
