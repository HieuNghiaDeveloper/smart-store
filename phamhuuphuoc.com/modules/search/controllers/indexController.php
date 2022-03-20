<?php

function construct(){
    load_model('index');
    load('lib', 'validation_form');
}

function indexAction(){
    global $error, $status_order;
    if(isset($_POST['btn_search']) and !empty($_POST['search'])){
        $code = $_POST['search'];
        if($status_order = get_status_order($code)){
        }else{
            $error['search'] = "<p class='error'>Nếu bạn không nhớ chính xác mã đơn hàng , xin vui lòng truy cập email khi đặt hàng để kiểm tra lại<p>";
        }
        
    }
    load_view('index');
}