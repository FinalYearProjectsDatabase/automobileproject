<?php

    session_start();

    if(isset($_POST['service_id'])){
        // database parameters
        require '../../../../config/db-parameters.php';
        $service_id = filter_input(INPUT_POST, "service_id", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // services class
        require('../../../../controllers/ServicesClass.php');  
        // initialize the service class with an object
        $serviceObj = new ServicesClass;   

        // delete post method and we pass the various parameters to delete post
        $deleteService = $serviceObj->delete_service($service_id);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($deleteService);

        echo json_encode($outcome);
    }