<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $type = !empty($_GET['type'])?$_GET['type']:FALSE;
    $data['list_category'] = get_category_child();
    if(empty($type)){
        $data['list_product'] = get_all_product();
    }else{
        $data['list_product'] = get_product($type);
    }
    load_view('index', $data);
}
