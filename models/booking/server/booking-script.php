<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    
    if(isset($_POST['user_booking_name'])
       && isset($_POST["vendor_id"])
       && isset($_POST["service_id"])
       && isset($_POST["user_booking_contact"])
       && isset($_POST["user_booking_email"])
       && isset($_POST["user_booking_location"])
       && isset($_POST["user_booking_vehicle"])
       && isset($_POST["user_booking_description"])
       && isset($_FILES["user_booking_files"])
       && isset($_POST["user_booking_date"])
       ){
           // this file helps us to get the uuid method and username method
           require('../../../config/functions.php');
           // settings
           require('../../../config/index-settings.php');
           // database parameters
           require '../../../config/db-parameters.php';
           
           $booking_id = uuid();
           $user_booking_name = filter_input(INPUT_POST, "user_booking_name", FILTER_SANITIZE_SPECIAL_CHARS);
           $vendor_id = filter_input(INPUT_POST, "vendor_id", FILTER_SANITIZE_SPECIAL_CHARS);
           $service_id = filter_input(INPUT_POST, "service_id", FILTER_SANITIZE_SPECIAL_CHARS);
           $user_booking_contact = filter_input(INPUT_POST, "user_booking_contact", FILTER_SANITIZE_SPECIAL_CHARS);
           $user_booking_email = filter_input(INPUT_POST, "user_booking_email", FILTER_SANITIZE_SPECIAL_CHARS);
           $user_booking_location = filter_input(INPUT_POST, "user_booking_location", FILTER_SANITIZE_SPECIAL_CHARS);
           $user_booking_vehicle = filter_input(INPUT_POST, "user_booking_vehicle", FILTER_SANITIZE_SPECIAL_CHARS);
           $user_booking_description = filter_input(INPUT_POST, "user_booking_description", FILTER_SANITIZE_SPECIAL_CHARS);
           $user_booking_date = filter_input(INPUT_POST, "user_booking_date", FILTER_SANITIZE_SPECIAL_CHARS);
           
           // service request proof handling
           $fileName = $_FILES["user_booking_files"]["name"];
           $fileTemp = $_FILES["user_booking_files"]["tmp_name"];
           $fileDestination = "../../../booking-images/";
           $fileSize = $_FILES["user_booking_files"]["size"];
           $valid_Extension = ["jpeg", "jpg", "png", "pdf"];

           $oldExtension = explode(".", $fileName);
           $newExtension = strtolower(end($oldExtension));

           if(in_array($newExtension, $valid_Extension)){
               if($fileSize <= 1000000){
                   $booking_img = $booking_id.time().".".$newExtension;
                   // move uploaded booking profile
                   move_uploaded_file($fileTemp, $fileDestination.$booking_img);
               }else{
                   $response = [
                       'status' => 201,
                       'msg' => 'File Size exceeds 1MB'
                   ];
               }
           }else{
               $response = [
                   'status' => 201,
                   'msg' => 'Invalid format. Preferred format: jpeg, jpg, png, pdf'
               ];
           }
           
           // database class
           require('../../../controllers/DataBaseClass.php');
           
           // bookings class
           require('../../../controllers/BookingClass.php');
           
           $bookingObj = new BookingClass;
           
           $newBooking = $bookingObj->new_booking($booking_id, $user_booking_name, $user_booking_contact, $user_booking_email, $user_booking_location, $user_booking_vehicle, $user_booking_description, $booking_img, $vendor_id, $service_id, $user_booking_date);
           
           $outcome = json_decode($newBooking);
           
           $response = $outcome;
           
           echo json_encode($response);
       }
    
}else{
    $response = [
        'status' => 201,
        'msg' => 'Invalid request.'
    ];
    echo json_encode($response);
}