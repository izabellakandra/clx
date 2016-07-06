<?php
include '../../inc/functii.php';
include '../../inc/db.php';

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

$errors = array();

if(!validate_required($title)){
    $errors[] = '`Title` is required';
}
if (!validate_str_lte($title, 255)) {
    $errors[] = '`Title` is too long';
}
if(!validate_required($content)){
    $errors[] = '`Content` is required';
}

if(!empty($errors)){
    echo template('errors', array(
        'errors' => $errors,
    ));
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

