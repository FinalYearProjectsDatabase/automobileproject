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
$table = 'clients_table';
// primary key
$primary_key = 'id';
// columns
$columns = [
    [
        'db' => 'client_name',
        'dt' => 0,
        'field' => 'client_name'
    ],
    [
        'db' => 'client_email',
        'dt' => 1,
        'field' => 'client_email'
    ],
    [
        'db' => 'client_contact',
        'dt' => 2,
        'field' => 'client_contact'
    ],
    [
        'db' => 'created_at',
        'dt' => 3,
        // 'formatter' => function($d){
        //     return date('F l j, Y', $d);
        // },
        'field' => 'created_at'
    ],
    [
        'db' => 'client_user_id',
        'dt' => 4,
        'formatter' => function($d){
            return '
                <div class="btn-box">
                    <a href="../../../../dashboard/user-client/view.php?user_id='.$d.'" id="btn-view"><i class="fa-light fa-pen"></i></a>
                    <a href="../../../../dashboard/user-client/delete.php?user_id='.$d.'"><i class="fa-light fa-trash"></i></a>
                </div>
            ';
        },
        'field' => 'client_user_id'
    ]
];
// class to handle fetching of records
require('../../../ssp.class.php');

$joinQuery = 'FROM clients_table';

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery)
);

