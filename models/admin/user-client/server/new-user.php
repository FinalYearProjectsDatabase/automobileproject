<?php

    session_start();

    if(isset($_POST['user_client_name'])
        && isset($_POST['user_client_dob'])
        && isset($_POST['user_client_address'])
        && isset($_POST['user_client_email'])
        && isset($_POST['user_client_contact'])
    ){
        // this file helps us to get the uuid method and username method
        require('../../../../config/functions.php');
        // settings
        require('../../../../config/index-settings.php');
        // database parameters
        require '../../../../config/db-parameters.php';
        $user_id = uuid();
        $name = filter_input(INPUT_POST, "user_client_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $dob = filter_input(INPUT_POST, "user_client_dob", FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, "user_client_address", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "user_client_email", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_name = username($email);
        $contact = filter_input(INPUT_POST, "user_client_contact", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // clients class
        require('../../../../controllers/ClientsClass.php');

        // initialize the client class with an object
        $clientObj = new ClientsClass;

        // get the new client method and we pass the various parameters to create a new clients
        $newClient = $clientObj->new_user_client($user_id, $name, $user_name, $dob, $address, $email, $contact);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($newClient);

        echo json_encode($outcome);
    }