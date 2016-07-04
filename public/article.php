<?php
include '../inc/db.php';

$con = db_connect(array(
    'host' => '127.0.0.1',
    'port' => 3306,
    'database' => 'curs',
    'user' => 'root',
    'pass' => 'x',
));

$query = "SELECT * FROM articles WHERE id = :val";

$results = db_select($con, $query, array(
    ':val' => $_GET['id']
));

if(!isset($results[0])){
    header('HTTP/1.1 404 Not found');
    echo "Articolul nu a fost gasit";
    die;
}

$article = $results[0];

echo '<h2>', $article['title'], '</h2>', $article['content'];

