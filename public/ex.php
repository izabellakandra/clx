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

$command = 'DELETE FROM articles WHERE id = :id';

db_delete($con, $command, array(
    ':id' => 5,
));
