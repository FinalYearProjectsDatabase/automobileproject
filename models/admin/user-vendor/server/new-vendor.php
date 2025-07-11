<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['user_vendor_name'])
            && isset($_POST['user_vendor_dob'])
            && isset($_POST['user_vendor_address'])
            && isset($_POST['user_vendor_gps_address'])            
            && isset($_POST['user_vendor_email'])
            && isset($_POST['user_vendor_contact'])
            && isset($_POST['user_vendor_business_name'])
            && isset($_POST['user_vendor_reg_number'])
            && isset($_POST['vendor_type'])
            && isset($_FILES['user_vendor_business_file'])
        ){

            // this file helps us to get the uuid method and username method
            require('../../../../config/functions.php');
            // settings
            require('../../../../config/index-settings.php');
            // database parameters
            require '../../../../config/db-parameters.php';
            $user_id = uuid();
            $name = filter_input(INPUT_POST, "user_vendor_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $dob = filter_input(INPUT_POST, "user_vendor_dob", FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, "user_vendor_address", FILTER_SANITIZE_SPECIAL_CHARS);
            $gps_address = filter_input(INPUT_POST, "user_vendor_gps_address", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "user_vendor_email", FILTER_SANITIZE_SPECIAL_CHARS);
            $user_name = username($email);
            $contact = filter_input(INPUT_POST, "user_vendor_contact", FILTER_SANITIZE_SPECIAL_CHARS);
            $business_name = filter_input(INPUT_POST, "user_vendor_business_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $business_id = filter_input(INPUT_POST, "user_vendor_reg_number", FILTER_SANITIZE_SPECIAL_CHARS);
            $vendorTypes = filter_input(INPUT_POST, "vendor_type", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY) ?? [];            

            foreach($_POST['vendor_type'] as $value){
                $vendor_type[] = $value;
            }

            // business profile handling
            $fileName = $_FILES["user_vendor_business_file"]["name"];
            $fileTemp = $_FILES["user_vendor_business_file"]["tmp_name"];
            $fileDestination = "../../../../business-profiles/";
            $fileSize = $_FILES["user_vendor_business_file"]["size"];
            $valid_Extension = ["jpeg", "jpg", "png", "pdf"];

            $oldExtension = explode(".", $fileName);
            $newExtension = strtolower(end($oldExtension));

            if(in_array($newExtension, $valid_Extension)){
                if($fileSize <= 1000000){
                    $profile_business = $user_id.".".$newExtension;
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

            // database class
            require('../../../../controllers/DataBaseClass.php');
            // vendors class
            require('../../../../controllers/vendorsClass.php');

            // initialize the vendor class with an object
            $vendorObj = new vendorsClass;

            // get the new vendor method and we pass the various parameters to create a new vendors
            $newVendor = $vendorObj->new_vendor_client($user_id, $name, $user_name, $dob, $address, $gps_address, $email, $contact, $business_name, $business_id, $profile_business, json_encode($vendor_type));

            // get the outcome of the method which is to return a json response and convert it in array
            $outcome = json_decode($newVendor);

            // move uploaded business profile
            move_uploaded_file($fileTemp, $fileDestination.$profile_business);

            echo json_encode($outcome);
        }
    }else{
        $response = [
            'status' => 201,
            'msg' => 'Invalid request.'
        ];
        echo json_encode($response);
    }