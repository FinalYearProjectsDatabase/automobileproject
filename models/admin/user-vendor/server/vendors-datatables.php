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
$table = 'vendors_table';
// primary key
$primary_key = 'id';
// columns
$columns = [
    [
        'db' => 'vendor_name',
        'dt' => 0,
        'field' => 'vendor_name'
    ],
    [
        'db' => 'vendor_email',
        'dt' => 1,
        'field' => 'vendor_email'
    ],
    [
        'db' => 'vendor_contact',
        'dt' => 2,
        'field' => 'vendor_contact'
    ],
    [
        'db' => 'vendor_business_name',
        'dt' => 3,
        'field' => 'vendor_business_name'
    ],
    [
        'db' => 'created_at',
        'dt' => 4,
        'field' => 'created_at'
    ],
    [
        'db' => 'vendor_id',
        'dt' => 5,
        'formatter' => function($d){
            return '
                <div class="btn-box">
                    <a href="../../../../dashboard/user-vendor/view.php?user_id='.$d.'" id="btn-view"><i class="fa-light fa-pen"></i></a>
                    <a href="../../../../dashboard/user-vendor/delete.php?user_id='.$d.'"><i class="fa-light fa-trash"></i></a>
                </div>
            ';
        },
        'field' => 'vendor_id'
    ]
];
// class to handle fetching of records
require('../../../ssp.class.php');

$joinQuery = 'FROM vendors_table';

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery)
);

