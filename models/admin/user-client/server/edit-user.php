<?php

    session_start();

    if(isset($_GET['user_id'])){
        // this file helps us to get the uuid method and username method
        require('../../../../config/functions.php');
        // settings
        require('../../../../config/index-settings.php');
        // database parameters
        require '../../../../config/db-parameters.php';
        $user_id = filter_input(INPUT_GET, "user_id", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // clients class
        require('../../../../controllers/ClientsClass.php');

        // initialize the client class with an object
        $clientObj = new ClientsClass;

        // get the new client method and we pass the various parameters to create a new clients
        $clientData = $clientObj->get_user_client($user_id);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($clientData);

        echo json_encode($outcome);
    }