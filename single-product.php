<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
include "include/header.php";

// Check if the product_id is set in the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database based on the product_id
    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $product = mysqli_fetch_assoc($result);

        // Proceed with displaying product details
?>
<style>
    .btn-danger {
        background-color: #dc3545; /* Red background color */
        color: #fff; /* White text color */
        border: none; /* No border */
        padding: 15px 20px; /* Padding */
        cursor: pointer; /* Pointer cursor */
        transition: background-color 0.3s; /* Transition duration for hover effect */
    }

    .btn-danger:hover {
        background-color: #c82333; /* Darker red background color on hover */
    }
</style>
        <!--== Page Title Area Start ==-->
        <div id="page-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="page-title-content">
                            <ul class="breadcrumb">
                                <li><a href="index5.php">Home</a></li>
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="single-product.php?product_id=<?php echo $product_id; ?>" class="active"><?php echo $product['product_name']; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== Page Title Area End ==-->

        <!--== Page Content Wrapper Start ==-->
        <div id="page-content-wrapper" class="p-9">
            <div class="ruby-container">
                <div class="row">
                    <!-- Single Product Page Content Start -->
                    <div class="col-lg-12">
                        <div class="single-product-page-content">
                            <div class="row">
                                <!-- Product Thumbnail Start -->
                                <div class="col-lg-5">
                                    <div class="product-thumbnail-wrap">
                                        <div class="product-thumb-carousel owl-carousel">
                                            <div class="single-thumb-item">
                                                <a href="#"><img class="img-fluid" src="adminfolder/productimages/<?php echo $product['image_url']; ?>" alt="<?php echo $product['product_name']; ?>" /></a>
                                            </div>
                                            <!-- Add additional images here if available -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Thumbnail End -->

                                <!-- Product Details Start -->
                                <div class="col-lg-7 mt-5 mt-lg-0">
                                    <div class="product-details">
                                        <h2><a href="single-product.php?product_id=<?php echo $product_id; ?>"><?php echo $product['product_name']; ?></a></h2>

                                        <span class="price">$<?php echo $product['price']; ?></span>

                                        <div class="product-info-stock-sku">
                                            <span class="product-stock-status">In Stock</span>
                                            <span class="product-sku-status ml-5"><strong>SKU</strong></span>
                                        </div>

                                        <p class="products-desc"><?php echo $product['product_description']; ?></p><br>

                                        <div class="product-quantity d-flex align-items-center">
                                            <form action="cartAdd.php" method="POST" class="post-form">
                                                <div class="quantity-field">
                                                    <label for="qty">Qty</label>
                                                    <input type="number" id="qty" name="quantity" min="1" max="100" value="1" />
                                                </div>
                                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                                <br><button type="submit" name="add_to_cart" class="btn-add-to-cart">Add to Cart</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <!-- Product Details End -->
                            </div><br><br><br>

                            <!-- Product Full Description Start -->
                       <!-- Product Reviews Section -->


            <!-- Display User Reviews -->
            <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4 text-center text-danger font-weight-bold">Customer Reviews</h1>

            <!-- Display User Reviews -->
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-danger text-white">
                        <th>User</th>
                        <th>Date</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $userReviewsQuery = "SELECT reviews.*, customers_detail.first_name 
                                        FROM reviews 
                                        LEFT JOIN customers_detail ON reviews.customer_id = customers_detail.customer_id 
                                        WHERE product_id = $product_id AND reviews.customer_id IS NOT NULL 
                                        ORDER BY reviews.created_at DESC";
                    $userReviewsResult = mysqli_query($connect, $userReviewsQuery);

                    if ($userReviewsResult && mysqli_num_rows($userReviewsResult) > 0) {
                        while ($userReview = mysqli_fetch_assoc($userReviewsResult)) {
                            ?>
                            <tr>
                                <td><?php echo $userReview['first_name']; ?></td>
                                <td><?php echo $userReview['created_at']; ?></td>
                                <td><?php echo $userReview['review_text']; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='3'>No reviews yet.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Your Review Form -->
<div class="container mt-5">
    <?php if (isset($_SESSION["customer_id"])) { ?>
        <div class="row">
            <div class="col-lg-12">
                <!-- Product Full Description Start -->
                <div class="product-full-info-reviews">
                    <!-- Single Product tab Menu -->
                    <nav class="nav" id="nav-tab">
                        <a class="active" id="reviews-tab" data-toggle="tab" href="#reviews">Reviews</a>
                    </nav>
                    <!-- Single Product tab Content -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="reviews">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title mb-4 text-center text-danger font-weight-bold">Add Your Review</h2>
                                            <form action="addReview.php" method="POST">
                                                <div class="form-group">
                                                    <label for="review_text">Your Review</label>
                                                    <textarea id="review_text" name="review_text" rows="4" class="form-control" required></textarea>
                                                </div>
                                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                                <button type="submit" class="btn btn-danger btn-block font-weight-bold btn-lg">Submit Review</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Single Product tab Content -->
                </div>
                <!-- End of Product Full Description -->
            </div>
        </div>
    <?php } else { ?>
        <h2 class="text-center mt-5">Please <b style="color:red">login</b> to leave a review.</h2>
    <?php } ?>
</div>

        <!--== Page Content Wrapper End ==-->

<?php
        include "include/footer.php";
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product ID.";
}
?>
