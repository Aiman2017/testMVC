<?php
function show($stuff)
{
    echo '<pre>';
    var_dump($stuff);
    echo '</pre>';
}

//get the keys from data
function getKeysFromData($keys, $sign = '')
{
    $query = '';
    $data = array_keys($keys);
    foreach ($data as $key) {
        $query .= $key . $sign . $key . ' && ';
    }
    return $query;
}

//get the keys from data
function setEqualForIDS($keys, $sign = '')
{
    $query = '';
    $data = array_keys($keys);
    foreach ($data as $key) {
        $query .= $key . $sign . $key . ', ';
    }
    return $query;
}

//escape
function esc($str): string
{
    return htmlspecialchars($str);
}

//redirect

function redirect($path)
{
    header('Location: ' . ROOT . '/' . $path);
    die();
}