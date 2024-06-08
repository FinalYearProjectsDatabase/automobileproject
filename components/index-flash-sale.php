<section class="flash-sale rev-14-flash-sale">
        <div class="container">
            <div class="rev-14-section-heading">
                <h2 class="rev-14-section-title">Products on Sale</h2>
                <!-- <a href="#" class="rev-14-def-btn">Show More</a> -->
            </div>

            <div class="row justify-content-center">

            <?php

                require 'controllers/ProductsClass.php';

                $productObj = new ProductsClass;

                $products = $productObj->products();

                $response = json_decode($products);

                foreach($response as $value){
            ?>

                <div class="col-lg-3 col-md-4 col-6 col-xs-12">
                    <div class="single-product-card rev-11-single-product rev-14-single-product">
                        <div class="single-product__img part-img">
                            <img src="../product-images/<?php echo $value->product_image?>" alt="Product Image">
                            <!-- <div class="single-product__actions">
                                <button class="compare-btn"><i class="fa-regular fa-shuffle"></i></button>
                                <button class="add-to-wishlist-btn"><i class="fa-regular fa-heart"></i></button>
                                <button class="add-to-cart-btn"><i class="fa-regular fa-shopping-bag"></i></button>
                                <button class="quick-view"><i class="fa-regular fa-eye"></i></button>
                            </div> -->
                        </div>

                        <div class="single-product__txt">
                            <div class="row">
                                <div class="col-xl-8">
                                    <h4 class="single-product__title"><a href="product-detail.php?product_id=<?php echo $value->product_id?>"><?php echo $value->product_name?></a></h4>
                                    <span><?php echo $value->product_type?></span>
                                </div>

                                <div class="col-xl-4">
                                    <div class="single-product__price">
                                        <span class="current-price">GHc <?php echo $value->product_price?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            </div>
        </div>
    </section>