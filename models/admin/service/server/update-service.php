<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['service_vendor'])
            && isset($_POST['service_type'])
            && isset($_POST['service_description'])
            && isset($_POST['service_location'])
            && isset($_POST['service_status'])
            && isset($_POST['service_id'])
            && isset($_POST['fetch_service_image'])
            && isset($_FILES['service_image'])
        ){

            // this file helps us to get the uuid method and username method
            require('../../../../config/functions.php');
            // settings
            require('../../../../config/index-settings.php');
            // database parameters
            require '../../../../config/db-parameters.php';
            $service_id = filter_input(INPUT_POST, "service_id", FILTER_SANITIZE_SPECIAL_CHARS);
            $service_description = filter_input(INPUT_POST, "service_description", FILTER_SANITIZE_SPECIAL_CHARS);
            $service_vendor = filter_input(INPUT_POST, "service_vendor", FILTER_SANITIZE_SPECIAL_CHARS);
            $service_type = filter_input(INPUT_POST, "service_type", FILTER_SANITIZE_SPECIAL_CHARS);
            $service_location = filter_input(INPUT_POST, "service_location", FILTER_SANITIZE_SPECIAL_CHARS);
            $service_status = filter_input(INPUT_POST, "service_status", FILTER_SANITIZE_SPECIAL_CHARS);

            if(empty($_FILES["service_image"]["name"])){
                $service_img = filter_input(INPUT_POST, "fetch_service_image", FILTER_SANITIZE_SPECIAL_CHARS);
            }else{
                // service profile handling
                $fileName = $_FILES["service_image"]["name"];
                $fileTemp = $_FILES["service_image"]["tmp_name"];
                $fileDestination = "../../../../service-images/";
                $fileSize = $_FILES["service_image"]["size"];
                $valid_Extension = ["jpeg", "jpg", "png", "pdf"];

                $oldExtension = explode(".", $fileName);
                $updateExtension = strtolower(end($oldExtension));

                if(in_array($updateExtension, $valid_Extension)){
                    if($fileSize <= 1000000){
                        $service_img = $service_id.time().".".$updateExtension;
                        // move uploaded service profile
                        move_uploaded_file($fileTemp, $fileDestination.$service_img);
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
            }

            // database class
            require('../../../../controllers/DataBaseClass.php');
            // services class
            require('../../../../controllers/ServicesClass.php');

            // initialize the post class with an object
            $serviceObj = new ServicesClass;

            // get the update service method and we pass the various parameters to create a update service
            $updateService = $serviceObj->update_service($service_id, $service_description, $service_img, $service_vendor, $service_type, $service_location, $service_status);

            // get the outcome of the method which is to return a json response and convert it in array
            $outcome = json_decode($updateService);

            $response = $outcome;

            echo json_encode($response);
        }
    }else{
        $response = [
            'status' => 201,
            'msg' => 'Invalid request.'
        ];
        echo json_encode($response);
    }