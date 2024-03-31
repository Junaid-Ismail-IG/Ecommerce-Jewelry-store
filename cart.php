<?php
session_start();
include "include/dbconfig.php";
include "include/header.php";
?>
<style>
    .h1 {
        color: red;
        text-align: center;
        font-size: 50px;
    }

    .h2 {
        text-align: center;
        font-size: 30px;
    }
</style>




<section id="cart-area" class="p-9">
    <div class="ruby-container">
        <div class="cart-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="text-center">Your Shopping Cart</h2>
                        <p class="text-center">Review and manage your items</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($_SESSION['cart'] as $key => $item) {
                                ?>
                                <tr>
                                    <td>
                                        <img src="adminfolder/productimages/<?php echo $item['image_url']; ?>" alt="<?php echo $item['product_name']; ?>"
                                             class="img-fluid" style="max-width: 70px;">
                                        <b> <?php echo $item['product_name']; ?></b>
                                    </td>
                                    <td><b>$<?php echo $item['price']; ?></b></td>
                                    <td><b><?php echo $item['quantity']; ?></b></td>
                                    <td><img src="adminfolder/productimages/<?php echo $item['image_url']; ?>" alt="<?php echo $item['product_name']; ?>"
                                             class="img-fluid" style="max-width: 70px;"></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#removeItemModal<?php echo $key; ?>">
                                            Remove
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="removeItemModal<?php echo $key; ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="removeItemModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="removeItemModalLabel">Remove Item
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to remove this item from your cart?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="remove_from_cart.php" method="POST">
                                                            <input type="hidden" name="key"
                                                                   value="<?php echo $key; ?>">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit" name="remove_from_cart"
                                                                    class="btn btn-danger">Remove
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo "<h1 class='h2'>Your Cart is</h1>";
                        echo " <h1 class='h1'>Em<i class='fa-solid fa-person-dress'></i>ty!</h1>";
                    }
                    ?>
                </div>

                <div class="col-lg-12">
                    <?php
                    $total_price = 0;

                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        foreach ($_SESSION['cart'] as $item) {
                            $total_price += $item['price'] * $item['quantity'];
                        }
                        ?>
                        <!-- Cart Calculation Area -->
                        <div class="row">
                            <div class="col-lg-6 ml-auto">
                                <br><br><br>
                                <div class="cart-calculator-wrapper">
                                    <h3>Order Summary</h3>
                                    <div class="cart-calculate-items">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td><h2>Total Price</h2></td>
                                                    <td class="total-amount"><b>$<?php echo $total_price; ?></b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <form action="checkout.php" method="POST">
                                    <button type="submit" class="btn-add-to-cart">Place Order</button>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- Cart Calculation Area End -->
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "include/footer.php";
?>
