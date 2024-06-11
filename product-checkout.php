<?php
    session_start();
    require 'config/db-parameters.php';
    require 'controllers/DataBaseClass.php';
    require_once('config/index-settings.php');
    require_once('config/functions.php');
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
    
        if(isset($_POST["order_now"])){
            $order_id = uuid();
            $user_id = filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_SPECIAL_CHARS);
            $product_id = filter_input(INPUT_POST, "product_id", FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_SPECIAL_CHARS);
            $quantity = filter_input(INPUT_POST, "order_quantity", FILTER_SANITIZE_SPECIAL_CHARS);
            $total = filter_input(INPUT_POST, "total", FILTER_SANITIZE_SPECIAL_CHARS);
            $user_type = filter_input(INPUT_POST, "user_type", FILTER_SANITIZE_SPECIAL_CHARS);
            $name = filter_input(INPUT_POST, "order_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $contact = filter_input(INPUT_POST, "order_contact", FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, "order_address", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "order_email", FILTER_SANITIZE_SPECIAL_CHARS);
            $other_info = filter_input(INPUT_POST, "order_other_info", FILTER_SANITIZE_SPECIAL_CHARS);
            
            require 'controllers/OrdersClass.php';
            
            $orderObj = new OrdersClass;
            
            $new_order = $orderObj->new_order($order_id, $user_id, $product_id, $price, $quantity, $total, $user_type, $name, $contact, $address, $email, $other_info);
            
            $response = json_decode($new_order);
            
            if($response->status == 200){
                echo '<script>
                            alert("'.$response->msg.'");
                            window.location.href="/"
                        </script>';
            }else{
                echo '<div class="alert alert-warning text-center"><h4>'.$response->msg.'</h4></div>';
            }
            
        }
    
        if(isset($_POST["product_id"]) && isset($_POST["user_id"]) && isset($_POST["price"]) && isset($_POST["order_quantity"])){
            
            $user_id = filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_SPECIAL_CHARS);
            $product_id = filter_input(INPUT_POST, "product_id", FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_SPECIAL_CHARS);
            $order_quantity = filter_input(INPUT_POST, "order_quantity", FILTER_SANITIZE_SPECIAL_CHARS);
            $total = 0;
            
            $total = doubleval($price) * $order_quantity;

            require 'controllers/ProductsClass.php';
            require 'controllers/UsersClass.php';
            require 'controllers/VendorsClass.php';
            require 'controllers/ClientsClass.php';

            $userObj = new UsersClass;

            $user = $userObj->get_user($user_id);

            $responseUser = json_decode($user);

            if($responseUser->user_type == 2){
                $clientObj = new ClientsClass;
                $client = $clientObj->get_user_client($user_id);
                $responseUser = json_decode($client);
                $name = $responseUser->client_name;
                $contact = $responseUser->client_contact;
                $email = $responseUser->client_email;
                $address = $responseUser->client_address;
            }elseif($responseUser->user_type == 3){
                $vendorObj = new VendorsClass;
                $vendor = $vendorObj->get_vendor_client($user_id);
                $responseUser = json_decode($vendor);
                $name = $responseUser->vendor_name;
                $contact = $responseUser->vendor_contact;
                $email = $responseUser->vendor_email;
                $address = $responseUser->vendor_gps_address;
            }else{
                $name = $responseUser->name;
                $contact = '';
                $email = $responseUser->user_email;
                $address = '';
            }

            $productObj = new ProductsClass;

            $products = $productObj->get_product($product_id);

            $response = json_decode($products);

    ?>

    <!--------------------------------- BANNER SECTION START --------------------------------->
    <div class="banner banner-inner">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-9 col-8">
                    <div class="breadcrumb-txt">
                        <h1>Product Checkout</h1>
                        <ul>
                            <li><a href="/"><i class="fa-regular fa-house"></i></a></li>
                            <li>/</li>
                            <li>Product Checkout</li>
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
                            <p class="main-product-title text-danger text-center">Fill  in your details for order processing</p>
                            
                            <h2 class="main-product-title"><?php echo $response->product_name?></h2>
                            
                            <p class="price">Total Due : GHc <?php echo $price?> x <?php echo $order_quantity?> = GHc <?php echo $total?></p>
                            
                            <form method="post" id="order" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                                <div class="row g-xl-4 g-3">
                                    <div class="col-lg-12 col-md-12 col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Name</label>
                                            <input type="text" name="order_name" class="form-control" id="formGroupExampleInput" value="<?php echo $name ?>">
                                            <input type="hidden" name="order_quantity"value="<?php echo $order_quantity?>">
                                            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                            <input type="hidden" name="price" value="<?php echo $price ?>">
                                            <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                                            <input type="hidden" name="user_type" value="<?php echo $responseUser->user_type ?>">
                                            <input type="hidden" name="total" value="<?php echo $total ?>">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Contact</label>
                                            <input type="text" name="order_contact" class="form-control" id="formGroupExampleInput" value="<?php echo $contact ?>">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Address. Use Ghana POST GPS for address accuracy</label>
                                            <input type="text" name="order_address" class="form-control" id="formGroupExampleInput" value="<?php echo $address ?>">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Email Address</label>
                                            <input type="text" name="order_email" class="form-control" id="formGroupExampleInput" value="<?php echo $email ?>">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Other Information</label>
                                            <input type="text" name="order_other_info" class="form-control" id="formGroupExampleInput">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="btn-box mt-4">
                                    <button type="submit" name="order_now" id="addToCart"><span><i class="fa-light fa-cart-shopping"></i></span>Order</button>
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

