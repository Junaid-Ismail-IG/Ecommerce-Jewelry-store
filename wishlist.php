<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

include "include/header.php";
?>




<!--== Search Box Area Start ==-->
<div class="body-popup-modal-area">
    <span class="modal-close"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
    <div class="modal-container d-flex">
        <div class="search-box-area">
            <div class="search-box-form">
                <form action="#" method="post">
                    <input type="search" placeholder="type keyword and hit enter"/>
                    <button class="btn" type="button"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--== Search Box Area End ==-->

<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Wishlist</h1>
                    <ul class="breadcrumb">
                        <li><a href="index5.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="#" class="active">Wishlist</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <!-- Wishlist Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Wishlist Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Thumbnail</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Stock Status</th>
                            <th class="pro-subtotal">Add to Cart</th>
                            <th class="pro-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/img/product-1.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Zeon Zen 4 Pro</a></td>
                            <td class="pro-price"><span>$295.00</span></td>
                            <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                            <td class="pro-subtotal"><a href="cart.php" class="btn-add-to-cart">Add to Cart</a></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/img/product-2.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Aquet Drone D 420</a></td>
                            <td class="pro-price"><span>$275.00</span></td>
                            <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                            <td class="pro-subtotal"><a href="cart.php" class="btn-add-to-cart">Add to Cart</a></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/img/product-3.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Game Station X 22</a></td>
                            <td class="pro-price"><span>$295.00</span></td>
                            <td class="pro-quantity"><span class="text-danger">Stock Out</span></td>
                            <td class="pro-subtotal"><a href="cart.php" class="btn-add-to-cart disabled">Add to
                                Cart</a></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/img/product-4.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Roxxe Headphone Z 75 </a></td>
                            <td class="pro-price"><span>$110.00</span></td>
                            <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                            <td class="pro-subtotal"><a href="cart.php" class="btn-add-to-cart">Add to Cart</a></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Wishlist Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->

<?php

include "include/footer.php" 

?>