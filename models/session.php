<?php

    // session start
    session_start();

    // initialize session variables
    $user_id = "";
    $username = "";
    $name = "";
    $email = "";
    $user_type = "";
    $user_type_name = "";

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || !isset($_SESSION['email']) || !isset($_SESSION['user_type']) || !isset($_SESSION['name']) || !isset($_SESSION['user_type_name'])){
        header('Location:../');
        exit();
    }else{
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $user_type = $_SESSION['user_type'];
        $user_type_name = $_SESSION['user_type_name'];
    }