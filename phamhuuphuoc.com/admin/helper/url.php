<?php

function base_url($url = ""){
    global $config;
    return $config['base_url'] . $url;
    
}

function redirect_url($url_to){
    $base_url = base_url();
    header("Location: {$base_url}$url_to");
    exit();
}