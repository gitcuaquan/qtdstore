<?php

function base_url($url = "") {
    global $config;
    return $config['base_url'].$url;
}

function main_url($url = ""){
    global $config;
    return $config['main_url'].$url;
}

function redirect_to($url = "")
{  
    global $config;
    $path = $config['base_url'].$url;
    header("Location: {$path}");
}

function redirect($url = "")
{  
    global $config;
    $path = $config['main_url'].$url;
    header("Location: {$path}");
}