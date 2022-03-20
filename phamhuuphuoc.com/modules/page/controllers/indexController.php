<?php

function construct(){
    load('lib', 'page');
}

function detailAction(){
    global $list_pages;
    $id = (int)$_GET['id'];
    $page = get_page($id, $list_pages);
    $data['page'] = $page;
    load_view('index', $data);
}