<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";


$customer_id = isset($_SESSION["customer_id"]) ? $_SESSION["customer_id"] : null;
$cartItems = isset($_SESSION["cart"]) ? $_SESSION["cart"] : array();  // Check if 'cart' is set


include "include/header.php";

?>



<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Checkout</h1>
                    <ul class="breadcrumb">
                        <li><a href="index5.php">Home</a></li>
                        <li><a href="shop-full-wide.php">Shop</a></li>
                        <li><a href="#" class="active">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <div class="row">
        <?php if ($customer_id) { ?>
            <div class="col-lg-6">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                        <form action="checkoutSubmit.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">First Name</label>
                                        <input type="text" name="first_name" id="f_name" placeholder="First Name" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">Last Name</label>
                                        <input type="text" name="last_name" id="l_name" placeholder="Last Name" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <label for="email" class="required">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="Email Address" required/>
                            </div>

                            <div class="single-input-item">
                                <label for="country" class="required">Country</label>
                                <select name="country" id="country" required>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="England">England</option>
                                    <option value="London">London</option>
                                </select>
                            </div>

                            <div class="single-input-item">
                                <label for="street-address" class="required">Street address</label>
                                <input type="text" name="street_address" id="street-address" placeholder="Street address Line 1" required/>
                            </div>

                            <div class="single-input-item">
                                <label for="town" class="required">Town / City</label>
                                <input type="text" name="town" id="town" placeholder="Town / City" required/>
                            </div>

                            <div class="single-input-item">
                                <label for="state">State / Division</label>
                                <input type="text" name="state" id="state" placeholder="State / Division"/>
                            </div>

                            <div class="single-input-item">
                                <label for="postcode" class="required">Postcode / ZIP</label>
                                <input type="text" name="postcode" id="postcode" placeholder="Postcode / ZIP" required/>
                            </div>

                            <div class="single-input-item">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" placeholder="Phone"/>
                            </div>

                            <!-- Other billing fields... -->

                            <div class="single-input-item">
                                <label for="payment-method" class="required">Payment Method</label>
                                <select name="payment_method" id="payment-method" required>
                                    <option value="cod">Cash On Delivery</option>
                                    <!-- Other payment options... -->
                                </select>
                            </div><br>
                            <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn-add-to-cart">Place Order</button></div>
                        </form>
                    </div>
                </div>
            </div>


            <?php } else { ?>
                <div class="col-lg-6">
                    <div class="alert alert-danger" role="alert">
                        You must be logged in to proceed with the checkout. Please log in or create an account.
                    </div>
                </div>
            <?php } ?>

            <div class="col-lg-6">
                <div class="cart-calculator-wrapper">
                    <h3>Order Summary</h3>
                    <div class="cart-calculate-items">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price per Unit</th>
                                    <th>Subtotal</th>
                                </tr>

                                <?php
                                $total_price = 0;

                                foreach ($cartItems as $item) {
                                    $product_name = isset($item["product_name"]) ? $item["product_name"] : '';
                                    $quantity = isset($item["quantity"]) ? $item["quantity"] : 0;

                                    // Ensure quantity is greater than zero before calculating
                                    if ($quantity > 0) {
                                        $price_per_unit = $item["price"];
                                        $subtotal = $item["price"] * $quantity;
                                    } else {
                                        $price_per_unit = 0;
                                        $subtotal = 0;
                                    }

                                    echo "<tr>
                                            <td>$product_name</td>
                                            <td>$quantity</td>
                                            <td>$" . number_format($price_per_unit, 2) . "</td>
                                            <td>$" . number_format($subtotal, 2) . "</td>
                                        </tr>";

                                    $total_price += $subtotal;
                                }
                                ?>

                                <tr>
                                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                                    <td>$<?php echo number_format($total_price, 2) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "include/footer.php";
?>
