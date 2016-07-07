<?php

function start_session()
{
    if(!isset($_COOKIE['sesiune'])){
        do {
            $id = rand(1000);
        } while(file_exists('sessions/' . $id. '.json'));
        
        setcookie('sesiune', $id);
        $_COOKIE['sesiune'] = $id;
        file_put_contents('sessions/' . $id . '.json', '{}');
    }
}

function read_session($key)
{
    $file = 'sessions/' . $_COOKIE['sesiune'] . '.json';
    $content = file_get_contents($file);
    $json = json_decode($content, true);
    return isset($json[$key]) ? $json[$key] : '';
}

function write_session($key, $value)
{
    $file = 'sessions/' . $_COOKIE['sesiune'] . '.json';
    $content = file_get_contents($file);
    $json = json_decode($content, true);
    $json[$key] = $value;
    file_put_contents($file, json_encode($json));
}

function destroy_session()
{
    $file = 'sessions/' . $_COOKIE['sesiune'] . '.json';
    file_put_contents($file, '{}');
}
