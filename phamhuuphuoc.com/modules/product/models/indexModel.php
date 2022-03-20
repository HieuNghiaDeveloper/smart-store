<?php
function get_product_by_cat_id($cat_id)
{
    $result = db_fetch_array("SELECT `cat_id` FROM `tbl_category` WHERE `parent_id` = '{$cat_id}'");
    foreach($result as $v_re){
        $id = $v_re['cat_id'];
        $result1[] = db_fetch_row("SELECT `tp`.*, `ti`.`url`
                                  FROM `tbl_product` as `tp`
                                  LEFT JOIN `tbl_category` as `tc` ON `tp`.`cat_id` = `tc`.`cat_id`
                                  LEFT JOIN `using_images` as `ui` ON `ui`.`relation_id` = `tp`.`product_id`
                                  LEFT JOIN `tbl_image` as `ti` ON `ui`.`image_id` = `ti`.`id`
                                  WHERE `tc`.`cat_id` = '{$id}'");
    }
    if(!empty($result1)){
        return $result1;
    }else{
        return false;
    }
}

function get_product_by_id($id){
    $result = db_fetch_row("SELECT `tp`.*, `ti`.`url`
                            FROM `tbl_product` AS `tp` 
                            RIGHT JOIN `using_images` AS `ui` ON `tp`.`product_id` = `ui`.`relation_id`
                            LEFT JOIN `tbl_image` AS `ti` ON `ui`.`image_id` = `ti`.`id`
                            WHERE `product_id` = '{$id}'
                            GROUP BY `tp`.`product_id`");
    if(!empty($result)){
        return $result;
    }else{
        return false;
    }
}