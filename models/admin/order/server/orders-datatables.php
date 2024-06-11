<?php
require('../../../../config/db-parameters.php');

// set variables in new var
$sql_details = array(
    'host' => HOSTNAME,
    'user' => USERNAME,
    'pass' => PASSWORD,
    'db' => DATABASE
);

if(isset($_GET["user_id"]) && isset($_GET["user_type"])){
    $user_id = $_GET["user_id"];
    $user_type = $_GET["user_type"];
}

// table
$table = 'orders_table';
// primary key
$primary_key = 'id';
// columns
$columns = [
    [
        'db' => 'created_at',
        'dt' => 0,
        'formatter' => function($d){
            return date("l F j, Y", strtotime($d));
        },
        'field' => 'created_at'
    ],
    [
        'db' => 'order_id',
        'dt' => 1,
        'field' => 'order_id'
    ],
    [
        'db' => 'name',
        'dt' => 2,
        'field' => 'name'
    ],
    [
        'db' => 'contact',
        'dt' => 3,
        'field' => 'contact'
    ],
    [
        'db' => 'address',
        'dt' => 4,
        'field' => 'address'
    ],
    [
        'db' => 'product_name',
        'dt' => 5,
        'field' => 'product_name'
    ],
    [
        'db' => 'quantity',
        'dt' => 6,
        'field' => 'quantity'
    ],
    [
        'db' => 'total',
        'dt' => 7,
        'field' => 'total'
    ],
    [
        'db' => 'order_status',
        'dt' => 8,
        'formatter' => function($d){
            if($d == 1){
                $status = '<span class="badge bg-warning px-2 text-uppercase">awaiting confirmation</span>';
            }elseif($d == 2){
                $status = '<span class="badge bg-primary px-2 text-uppercase">confirmed</span>';
            }elseif($d == 3){
                $status = '<span class="badge bg-info px-2 text-uppercase">dispatched</span>';
            }elseif($d == 4){
                $status = '<span class="badge bg-success px-2 text-uppercase">delivered</span>';
            }
            else{
                $status = '<span class="badge bg-danger px-2 text-uppercase">cancelled</span>';
            }
            return $status;
        },
        'field' => 'order_status'
    ],
    [
        'db' => 'order_id',
        'dt' => 9,
        'formatter' => function($d){
            return '
                <div class="btn-box">
                    <a href="../../../../dashboard/order_id/view.php?order_id='.$d.'" id="btn-view"><i class="fa-light fa-pen"></i></a>
                </div>
            ';
        },
        'field' => 'order_id'
    ]
];
// class to handle fetching of records
require('../../../ssp.class.php');

if($user_type == 1){
    $joinQuery = 'FROM `products_orders_view`';
    
    echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery)
    );
}else{
    $joinQuery = 'FROM `products_orders_view`';
    $extraWhere = 'user_id = '.$user_id.'';
    
    echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery, $extraWhere)
    );
}





