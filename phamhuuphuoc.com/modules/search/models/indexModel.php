<?php

function get_status_order($code){
    $result = db_fetch_row("SELECT * FROM `tbl_order` WHERE `order_code` = '{$code}'");
    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}