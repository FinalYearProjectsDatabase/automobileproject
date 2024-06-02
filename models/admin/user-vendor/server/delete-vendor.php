<?php

    session_start();

    if(isset($_POST['user_vendor_id'])){
        // database parameters
        require '../../../../config/db-parameters.php';
        $user_id = filter_input(INPUT_POST, "user_vendor_id", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // vendors class
        require('../../../../controllers/VendorsClass.php');

        // initialize the vendor class with an object
        $deleteObj = new VendorsClass;

        // delete vendor method and we pass the various parameters to delete vendor
        $deleteVendor = $deleteObj->delete_vendor_client($user_id);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($deleteVendor);

        echo json_encode($outcome);
    }