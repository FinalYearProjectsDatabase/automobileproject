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
                            
                            <div class="alert" id="alert-notice"></div>
                            
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" id="service_booking">
                                <div class="row g-xl-4 g-3">
                                    <div class="col-lg-12 col-md-12 col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Name</label>
                                            <input type="text" name="user_booking_name" class="form-control" id="formGroupExampleInput">
                                            <input type="hidden" name="vendor_id" value="<?php echo $response->vendor_id?>">
                                            <input type="hidden" name="service_id" value="<?php echo $response->service_id?>">
                                            <input type="hidden" name="user_booking_id" value="<?php echo $_SESSION['user_id']?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Contact</label>
                                            <input type="text" name="user_booking_contact" class="form-control" id="formGroupExampleInput">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Email</label>
                                            <input type="text" name="user_booking_email" class="form-control" id="formGroupExampleInput">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Location</label>
                                            <input type="text" name="user_booking_location" class="form-control" id="formGroupExampleInput">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Vehicle Type, Color, License Plate</label>
                                            <textarea name="user_booking_vehicle" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Description</label>
                                            <textarea name="user_booking_description" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Upload Pictures</label>
                                            <input type="file" name="user_booking_files" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">Booking Date</label>
                                            <input type="date" name="user_booking_date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-box mt-4">
                                    <button type="submit" name="book_service" id="addToCart"><span><i class="fa-light fa-bookmark"></i></span>Book Service Now</button>
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

<script src="models/booking/js/booking-script.js"></script>

