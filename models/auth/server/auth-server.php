<?php

    session_start();

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_EMAIL);
        $response = [];

        if(empty($email) || !($password)){
            $response = [
                'status' => 201,
                'msg' => 'All fields are required'
            ];
        }else{
            // database parameters
            require '../../../config/db-parameters.php';
            // database class
            require('../../../controllers/DataBaseClass.php');

            // $dbObj = new DataBaseClass;

            // echo json_encode($dbObj->open_connection());

            // authentication class
            require('../../../controllers/AuthenticationClass.php');

            $authObj = new AuthenticationClass;

            $userLogin = $authObj->user_login($email, $password);

            $outcome = json_decode($userLogin);

            if($outcome->status == 200){

                $getUserInSession = $authObj->user_in_session($email);

                $user_in_session = json_decode($getUserInSession);

                $_SESSION['user_id'] = $user_in_session->data->user_id;
                $_SESSION['username'] = $user_in_session->data->username;
                $_SESSION['name'] = $user_in_session->data->name;
                $_SESSION['email'] = $user_in_session->data->email;
                $_SESSION['user_type'] = $user_in_session->data->user_type;
                $_SESSION['user_type_name'] = $user_in_session->data->user_type_name;
            }

            $response = $outcome;
        }
        echo json_encode($response);
    }