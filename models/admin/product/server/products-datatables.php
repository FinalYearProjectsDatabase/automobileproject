<?php
require('../../../../config/db-parameters.php');

// set variables in new var
$sql_details = array(
    'host' => HOSTNAME,
    'user' => USERNAME,
    'pass' => PASSWORD,
    'db' => DATABASE
);

// table
$table = 'products_table';
// primary key
$primary_key = 'id';
// columns
$columns = [
    [
        'db' => 'product_name',
        'dt' => 0,
        'field' => 'product_name'
    ],
    [
        'db' => 'vendor_name',
        'dt' => 1,
        'field' => 'vendor_name'
    ],
    [
        'db' => 'product_type',
        'dt' => 2,
        'field' => 'product_type'
    ],
    [
        'db' => 'created_at',
        'dt' => 3,
        'field' => 'created_at'
    ],
    [
        'db' => 'product_status',
        'dt' => 4,
        'formatter' => function($d){
            if($d == 1){
                $status = '<span class="badge bg-success px-2 text-uppercase">available</span>';
            }else{
                $status = '<span class="badge bg-primary px-2 text-uppercase">unavailable</span>';
            }
            return $status;
        },
        'field' => 'product_status'
    ],
    [
        'db' => 'product_id',
        'dt' => 5,
        'formatter' => function($d){
            return '
                <div class="btn-box">
                    <a href="../../../../dashboard/product/view.php?product_id='.$d.'" id="btn-view"><i class="fa-light fa-pen"></i></a>
                    <a href="../../../../dashboard/product/delete.php?product_id='.$d.'"><i class="fa-light fa-trash"></i></a>
                </div>
            ';
        },
        'field' => 'product_id'
    ]
];
// class to handle fetching of records
require('../../../ssp.class.php');

$joinQuery = 'FROM `vendors_products`';

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery)
);

