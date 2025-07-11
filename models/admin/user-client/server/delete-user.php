<?php

    session_start();

    if(isset($_POST['user_client_id'])){
        // database parameters
        require '../../../../config/db-parameters.php';
        $user_id = filter_input(INPUT_POST, "user_client_id", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // clients class
        require('../../../../controllers/ClientsClass.php');

        // initialize the client class with an object
        $deleteObj = new ClientsClass;

        // get the new client method and we pass the various parameters to create a new clients
        $deleteClient = $deleteObj->delete_user_client($user_id);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($deleteClient);

        echo json_encode($outcome);
    }