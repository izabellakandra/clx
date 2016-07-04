<?php
include '../inc/functii.php';
include '../inc/db.php';

if(empty($_POST)){
    echo template('article/create', array(
        'title' => '',
        'content' => '',
    ));
    return;
}


$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';
$title = htmlspecialchars($title);
$content = str_replace('</textarea>', '&lt;/textarea&gt;', $content);

if(empty($title)){
    echo '`Title` is required';
    echo template('article/create', array(
        'title' => $title,
        'content' => $content,
    ));
    return;
}
if(empty($content)){
    echo '`Content` is required';
    echo template('article/create', array(
        'title' => $title,
        'content' => $content,
    ));
    return;
}
if(strlen($title) > 255){
    echo '`Title` is too long';
    echo template('article/create', array(
        'title' => $title,
        'content' => $content,
    ));
    return;
}



$con = db_connect(array(
    'host' => '127.0.0.1',
    'port' => 3306,
    'database' => 'curs',
    'user' => 'root',
    'pass' => 'x',
));

$insert = 'INSERT INTO articles(title, content) VALUES(:title, :content)';

db_insert($con, $insert, array(
    ':title' => $title,
    ':content' => $content,
));

header('Location: /index.php');

