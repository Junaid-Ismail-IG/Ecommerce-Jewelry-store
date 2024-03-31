<?php
session_start();

include "include/dbconfig.php";
include "include/functions.php";




include "include/header.php";



?>







<!--== Search Box Area End ==-->

<!--== Banner // Slider Area Start ==-->
<section id="banner-area" class="banner__2">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-12">
                <div id="banner-carousel" class="owl-carousel">
                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-1">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>Rubby Store</h4>
                            <h2>Ring Solitaire Princess</h2>
                            <p>Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                            <a href="#" class="btn-long-arrow">Shop Now</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->

                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-2">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>New Collection 2017</h4>
                            <h2>Beautiful Earrings</h2>
                            <p>Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                            <a href="#" class="btn-long-arrow">Shop Now</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Banner Slider End ==-->









<!--  Products Area Start -->

<!-- jewellery product start -->


<!-- Jewelry Products -->
<div id="jewelry-products-wrapper" class="p-9">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>Featured Jewelry Products</h2>
                    <p>Trending stunning Unique</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="products-wrapper products-gird">
            <div class="row custom-padding">
                <!-- Single Product Start for Jewelry -->
                <?php
                $queryJewelry = "SELECT * FROM products WHERE product_category = 'jewelry' LIMIT 20";
                $resultJewelry = mysqli_query($connect, $queryJewelry);

                if ($resultJewelry) {
                    while ($row = mysqli_fetch_assoc($resultJewelry)) {
                        ?>
                        <div class="col-sm-6 col-lg-3">
                            <form action="single-product.php" method="GET" class="post-form">
                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <img src="adminfolder/productimages/<?php echo $row['image_url']; ?>" alt="<?php echo $row['product_name']; ?>" class="img-fluid"/>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="single-product.php?product_id=<?php echo $row['product_id']; ?>"><b><?php echo $row['product_name']; ?></b></a></h2>
                                        <div class="rating">
                                            <!-- Your rating code here -->
                                        </div>
                                        <b><span class="price">$<?php echo $row['price']; ?></span></b>
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                        <button type="submit"  name="add_to_cart" class="btn btn-add-to-cart"><i class="fa-solid fa-cart-shopping"></i>View Cart</button>
                                    </div>
                                    <div><span class="product-bedge sale">Sale</span></div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
                <!-- Single Product End for Jewelry -->
            </div>
        </div>
    </div>
</div>

<!-- Cosmetic Products -->
<div id="cosmetic-products-wrapper" class="p-6">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>Featured Cosmetics Products</h2>
                    <p>Trending stunning Unique</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="products-wrapper products-gird ">
            <div class="row custom-padding">
                <!-- Single Product Start for Cosmetics -->
                <?php
                $queryCosmetic = "SELECT * FROM products WHERE product_category = 'cosmetic' LIMIT 20";
                $resultCosmetic = mysqli_query($connect, $queryCosmetic);

                if ($resultCosmetic) {
                    while ($row = mysqli_fetch_assoc($resultCosmetic)) {
                        ?>
                        <div class="col-sm-6 col-lg-3">
                            <form action="single-product.php" method="GET" class="post-form">
                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <img src="adminfolder/productimages/<?php echo $row['image_url']; ?>" alt="<?php echo $row['product_name']; ?>" class="img-fluid"/>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="single-product.php?product_id=<?php echo $row['product_id']; ?>"><b><?php echo $row['product_name']; ?></b></a></h2>
                                        <div class="rating">
                                            <!-- Your rating code here -->
                                        </div>
                                        <b><span class="price">$<?php echo $row['price']; ?></span></b>
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                        <button type="submit"  name="add_to_cart" class="btn btn-add-to-cart"><i class="fa-solid fa-cart-shopping"></i>View Cart</button>
                                    </div>
                                    <div><span class="product-bedge sale">Sale</span></div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
                <!-- Single Product End for Cosmetics -->
            </div>
        </div>
    </div>
</div>

                

         



<!-- cosmetic product end  -->

<!--  Products Area end -->


<!--== Testimonial Area Start ==-->
<section id="testimonial-area" class="p-9 ">
    <div class="ruby-container">
        <div class="testimonial-wrapper" >
            <div class="row">
                <div class="col-lg-12 text-center" >
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2>What People Say</h2>
                        <p>Testimonials</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7 m-auto text-center">
                    <div class="testimonial-content-wrap">
                        <div id="testimonialCarousel" class="owl-carousel">
                            <div class="single-testimonial-item">
                                <p>These guys have been absolutely outstanding. When I needed them they came through in
                                    a big way! I know that if you buy this theme, you'll get the one thing we all look
                                    for when we buy on Themeforest, and that's real support for the craziest of
                                    requests!</p>

                                <h3 class="client-name">Luis Manrata</h3>
                                <span class="client-email">you@email.here</span>
                            </div>

                            <div class="single-testimonial-item">
                                <p>These guys have been absolutely outstanding. When I needed them they came through in
                                    a big way! I know that if you buy this theme, you'll get the one thing we all look
                                    for when we buy on Themeforest, and that's real support for the craziest of
                                    requests!</p>

                                <h3 class="client-name">John Dibba</h3>
                                <span class="client-email">you@email.here</span>
                            </div>

                            <div class="single-testimonial-item">
                                <p>These guys have been absolutely outstanding. When I needed them they came through in
                                    a big way! I know that if you buy this theme, you'll get the one thing we all look
                                    for when we buy on Themeforest, and that's real support for the craziest of
                                    requests!</p>

                                <h3 class="client-name">Alex Tuntuni</h3>
                                <span class="client-email">you@email.here</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Testimonial Area End ==-->

<!--== Newsletter Area Start ==-->
<section id="newsletter-area" class="p-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>Join The Newsletter</h2>
                    <p>Sign Up for Our Newsletter</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="newsletter-form-wrap">
                    <form id="subscribe-form" action="https://d29u17ylf1ylz9.cloudfront.net/ruby-v2/ruby/assets/php/subscribe.php" method="post">
                        <input id="subscribe" type="email" name="email" placeholder="Enter your Email  Here" required/>
                        <button type="submit" class="btn-long-arrow">Subscribe</button>
                        <div id="result"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Newsletter Area End ==-->

<?php

include "include/footer.php" 




?>