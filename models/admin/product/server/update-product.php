<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['product_name'])
            && isset($_POST['product_description'])
            && isset($_POST['product_vendor'])
            && isset($_POST['product_type'])
            && isset($_POST['product_price'])
            && isset($_POST['product_id'])
            && isset($_POST['fetch_product_image'])
            && isset($_FILES['product_image'])
            && isset($_POST["product_status"])
        ){

            // this file helps us to get the uuid method and username method
            require('../../../../config/functions.php');
            // settings
            require('../../../../config/index-settings.php');
            // database parameters
            require '../../../../config/db-parameters.php';
            $product_id =filter_input(INPUT_POST, "product_id", FILTER_SANITIZE_SPECIAL_CHARS);
            $fetch_product_image = filter_input(INPUT_POST, "fetch_product_image", FILTER_SANITIZE_SPECIAL_CHARS);
            $product_name = filter_input(INPUT_POST, "product_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $product_description = filter_input(INPUT_POST, "product_description", FILTER_SANITIZE_SPECIAL_CHARS);
            $product_vendor = filter_input(INPUT_POST, "product_vendor", FILTER_SANITIZE_SPECIAL_CHARS);
            $product_type = filter_input(INPUT_POST, "product_type", FILTER_SANITIZE_SPECIAL_CHARS);
            $product_price = filter_input(INPUT_POST, "product_price", FILTER_SANITIZE_SPECIAL_CHARS); 
            $product_status = filter_input(INPUT_POST, "product_status", FILTER_SANITIZE_SPECIAL_CHARS); 

            // database class
            require('../../../../controllers/DataBaseClass.php');
            // products class
            require('../../../../controllers/ProductsClass.php');
            // initialize the product class with an object
            $productObj = new ProductsClass;  

            // check if featured image has been uploaded
            if($_FILES["product_image"]["name"] > 0){
                $fileName = $_FILES["product_image"]["name"];
                $fileTemp = $_FILES["product_image"]["tmp_name"];
                $fileDestination = "../../../../product-images/";
                $fileSize = $_FILES["product_image"]["size"];
                $valid_Extension = ["jpeg", "jpg", "png", "pdf"];

                $oldExtension = explode(".", $fileName);
                $newExtension = strtolower(end($oldExtension));

                if(in_array($newExtension, $valid_Extension)){
                    if($fileSize <= 1000000){
                        $product_image = $product_id.time().".".$newExtension;
                        // move uploaded profile
                        move_uploaded_file($fileTemp, $fileDestination.$product_image);

                        // get the product update method and we pass the various parameters to update Posts
                        $updateProduct = $productObj->update_product($product_id, $product_name, $product_description, $product_image, $product_vendor, $product_type, $product_status, $product_price);

                        // get the outcome of the method which is to return a json response and convert it in array
                        $outcome = json_decode($updateProduct);

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
                $product_image = $fetch_product_image;
                // get the new post method and we pass the various parameters to update Posts
                $updateProduct = $productObj->update_product($product_id, $product_name, $product_description, $product_image, $product_vendor, $product_type, $product_status, $product_price);

                // get the outcome of the method which is to return a json response and convert it in array
                $outcome = json_decode($updateProduct);

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