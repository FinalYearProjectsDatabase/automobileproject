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
$table = 'posts_table';
// primary key
$primary_key = 'id';
// columns
$columns = [
    [
        'db' => 'post_title',
        'dt' => 0,
        'field' => 'post_title'
    ],
    [
        'db' => 'created_at',
        'dt' => 1,
        'field' => 'created_at'
    ],
    [
        'db' => 'post_id',
        'dt' => 2,
        'formatter' => function($d){
            return '
                <div class="btn-box">
                    <a href="../../../../dashboard/post/view.php?post_id='.$d.'" id="btn-view"><i class="fa-light fa-pen"></i></a>
                    <a href="../../../../dashboard/post/delete.php?post_id='.$d.'"><i class="fa-light fa-trash"></i></a>
                </div>
            ';
        },
        'field' => 'post_id'
    ]
];
// class to handle fetching of records
require('../../../ssp.class.php');

$joinQuery = 'FROM `posts_table`';

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery)
);

