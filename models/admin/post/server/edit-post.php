<?php

    session_start();

    if(isset($_GET['post_id'])){
        // this file helps us to get the uuid method and username method
        require('../../../../config/functions.php');
        // settings
        require('../../../../config/index-settings.php');
        // database parameters
        require '../../../../config/db-parameters.php';
        $post_id = filter_input(INPUT_GET, "post_id", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // posts class
        require('../../../../controllers/PostsClass.php');

        // initialize the post class with an object
        $postObj = new PostsClass;

        // get the new post method and we pass the various parameters to create a new clients
        $postData = $postObj->get_post_data($post_id);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($postData);

        echo json_encode($outcome);
    }