<?php

function get_all_order()
{
    $result = db_fetch_array("SELECT `to`.`order_id`, `to`.`fullname`, SUM(`tp`.`price` * `od`.`qty`) as `total_price`, `to`.`status`, `to`.`order_time`, `to`.`users_id`
                              FROM `order_detail` as `od`
                              LEFT JOIN `tbl_order` as `to` ON `od`.`order_id` = `to`.`order_id`
                              LEFT JOIN `tbl_product` as `tp` ON `od`.`product_id` = `tp`.`product_id`
                              GROUP BY `od`.`order_id`
                              ORDER BY `to`.`order_time` DESC");

    if (!empty($result)) {
        return $result;
    } else {
        return false;
    }
}

function get_info_order($order_id){
    $result = db_fetch_row("SELECT * FROM `tbl_order` WHERE `order_id` = '{$order_id}'");
    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}


function get_list_detail_order($order_id)
{
    $result = db_fetch_array("SELECT `od`.*, `tp`.`name`, `tp`.`price`, `ti`.`url`
                              FROM `order_detail` as `od`
                              LEFT JOIN `tbl_product` as `tp` ON `od`.`product_id` = `tp`.`product_id`
                              LEFT JOIN `using_images` as `ui` ON `ui`.`relation_id` = `tp`.`product_id`
                              LEFT JOIN `tbl_image` as `ti` ON `ui`.`image_id` = `ti`.`id`
                              WHERE `od`.`order_id` = '{$order_id}'");

    if (!empty($result)) {
        return $result;
    } else {
        return false;
    }
}

function get_total_order($order_id){
    $result = db_fetch_row("SELECT SUM(`tp`.`price` * `od`.`qty`) as `total_price`, SUM(`od`.`qty`) as `total_qty` 
                              FROM `order_detail` as `od`
                              LEFT JOIN `tbl_product` as `tp` ON `od`.`product_id` = `tp`.`product_id`
                              WHERE `order_id` = '{$order_id}'");
    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}

function update_status_order($order_id, $status){
    $result = db_update('tbl_order', array('status' => $status), "`order_id` = '{$order_id}'");
    if($result > 0){
        return true;
    }else{
        return false;
    }
}

// function get_all_customer(){
//     $result = db_fetch_array("SELECT `tu`.``
//                               FROM `tbl_order` as `to`
//                               LEFT JOIN `tbl_users` as `tu` ON `to`.`users_id` = `tu`.`users_id`
//                               GROUP BY `to`.`users_id`")
// }