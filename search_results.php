<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        .search-results {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-column {
            border: 1px solid #ddd;
            padding: 15px;
            width: 200px;
            text-align: center;
        }

        .btn-add-to-cart {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="search-results">

        <?php
        // Sample data for testing
        $suggestions = [
            ['product_id' => 1, 'product_name' => 'GOLD RING'],
            ['product_id' => 2, 'product_name' => 'Silver Ring'],
            ['product_id' => 3, 'product_name' => 'Silver Chain Ring'],
            ['product_id' => 4, 'product_name' => 'Silver Diamond Ring'],
            ['product_id' => 5, 'product_name' => 'Gold Chain'],
        ];

        // Display the search results
        foreach ($suggestions as $row) {
            echo '<div class="product-column">';
            echo '<p>'.$row['product_name'].'</p>';
            
            // Form for submitting product_id to single-product.php
            echo '<form action="single-product.php" method="GET">';
            echo '<input type="hidden" name="product_id" value="'.$row['product_id'].'">';
            echo '<button type="submit" name="add_to_cart" class="btn-add-to-cart"><i class="fa-solid fa-cart-shopping"></i>View Cart</button>';
            echo '</form>';
            
            // Add more details as needed
            echo '</div>';
        }
        ?>

    </div>
</body>
</html>
