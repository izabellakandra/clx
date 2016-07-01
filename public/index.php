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

/*
$insert = 'INSERT INTO articles(title, content) VALUES(:title, :content)';
db_insert($con, $insert, array(
    ':title' => 'Third article',
    ':content' => 'This is my 3rd article',
));*/


$query = "SELECT * FROM articles";
$results = db_select($con, $query);

echo template('articles', array(
    'articles' => $results,
));

