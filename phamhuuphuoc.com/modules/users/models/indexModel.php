<?php

function check_user($username, $password){
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    return $result;
}

function add_user_db($data = array()){
    $user_name = $data['username'];
    if(db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$user_name}'") > 0){
        return false;
    }else{
        $user_id = db_insert('tbl_users', $data);
        if($user_id > 0){
            return true;
        }
    }
}