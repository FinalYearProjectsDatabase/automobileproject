<section class="categories-section rev-14-categories">
        <div class="container">
            <div class="rev-14-section-heading">
                <h2 class="rev-14-section-title">Services</h2>
                <!-- <a href="#" class="rev-14-def-btn">Show More</a> -->
            </div>
            <div class="row gy-4">

            <?php
                require 'controllers/ServicesClass.php';

                $serviceObj = new ServicesClass;

                $services = $serviceObj->services();

                $response = json_decode($services);

                foreach($response as $value){
            ?>
                <div class="col-lg-3 col-md-4 col-6 col-xs-12">
                    <div class="single-product-card rev-11-single-product rev-14-single-product">
                        <div class="single-product__img part-img">
                            <img src="../service-images/<?php echo $value->service_image?>" alt="Product Image">
                            <!-- <div class="single-product__actions">
                                <button class="compare-btn"><i class="fa-regular fa-shuffle"></i></button>
                                <button class="add-to-wishlist-btn"><i class="fa-regular fa-heart"></i></button>
                                <button class="add-to-cart-btn"><i class="fa-regular fa-shopping-bag"></i></button>
                                <button class="quick-view"><i class="fa-regular fa-eye"></i></button>
                            </div> -->
                        </div>

                        <div class="single-product__txt">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h4 class="single-product__title">
                                        <a href="service-booking.php?service_id=<?php echo $value->service_id?>">
                                            <?php echo $value->service_type?> - <?php echo $value->vendor_name?>
                                        </a>
                                    </h4>
                                    <span><?php echo $value->vendor_business_name?></span>
                                    <span>Location: <?php echo $value->service_location?></span>
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