<?php

    session_start();

    if(isset($_POST['post_id'])){
        // database parameters
        require '../../../../config/db-parameters.php';
        $post_id = filter_input(INPUT_POST, "post_id", FILTER_SANITIZE_SPECIAL_CHARS);
        // database class
        require('../../../../controllers/DataBaseClass.php');
        // Posts class
        require('../../../../controllers/PostsClass.php');   
        // initialize the post class with an object
        $postObj = new PostsClass; 

        // delete post method and we pass the various parameters to delete post
        $deletePost = $postObj->delete_post($post_id);

        // get the outcome of the method which is to return a json response and convert it in array
        $outcome = json_decode($deletePost);

        echo json_encode($outcome);
    }