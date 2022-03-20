<?php

function get_category_child(){
    $result = db_fetch_array("SELECT `cat_id`, `title` FROM `tbl_category` WHERE NOT `parent_id` = '0'");
    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}

function get_all_product()
{
    $result = db_fetch_array("SELECT `tp`.*, `ti`.`url`
                              FROM `tbl_product` AS `tp` 
                              LEFT JOIN `using_images` AS `ui` ON `ui`.`relation_id` = `tp`.`product_id`
                              LEFT JOIN `tbl_image` AS `ti` ON `ui`.`image_id` = `ti`.`id`
                              GROUP BY `tp`.`product_id`
                              ORDER BY `tp`.`product_id` DESC;");

    if (!empty($result)) {
        return $result;
    } else {
        return false;
    }
}

function get_product($cat_id)
{
    $result = db_fetch_array("SELECT `tp`.*, `ti`.`url`
                              FROM `tbl_product` AS `tp` 
                              RIGHT JOIN `using_images` AS `ui` ON `tp`.`product_id` = `ui`.`relation_id`
                              LEFT JOIN `tbl_image` AS `ti` ON `ui`.`image_id` = `ti`.`id`
                              WHERE `cat_id` = '{$cat_id}'
                              GROUP BY `tp`.`product_id`
                              ORDER BY `tp`.`product_id` DESC;");

    if (!empty($result)) {
        return $result;
    } else {
        return false;
    }
}
