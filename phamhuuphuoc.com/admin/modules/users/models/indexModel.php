<?php

function check_user($username, $password){
    $username = escape_string($username);
    $password = escape_string($password);
    $result = db_fetch_row("SELECT `users_id`, `display_name` FROM `tbl_admin` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    return $result;
}

function update_info($data = array(), $user_id){
    $result = db_update('tbl_admin', $data, "`users_id` = '{$user_id}'");
    if($result >= 0){
        return true;
    }else{
        return false;
    }
}

function information_user($user_id){
    $result = db_fetch_row("SELECT * FROM `tbl_admin` WHERE `users_id` = '{$user_id}'");
    return $result;
}

function check_password($password, $display_name){
    $result = db_num_rows("SELECT * FROM `tbl_admin` WHERE `display_name` = '{$display_name}' AND `password` = '{$password}'");
    if($result > 0){
        return true;
    }else{
        return false;
    }
}

function update_password($new_password, $display_name){
    $result = db_update('tbl_admin', array('password' => $new_password), "`display_name` = '{$display_name}'");
    if($result >= 0){
        return true;
    }else{
        return false;
    }
}

function check_created_at($user_id){
    $result = db_fetch_row("SELECT `created_at` FROM `tbl_admin` WHERE `users_id` = '{$user_id}'");
    return $result;
}