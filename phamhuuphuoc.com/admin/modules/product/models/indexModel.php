<?php
function get_last_code(){
    $result = db_fetch_row("SELECT `code` FROM `tbl_product` ORDER BY `product_id` DESC LIMIT 1;");
    if(!empty($result)){
        return $result['code'];
    }else{
        return 0;
    }
}
function get_all_category(){
    $result = db_fetch_array("SELECT * FROM `tbl_category`");
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

function check_product_exist($name){
    $result = db_fetch_row("SELECT * FROM `tbl_product` WHERE `name` = '{$name}'");
    if(empty($result)){
        return false;
    }else{
        return true;
    }
}

function add_product($data){
    $result = db_insert('tbl_product', $data);
    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}

function add_image_product($name, $url, $relation_id){
    $result = db_insert('tbl_image', array('`name`' => $name, '`url`' => $url));
    if(!empty($result)){
        $result1 = db_insert('using_images', array('`image_id`' => $result, '`relation_id`' => $relation_id));
        if(!empty($result1)){
            return $result;
        }else{
            db_delete('tbl_image', "`id` = '{$result}'");
            return false;
        }
    }
    
}

function get_all_product(){
    // Kết nối 4 bảng bao gồm : tbl_product , tbl_category , using_images , tbl_image 
    // Để lấy : * của tbl_product , title của tbl_category , url của tbl_image
    // Kết nối của các bảng
        # product giữ khóa ngoại của category
        # using_images giữ khóa ngoại của product
        # using_images giữ khóa ngoại của image
    $result = db_fetch_array("SELECT `tp`.*, `tc`.`title` as `category_title`, `ti`.`url`
                              FROM `tbl_product` AS `tp` 
                              LEFT JOIN `tbl_category` AS `tc` ON `tp`.`cat_id` = `tc`.`cat_id`
                              RIGHT JOIN `using_images` AS `ui` ON `tp`.`product_id` = `ui`.`relation_id`
                              LEFT JOIN `tbl_image` AS `ti` ON `ui`.`image_id` = `ti`.`id`
                              GROUP BY `tp`.`product_id`
                              ORDER BY `tp`.`product_id` DESC;");

    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}

function delete_product($id){
    $result = db_fetch_array("SELECT `image_id` FROM `using_images` WHERE `relation_id` = '{$id}'");
    db_delete('using_images', "`relation_id` = '{$id}'");
    foreach($result as $v_result){
        $image_id = $v_result['image_id'];
        db_delete('tbl_image', "`id` = '{$image_id}'");
    }
    db_delete('tbl_product', "`product_id` = '{$id}'");
}

function get_product_by_id($product_id){
    $result = db_fetch_row("SELECT `tp`.*, `tc`.`cat_id`, `ti`.`url`
                            FROM `tbl_product` as `tp`
                            LEFT JOIN `tbl_category` as `tc` ON `tp`.`cat_id` = `tc`.`cat_id`
                            LEFT JOIN `using_images` as `ui` ON `ui`.`relation_id` = `tp`.`product_id`
                            LEFT JOIN `tbl_image` as `ti` ON `ui`.`image_id` = `ti`.`id`
                            WHERE `tp`.`product_id` = {$product_id}");

    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}

function update_info_product($product_id, $data){
    $result = db_update('tbl_product', $data, "`product_id` = '{$product_id}'");
    if($result > 0){
        return true;
    }else{
        return false;
    }
}