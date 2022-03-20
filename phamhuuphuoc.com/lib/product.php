<?php

function get_category_product($id, $list_product_cat){
    if(array_key_exists($id, $list_product_cat)){
        return $list_product_cat[$id];
    }
    return false;
}

function get_list_product($cat_id, $list_product){
    $result = array();
    foreach($list_product as $product){
        if($cat_id == $product['cat_id']){
            $result[] = $product;
        }
    }
    return $result;
}

function get_product($id, $list_product){
    if(array_key_exists($id, $list_product)){
        return $list_product[$id];
    }
    return false;
}