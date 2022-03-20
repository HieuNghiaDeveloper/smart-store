<?php

function construct(){
    load_model('index');
}

function indexAction(){
    $cat_id = !empty($_GET['cat_id'])?(int)$_GET['cat_id']:FALSE;
    $data['list_product'] = get_product_by_cat_id($cat_id);
    load_view('index', $data);
}

function detailAction(){
    $id = !empty($_GET['id'])?(int)$_GET['id']:FALSE;
    $data['product'] = get_product_by_id($id);
    load_view('detail', $data);
}