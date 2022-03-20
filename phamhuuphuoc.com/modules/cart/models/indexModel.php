<?php

function get_product_cart($user_id)
{
    $new_result = array();
    $result = db_fetch_array("SELECT `tc`.`product_id`, `tc`.`qty`, `tp`.`name`, `tp`.`code`, `tp`.`price`, `ti`.`url`, `tc`.`qty` * `tp`.`price` as `sub_total`
                              FROM `tbl_cart` as `tc`
                              LEFT JOIN `tbl_product` as `tp` ON `tc`.`product_id` = `tp`.`product_id`
                              LEFT JOIN `using_images` as `ui` ON `tc`.`product_id` = `ui`.`relation_id`
                              LEFT JOIN `tbl_image` AS `ti` ON `ui`.`image_id` = `ti`.`id`
                              GROUP BY `tp`.`product_id`");
    if (!empty($result)) {
        foreach($result as $k_re => $v_re){
            $new_result[$v_re['product_id']] = $v_re;
        }
        return $new_result;
    } else {
        return false;
    }
}

function check_user_id_exist_cart($user_id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_cart` WHERE `users_id` = '{$user_id}'");
    if (!empty($result)) {
        // Có tồn tại
        return true;
    } else {
        // Không tồn tại
        return false;
    }
}

function insert_product_cart($user_id, $product_id, $qty = 1)
{
    $data = array(
        'users_id' => $user_id,
        'product_id' => $product_id,
        'qty' => $qty
    );
    $result = db_insert('tbl_cart', $data);
    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function check_product_id_exist_cart($user_id, $product_id)
{
    $result = db_num_rows("SELECT * FROM `tbl_cart` WHERE `users_id` = '{$user_id}' AND `product_id` = '{$product_id}'");
    if (!empty($result)) {
        return true;
    } else {
        return false;
    }
}

function update_qty_product_cart($user_id, $product_id)
{
    $result = db_query("UPDATE `tbl_cart` SET `qty`= `qty` + 1 WHERE `users_id` = '{$user_id}' AND `product_id` = '{$product_id}'");
    return $result;
}

function delete_product_cart($user_id, $product_id)
{
    $result = db_delete('tbl_cart', "`users_id` = '{$user_id}' AND `product_id` = '{$product_id}'");
    if (!empty($result)) {
        return true;
    } else {
        return false;
    }
}

function delete_all_product_cart($user_id)
{
    $result = db_delete('tbl_cart', "`users_id` = '{$user_id}'");
    if (!empty($result)) {
        return true;
    } else {
        return false;
    }
}

function insert_product_order($user_id, $info_order = array())
{
    $return_order_email = array();


    //1. Thêm thông tin của 1 lần đặt hàng
    $id_insert = db_insert('tbl_order', $info_order);

    //2. Cập nhật order_code sau khi đã có ID
    $order_code = "WEBPHP-" . $id_insert;
    db_update('tbl_order', array('order_code' => $order_code), "`order_id` = '{$id_insert}'");


    //3. Chi tiết 1 hoặc các sản phẩm trong lần đặt hàng đó
    $list_cart = db_fetch_array("SELECT `product_id`, `qty` FROM `tbl_cart` WHERE `users_id` = '{$user_id}'");
    foreach ($list_cart as $cart) {
        $data_order_detail = array(
            'order_id' => $id_insert,
            'product_id' => $cart['product_id'],
            'qty' => $cart['qty'],
        );
        db_insert('order_detail', $data_order_detail);
    }
    if($id_insert > 0){
        return $id_insert;
    }else{
        return false;
    }
}

function get_order_by_id($order_id){
    $result = db_fetch_array("SELECT `to`.`order_code`, `to`.`fullname`, `to`.`phone`, `to`.`address`, `to`.`note`, `to`.`payment`, `od`.`qty`, `tp`.`name`, `tp`.`price`
                              FROM `order_detail` as `od`
                              LEFT JOIN `tbl_order` as `to` ON `od`.`order_id` = `to`.`order_id`
                              LEFT JOIN `tbl_product` as `tp` ON `od`.`product_id` = `tp`.`product_id`
                              WHERE `od`.`order_id` = '{$order_id}'");

    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}

function get_product_cart_ajax($user_id, $product_id){
    $result = db_fetch_row("SELECT `tc`.*, `tp`.`price`
                            FROM `tbl_cart` as `tc`
                            LEFT JOIN `tbl_product` as `tp` ON `tc`.`product_id` = `tp`.`product_id`
                            WHERE `tc`.`users_id` = '{$user_id}' AND `tc`.`product_id` = '{$product_id}'");
    return $result;
}
// -------------------------------------------===========================

function check_product_id_exist_cart_db($user_id, $product_id)
{
    $result = db_num_rows("SELECT * FROM `tbl_cart` WHERE `users_id` = '{$user_id}' AND `product_id` = '{$product_id}'");
    return $result;
}

function insert_product_cart_db($user_id, $product_id)
{
    $data = array(
        'users_id' => $user_id,
        'product_id' => $product_id,
        'qty' => (int)1 //Chỗ này có thể cập nhật thêm nếu sử dụng ajax
        // thêm số lượng ở input
    );
    db_insert('tbl_cart', $data);
}

function update_qty_product_cart_db($user_id, $product_id)
{
    // /`qty`= `qty` + 1 có thể cập nhật lại để sử dụng ajax và input số lượng
    db_query("UPDATE `tbl_cart` SET `qty`= `qty` + 1 WHERE `users_id` = '{$user_id}' AND `product_id` = '{$product_id}'");
}

function update_ajax_qty_product_cart_db($user_id, $product_id, $qty)
{
    db_query("UPDATE `tbl_cart` SET `qty`= '{$qty}' WHERE `users_id` = '{$user_id}' AND `product_id` = '{$product_id}'");
}

function delete_product_cart_db($user_id, $product_id)
{
    db_delete('tbl_cart', "`users_id` = '{$user_id}' AND `product_id` = '{$product_id}'");
}

function delete_all_product_cart_db($user_id)
{
    db_delete('tbl_cart', "`users_id` = '{$user_id}'");
}

function get_user_db($user_id)
{
    $user = db_fetch_row("SELECT `fullname`, `email`, `address`, `phone` FROM `tbl_users` WHERE `users_id` = '{$user_id}'");
    return $user;
}

function insert_product_order_db($user_id, $info_order = array())
{
    $list_cart = db_fetch_array("SELECT `product_id`, `qty` FROM `tbl_cart` WHERE `users_id` = '{$user_id}'");
    foreach ($list_cart as $cart) {
        $data = array(
            'users_id' => $user_id,
            'fullname' => $info_order['fullname'],
            'email' => $info_order['email'],
            'phone' => $info_order['phone'],
            'address' => $info_order['address'],
            'phone' => $info_order['phone'],
            'note' => $info_order['note'],
            'payment' => $info_order['payment'],
            'product_id' => $cart['product_id'],
            'qty' => $cart['qty'],
        );
        $id_insert = db_insert('tbl_order', $data);
    }
    return $id_insert;
}

function get_order_success($user_id)
{
    $list_product_id = db_fetch_array("SELECT `product_id`, `qty` FROM `tbl_order` WHERE `users_id` = '{$user_id}'");
    return $list_product_id;
}
