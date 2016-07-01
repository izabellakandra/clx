<?php
include_once '../inc/functii.php';
include_once '../inc/db.php';

$con = db_connect(array(
    'database' => 'curs',
    'pass' => 'x',
));

$articles = template('articles', array(
    'articles' => db_select($con, 'SELECT * FROM articles'),
));

echo template('page', array(
    'title' => 'Hello Cylex',
    'content' => template('body', array(
        'title' => 'Hello World',
        'text' => $articles,
        'img' => 'https://www.google.ro/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
    )),
));


