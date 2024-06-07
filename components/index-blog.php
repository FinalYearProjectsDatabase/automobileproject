<section class="blog-section rev-10-blog-section rev-14-blog">
        <div class="container">
            <div class="rev-14-section-heading">
                <h2 class="rev-14-section-title">Blog Posts</h2>
            </div>
            <div class="row gy-4 justify-content-center">
                <?php
                    require 'config/db-parameters.php';
                    require 'controllers/DataBaseClass.php';
                    require 'controllers/PostsClass.php';
                    $PostObj = new PostsClass;

                    $getPosts = $PostObj->get_all_posts();

                    $response = json_decode($getPosts);

                    foreach($response as $value){
                        
                ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-9 col-xs-12">
                        <div class="rev-10-single-blog">
                            <div class="rev-10-single-blog__img">
                                <img src="../post-images/<?php echo $value->post_featured_image?>" alt="Blog Image">
                            </div>

                            <div class="rev-10-single-blog__txt">
                                <div class="rev-10-single-blog__author-and-date">
                                    <span class="blog-date"><?php echo date("l F j, Y", strtotime($value->created_at)) ?></span>
                                </div>
                                <h3 class="rev-10-single-blog__title"><a href="blog-detail.php?blog=<?php echo $value->post_id?>"><?php echo $value->post_title?> </a></h3>
                            </div>
                        </div>
                    </div>

                <?php

                    }

                ?>
            </div>
        </div>
    </section>