<?php

function template($file, $args)
{
    ob_start();
    extract($args);
    include '../templates/' . $file . '.php';
    return ob_get_clean();
}

