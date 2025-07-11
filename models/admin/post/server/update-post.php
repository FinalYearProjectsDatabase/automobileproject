<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['post_title'])
            && isset($_POST['post_description'])
            && isset($_POST['post_video_link'])
            && isset($_POST['old_post_featured_image'])
            && isset($_FILES['post_featured_image'])
            && isset($_POST["post_id"])
        ){

            // this file helps us to get the uuid method and username method
            require('../../../../config/functions.php');
            // settings
            require('../../../../config/index-settings.php');
            // database parameters
            require '../../../../config/db-parameters.php';

            $post_id = filter_input(INPUT_POST, "post_id", FILTER_SANITIZE_SPECIAL_CHARS);
            $title = filter_input(INPUT_POST, "post_title", FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, "post_description", FILTER_SANITIZE_SPECIAL_CHARS);
            $video_link = filter_input(INPUT_POST, "post_video_link", FILTER_SANITIZE_SPECIAL_CHARS);
            $old_featured_img = filter_input(INPUT_POST, 'old_post_featured_image', FILTER_SANITIZE_SPECIAL_CHARS);  

            // database class
            require('../../../../controllers/DataBaseClass.php');
            // Posts class
            require('../../../../controllers/PostsClass.php');   
            // initialize the post class with an object
            $postObj = new PostsClass;     

            // check if featured image has been uploaded
            if($_FILES["post_featured_image"]["name"] > 0){
                $fileName = $_FILES["post_featured_image"]["name"];
                $fileTemp = $_FILES["post_featured_image"]["tmp_name"];
                $fileDestination = "../../../../post-images/";
                $fileSize = $_FILES["post_featured_image"]["size"];
                $valid_Extension = ["jpeg", "jpg", "png", "pdf"];

                $oldExtension = explode(".", $fileName);
                $newExtension = strtolower(end($oldExtension));

                if(in_array($newExtension, $valid_Extension)){
                    if($fileSize <= 1000000){
                        $post_img = $post_id.time().".".$newExtension;
                        // move uploaded business profile
                        move_uploaded_file($fileTemp, $fileDestination.$post_img);

                        // get the new post method and we pass the various parameters to update Posts
                        $updateVendor = $postObj->update_post($post_id, $title, $description, $post_img, $video_link);

                        // get the outcome of the method which is to return a json response and convert it in array
                        $outcome = json_decode($updateVendor);

                        $response = $outcome;

                    }else{
                        $response = [
                            'status' => 201,
                            'msg' => 'File Size exceeds 1MB'
                        ];
                    }
                }else{
                    $response = [
                        'status' => 201,
                        'msg' => 'Invalid format. Preferred format: jpeg, jpg, png, pdf'
                    ];
                }
            }else{
                $post_img = $old_featured_img;
                // get the new post method and we pass the various parameters to update Posts
                $updateVendor = $postObj->update_post($post_id, $title, $description, $post_img, $video_link);

                // get the outcome of the method which is to return a json response and convert it in array
                $outcome = json_decode($updateVendor);

                $response = $outcome;
            }

            echo json_encode($response);
        }
    }else{
        $response = [
            'status' => 201,
            'msg' => 'Invalid request.'
        ];
        echo json_encode($response);
    }