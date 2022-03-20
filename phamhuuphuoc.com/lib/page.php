<?php

function get_page($id, $list_pages){
    if(array_key_exists($id, $list_pages)){
        return $list_pages[$id];
    }
    return false;
}