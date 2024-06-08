<?php

    session_start();

    if(isset($_GET['service_id'])){
        // this file helps us to get the uuid method and username method
        require('../../../../config/functions.php');
        // settings
        require('../../../../config/index-settings.php');
        // database parameters
        require '../../../../config/db-parameters.php';
        $service_id = filter_input(INPUT_GET, "service_id", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // services class
        require('../../../../controllers/ServicesClass.php');

        // initialize the service class with an object
        $serviceObj = new ServicesClass;

        // get the new service method and we pass the various parameters to create a new clients
        $serviceData = $serviceObj->get_service($service_id);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($serviceData);

        echo json_encode($outcome);
    }