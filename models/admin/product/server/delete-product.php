<?php

    session_start();

    if(isset($_POST['product_id'])){
        // database parameters
        require '../../../../config/db-parameters.php';
        $product_id = filter_input(INPUT_POST, "product_id", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // products class
        require('../../../../controllers/ProductsClass.php');  
        // initialize the product class with an object
        $productObj = new ProductsClass;   

        // delete post method and we pass the various parameters to delete post
        $deleteProduct = $productObj->delete_product($product_id);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($deleteProduct);

        echo json_encode($outcome);
    }