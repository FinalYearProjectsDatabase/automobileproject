<?php
    session_start();
    require 'config/db-parameters.php';
    require 'controllers/DataBaseClass.php';
    require_once('config/index-settings.php');
    require(__DIR__.'/components/index-head.php');
?>

<body class="rev-10-body">
    <!-- preloader -->
    <?php require(__DIR__.'/components/index-preloader.php')?>

    <!--------------------------------- HEADER SECTION START --------------------------------->
    <?php 
        require(__DIR__.'/components/index-header-section.php')
    ?>
    <!--------------------------------- HEADER SECTION END --------------------------------->

    <?php
        if(isset($_GET["service_id"]) && $_GET["service_id"] ?? ''){

            require 'controllers/ServicesClass.php';

            $serviceObj = new ServicesClass;

            $service = $serviceObj->get_service_detail_from_vendors_services($_GET["service_id"]);

            $response = json_decode($service);

    ?>

    <!--------------------------------- BANNER SECTION START --------------------------------->
    <div class="banner banner-inner">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-9 col-8">
                    <div class="breadcrumb-txt">
                        <h1>Service Detail</h1>
                        <ul>
                            <li><a href="/"><i class="fa-regular fa-house"></i></a></li>
                            <li>/</li>
                            <li>Service Detail</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3 col-4">
                    <div class="part-img">
                        <img src="../service-images/<?php echo $response->service_image?>" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------- BANNER SECTION END --------------------------------->



    <!--------------------------------- SHOP SECTION START --------------------------------->
    <div class="shop-details py-120">
        <div class="container">
            <div class="product-view-area">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <div class="part-img mr-30">
                            <div class="img-box" id="bigPreview">
                                <img src="../service-images/<?php echo $response->service_image?>" alt="Image">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-6">
                        <div class="part-txt">
                            <h2 class="main-product-title"><?php echo $response->service_type?></h2>
                            
                            <p class="price"><?php echo $response->vendor_name?></p>
                            
                            <p class="dscr"><?php echo $response->service_description?></p>
                            <form>
                                <div class="row g-xl-4 g-3">
                                    <div class="col-lg-4 col-md-12 col-sm-4">
                                        <div class="quantity-wrap">
                                            <label>QTY</label>
                                            <div class="product-count">
                                                <div class="quantity rapper-quantity">
                                                    <input type="number" min="1" max="100" step="1" value="1" readonly name="order_quantity">
                                                    <div class="quantity-nav">
                                                        <div class="quantity-button quantity-down">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </div>
                                                        <div class="quantity-button quantity-up">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-box mt-4">
                                    <button id="addToCart"><span><i class="fa-light fa-cart-shopping"></i></span>Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------- SHOP SECTION END --------------------------------->

    <?php

        }

    ?>

    <!--------------------------------- FOOTER SECTION STARTS HERE --------------------------------->
    <?php require(__DIR__.'/components/index-footer-version.php')?>
    <!--------------------------------- FOOTER SECTION ENDS HERE --------------------------------->

<?php require(__DIR__.'/components/index-footer.php')?>

