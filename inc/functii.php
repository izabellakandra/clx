<?php

function template($file, $args)
{
    ob_start();
    extract($args);
    include __DIR__ . '/../templates/' . $file . '.php';
    return ob_get_clean();
}

function html_h($text, $size = 1)
{
    return template('html/heading', array(
        'content' => $text,
        'size' => $size,
    ));
}

function html_a($text, $href = '#')
{
    return template('html/anchor', array(
        'content' => $text,
        'href' => $href,
    ));
}

function page_not_found($text = null)
{
    header('HTTP/1.1 404 Not found');
    if($text === null){
        $text = template('error404');
    }
    echo $text;
    exit;
}

