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
    
        if(empty($_SESSION["user_id"])){
            
            
            echo '<div class="alert alert-warning text-center"><h4>You need to login or create an account to proceed to checkout</h4></div>';
            
        }else{
            
            
            if(isset($_GET["product_id"]) && $_GET["product_id"] ?? ''){

                require 'controllers/ProductsClass.php';
    
                $productObj = new ProductsClass;
    
                $products = $productObj->get_product($_GET["product_id"]);
    
                $response = json_decode($products);
        

        

    ?>

    <!--------------------------------- BANNER SECTION START --------------------------------->
    <div class="banner banner-inner">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-9 col-8">
                    <div class="breadcrumb-txt">
                        <h1>Product Detail</h1>
                        <ul>
                            <li><a href="/"><i class="fa-regular fa-house"></i></a></li>
                            <li>/</li>
                            <li>Product Detail</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3 col-4">
                    <div class="part-img">
                        <img src="../product-images/<?php echo $response->product_image?>" alt="Image">
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
                                <img src="../product-images/<?php echo $response->product_image?>" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-6">
                        <div class="part-txt">
                            <h2 class="main-product-title"><?php echo $response->product_name?></h2>
                            
                            <p class="price">GHc <?php echo $response->product_price?></p>
                            
                            <p class="dscr"><?php echo $response->product_description?></p>
                            <form method="POST" id="order" action="product-checkout.php" >
                                <div class="row g-xl-4 g-3">
                                    <div class="col-lg-4 col-md-12 col-sm-4">
                                        <div class="mb-3">
                                            <label>QTY</label>
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? '' ?>">
                                            <input type="hidden" name="price" value="<?php echo $response->product_price ?>">
                                            <input type="hidden" name="product_id" value="<?php echo $response->product_id ?>">
                                            <input type="number" min="1" max="100" step="1" value="1" name="order_quantity" class="form-control">
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
        }

    ?>

    <!--------------------------------- FOOTER SECTION STARTS HERE --------------------------------->
    <?php require(__DIR__.'/components/index-footer-version.php')?>
    <!--------------------------------- FOOTER SECTION ENDS HERE --------------------------------->

<?php require(__DIR__.'/components/index-footer.php')?>

