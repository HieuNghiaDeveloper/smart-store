<?php

function construct(){
    load_model('index');
}

function orderAction(){
    $data['list_order'] = get_all_order();
    load_view('index', $data);
}

function detail_orderAction(){
    $order_id = !empty($_GET['id'])?(int)$_GET['id']:FALSE;
    if(isset($_POST['btn_status'])){
        $status = $_POST['status'];
        update_status_order($order_id, $status);
    }
    $data['info_order'] = get_info_order($order_id);
    $data['list_order'] = get_list_detail_order($order_id);
    $data['total_order'] = get_total_order($order_id);
    load_view('detail', $data);
}

// function customerAction(){
//     $list_customer = get_all_customer();
//     load_view('index_customer');
// }