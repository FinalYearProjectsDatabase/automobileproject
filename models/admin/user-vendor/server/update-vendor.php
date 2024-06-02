<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['user_vendor_name'])
            && isset($_POST['user_vendor_dob'])
            && isset($_POST['user_vendor_address'])
            && isset($_POST['user_vendor_email'])
            && isset($_POST['user_vendor_contact'])
            && isset($_POST['user_vendor_business_name'])
            && isset($_POST['user_vendor_reg_number'])
            && isset($_POST['user_vendor_id'])
        ){

            // this file helps us to get the uuid method and username method
            require('../../../../config/functions.php');
            // settings
            require('../../../../config/index-settings.php');
            // database parameters
            require '../../../../config/db-parameters.php';

            $user_id = filter_input(INPUT_POST, "user_vendor_id", FILTER_SANITIZE_SPECIAL_CHARS);
            $name = filter_input(INPUT_POST, "user_vendor_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $dob = filter_input(INPUT_POST, "user_vendor_dob", FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, "user_vendor_address", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "user_vendor_email", FILTER_SANITIZE_SPECIAL_CHARS);
            $user_name = filter_input(INPUT_POST, "user_vendor_username", FILTER_SANITIZE_SPECIAL_CHARS);
            $contact = filter_input(INPUT_POST, "user_vendor_contact", FILTER_SANITIZE_SPECIAL_CHARS);
            $business_name = filter_input(INPUT_POST, "user_vendor_business_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $business_id = filter_input(INPUT_POST, "user_vendor_reg_number", FILTER_SANITIZE_SPECIAL_CHARS);          


            // database class
            require('../../../../controllers/DataBaseClass.php');
            // vendors class
            require('../../../../controllers/vendorsClass.php');

            // initialize the vendor class with an object
            $vendorObj = new vendorsClass;

            // get the new vendor method and we pass the various parameters to update vendors
            $updateVendor = $vendorObj->update_vendor_client($user_id, $name, $user_name, $dob, $address, $email, $contact, $business_name, $business_id);

            // get the outcome of the method which is to return a json response and convert it in array
            $outcome = json_decode($updateVendor);


            echo json_encode($outcome);
        }
    }else{
        $response = [
            'status' => 201,
            'msg' => 'Invalid request.'
        ];
        echo json_encode($response);
    }