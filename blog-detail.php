<?php
    session_start();
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

    <!--------------------------------- BLOG SECTION START --------------------------------->
    <div class="blog-details py-120">
        <div class="container">
            <div class="row">
                <?php
                    require 'config/db-parameters.php';
                    require 'controllers/DataBaseClass.php';
                    require 'controllers/PostsClass.php';

                    if(isset($_GET["blog"]) && $_GET["blog"] ?? ''){
                        $blog = filter_input(INPUT_GET, "blog", FILTER_SANITIZE_SPECIAL_CHARS);
                        
                        $PostObj = new PostsClass;

                        $getPost = $PostObj->get_post_data($blog);

                        $response = json_decode($getPost);
                ?>

                    <div class="col-lg-8">
                        <div class="main-img">
                            <img src="post-images/<?php echo $response->post_featured_image ?>" alt="Image">
                        </div>
                    
                        <div class="part-txt">
                            <div class="title-box">
                                <ul class="blog-info">
                                    <li><?php echo date("l F j, Y", strtotime($response->created_at)) ?></li>
                                </ul>
                                <h2 class="blog-title"><?php echo $response->post_title ?></h2>
                            </div>
                            <p><?php echo $response->post_description ?></p>
                        </div>
                    </div>

                <?php                        
                    }
                ?>
            </div>
        </div>
    </div>
    <!--------------------------------- BLOG SECTION END --------------------------------->


    <!--------------------------------- FOOTER SECTION STARTS HERE --------------------------------->
    <?php require(__DIR__.'/components/index-footer-version.php')?>
    <!--------------------------------- FOOTER SECTION ENDS HERE --------------------------------->

<?php require(__DIR__.'/components/index-footer.php')?>

