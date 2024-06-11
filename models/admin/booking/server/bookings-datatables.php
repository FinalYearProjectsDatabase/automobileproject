<?php
session_start();
require('../../../../config/db-parameters.php');

// set variables in new var
$sql_details = array(
    'host' => HOSTNAME,
    'user' => USERNAME,
    'pass' => PASSWORD,
    'db' => DATABASE
);

if(isset($_SESSION["user_id"]) && isset($_SESSION["user_type"])){
    $user_id = $_SESSION["user_id"];
    $user_type = $_SESSION["user_type"];
}

// table
$table = 'bookings_table';
// primary key
$primary_key = 'id';
// columns
$columns = [
    [
        'db' => 'booking_date',
        'dt' => 0,
        'formatter' => function($d){
            return date("l F j, Y", strtotime($d));
        },
        'field' => 'booking_date'
    ],
    [
        'db' => 'booking_user_name',
        'dt' => 1,
        'field' => 'booking_user_name'
    ],
    [
        'db' => 'booking_user_contact',
        'dt' => 2,
        'field' => 'booking_user_contact'
    ],
    [
        'db' => 'booking_user_location',
        'dt' => 3,
        'field' => 'booking_user_location'
    ],
    [
        'db' => 'service_type',
        'dt' => 4,
        'field' => 'service_type'
    ],
    [
        'db' => 'vendor_name',
        'dt' => 5,
        'field' => 'vendor_name'
    ],
    [
        'db' => 'booking_status',
        'dt' => 6,
        'formatter' => function($d){
            if($d == 1){
                $status = '<span class="badge bg-warning px-2 text-uppercase">awaiting confirmation</span>';
            }elseif($d == 2){
                $status = '<span class="badge bg-primary px-2 text-uppercase">confirmed</span>';
            }elseif($d == 3){
                $status = '<span class="badge bg-info px-2 text-uppercase">dispatched</span>';
            }elseif($d == 4){
                $status = '<span class="badge bg-success px-2 text-uppercase">completed</span>';
            }
            else{
                $status = '<span class="badge bg-danger px-2 text-uppercase">cancelled</span>';
            }
            return $status;
        },
        'field' => 'booking_status'
    ],
    [
        'db' => 'booking_id',
        'dt' => 7,
        'formatter' => function($d){
            return '
                <div class="btn-box">
                    <a href="../../../../dashboard/booking/view.php?booking_id='.$d.'" id="btn-view"><i class="fa-light fa-pen"></i></a>
                </div>
            ';
        },
        'field' => 'booking_id'
    ]
];
// class to handle fetching of records
require('../../../ssp.class.php');

if($user_type == 1){
    $joinQuery = 'FROM `bookings_view`';

    echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery)
    );
}elseif($user_type == 2){
    $joinQuery = 'FROM `bookings_view`';
    $extraWhere = '`booking_user_id` = "'.$user_id.'"';

    echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery, $extraWhere)
    );
}else{
    $joinQuery = 'FROM `bookings_view`';
    $extraWhere = '`vendor_id` = "'.$user_id.'"';

    echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery, $extraWhere)
    );
}



