<?php
include '../inc/functii.php';
include '../inc/db.php';

$con = db_connect(array(
    'host' => '127.0.0.1',
    'port' => 3306,
    'database' => 'curs',
    'user' => 'root',
    'pass' => 'x',
));


$query = "SELECT * FROM articles";
$results = db_select($con, $query);

echo template('article/list', array(
    'articles' => $results,
));

