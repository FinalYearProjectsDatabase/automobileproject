<?php

    session_start();

    if(isset($_GET['product_id'])){
        // this file helps us to get the uuid method and username method
        require('../../../../config/functions.php');
        // settings
        require('../../../../config/index-settings.php');
        // database parameters
        require '../../../../config/db-parameters.php';
        $product_id = filter_input(INPUT_GET, "product_id", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // products class
        require('../../../../controllers/ProductsClass.php');

        // initialize the product class with an object
        $productObj = new ProductsClass;

        // get the new product method and we pass the various parameters to create a new clients
        $productData = $productObj->get_product($product_id);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($productData);

        echo json_encode($outcome);
    }