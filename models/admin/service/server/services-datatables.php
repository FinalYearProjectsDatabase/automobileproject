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
$table = 'services_table';
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
        'db' => 'service_type',
        'dt' => 1,
        'field' => 'service_type'
    ],
    [
        'db' => 'created_at',
        'dt' => 2,
        'field' => 'created_at'
    ],
    [
        'db' => 'service_status',
        'dt' => 3,
        'formatter' => function($d){
            if($d == 1){
                $status = '<span class="badge bg-success px-2 text-uppercase">available</span>';
            }else{
                $status = '<span class="badge bg-primary px-2 text-uppercase">unavailable</span>';
            }
            return $status;
        },
        'field' => 'service_status'
    ],
    [
        'db' => 'service_id',
        'dt' => 4,
        'formatter' => function($d){
            return '
                <div class="btn-box">
                    <a href="../../../../dashboard/service/view.php?service_id='.$d.'" id="btn-view"><i class="fa-light fa-pen"></i></a>
                    <a href="../../../../dashboard/service/delete.php?service_id='.$d.'"><i class="fa-light fa-trash"></i></a>
                </div>
            ';
        },
        'field' => 'service_id'
    ]
];
// class to handle fetching of records
require('../../../ssp.class.php');

$joinQuery = 'FROM `vendors_services`';

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery)
);

