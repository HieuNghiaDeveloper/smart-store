<?php

function is_login_yet(){
    $base_url = base_url();
    if(empty($_SESSION['is_login'])){
        header("Location: {$base_url}login/");
        exit();
    }
}