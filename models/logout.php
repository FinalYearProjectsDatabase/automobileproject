<?php

    // session start
    session_start();

    // unset all session variables
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['user_type']);

    // destroy the active session
    session_destroy();

    // redirect to login page
    header('Location:../');

    // close any request or action
    // exit();