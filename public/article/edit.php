<?php
include '../../inc/functii.php';
include '../../inc/validate.php';
include '../../inc/db.php';

if(!isset($_GET['id'])){
    page_not_found();
}

$con = db_connect(array(
    'host' => '127.0.0.1',
    'port' => 3306,
    'database' => 'curs',
    'user' => 'root',
    'pass' => 'x',
));

function do_post($con)
{
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
        echo template('article/edit', array(
            'title' => $title,
            'content' => $content,
        ));
        return;
    }
    
    $command = 'UPDATE articles SET title = :title, content = :content WHERE id = :id';

    db_update($con, $command, array(
        ':title' => $title,
        ':content' => $content,
        ':id' => $_GET['id'],
    ));
    
    header('Location: /article/view.php?id=' . $_GET['id']);
}

function do_get($con)
{
    $query = "SELECT * FROM articles WHERE id = :id";
    
    $results = db_select($con, $query, array(
        ':id' => $_GET['id']
    ));
    
    if(!isset($results[0])){
        page_not_found();
    }
    
    echo template('article/edit', array(
        'title' => $results[0]['title'],
        'content' => $results[0]['content'],
    ));
    
}

if(!empty($_POST)){
   do_post($con);
} else{
    do_get($con);
}
