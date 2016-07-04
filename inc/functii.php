<?php

function template($file, $args)
{
    ob_start();
    extract($args);
    include '../templates/' . $file . '.php';
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

