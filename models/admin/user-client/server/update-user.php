<?php

    session_start();

    if(isset($_POST['user_client_name'])
        && isset($_POST['user_client_dob'])
        && isset($_POST['user_client_address'])
        && isset($_POST['user_client_email'])
        && isset($_POST['user_client_contact'])
        && isset($_POST['user_client_id'])
        && isset($_POST['user_client_username'])
    ){
        // database parameters
        require '../../../../config/db-parameters.php';
        $user_id = filter_input(INPUT_POST, "user_client_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, "user_client_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $dob = filter_input(INPUT_POST, "user_client_dob", FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, "user_client_address", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "user_client_email", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_name = filter_input(INPUT_POST, "user_client_username", FILTER_SANITIZE_SPECIAL_CHARS);;
        $contact = filter_input(INPUT_POST, "user_client_contact", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // clients class
        require('../../../../controllers/ClientsClass.php');

        // initialize the client class with an object
        $updateObj = new ClientsClass;

        // get the new client method and we pass the various parameters to create a new clients
        $updateClient = $updateObj->update_user_client($user_id, $name, $user_name, $dob, $address, $email, $contact);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($updateClient);

        echo json_encode($outcome);
    }