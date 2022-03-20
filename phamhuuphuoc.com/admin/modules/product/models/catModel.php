<?php

function get_all_category($sort_by = ''){
    $result = db_fetch_array("SELECT * FROM `tbl_category`");
    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}

function get_category_by_parent_id($parent_id){
    $result = db_fetch_array("SELECT * FROM `tbl_category` WHERE `parent_id` = '{$parent_id}' OR `cat_id` = '{$parent_id}'");
    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}

function get_creator($user_id){
    $result = db_fetch_row("SELECT * FROM `tbl_admin` WHERE `users_id` = '{$user_id}'");
    if(!empty($result)){
        return $result['username'];
    }else{
        return false;
    }
}

function check_category_exist($title, $slug){
    $result = db_fetch_row("SELECT * FROM `tbl_category` WHERE `title` = '{$title}' OR `slug` = '{$slug}'");
    if(!empty($result)){
        return true;
    }else{
        return false;
    }
}

function add_category($data, $table){
    $result = db_insert("{$table}", $data);
    if($result > 0){
        return $result;
    }else{
        return false;
    }
}

function delete_category($cat_id){
    $result = db_delete('tbl_category', "`cat_id` = '{$cat_id}'");
    if($result <= 0){
        return false;
    }else{
        return true;
    }
}