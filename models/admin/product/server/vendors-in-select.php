<?php

    session_start();

    // database parameters
    require '../../../../config/db-parameters.php';
    // database class
    require('../../../../controllers/DataBaseClass.php');
    // vendors class
    require('../../../../controllers/VendorsClass.php');

    // initialize the vendor class with an object
    $vendorObj = new VendorsClass;

    // get the new vendor method and we pass the various parameters to create a new clients
    $vendorData = $vendorObj->vendors_in_select_input();

    // get the outcome of the method which is to return a json response and convert it in array
    $outcome = json_decode($vendorData);

    $output = "<option value=''>Choose</option>";
    $output .= "<option value='".$_SESSION['user_id']."'>Super Administrator</option>";

    foreach($outcome as  $value){
        $output .= "<option value='".$value->vendor_id."'>".$value->vendor_name.' - '.$value->vendor_business_name."</option>";
    }

    echo $output;