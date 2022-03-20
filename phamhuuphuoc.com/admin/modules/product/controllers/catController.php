<?php

function construct(){
    load_model('cat');
    load('lib', 'data_tree');
    load('lib', 'validation_form');
    load('helper', 'file');
}

function indexAction(){
    global $list_category;
    $list_category = data_tree(get_all_category());
    load_view('index_cat');
}

function addAction(){
    global $list_category;
    global $error, $title, $slug, $desc, $cat_thumb;
    global $glo_data;
    if(isset($_POST['btn_add'])){
        $title = validation_fields('title', 'error', 0, 50);
        $slug = validation_fields('slug', 'error', 0, 60);
        $desc = validation_fields('desc', 'error', 0, 1000);
        $creator = get_creator($_SESSION['user_id']);
        $creation_time = time();

        $upload_dir = "public/images/product_cat/";
        $upload_file = validate_image('cat_thumb', 'error', $upload_dir);

        $parent_id = validation_fields('parent_id', 'error', 0, 0);

        if(empty($error)){
            if(!check_category_exist($title, $slug)){
                $data = array(
                    '`title`' => $title,
                    '`slug`' => $slug,
                    '`desc`' => $desc,
                    '`creator`' => $creator,
                    '`creation_time`' => $creation_time,
                    '`cat_thumb`' => $upload_file['url'] = !empty($upload_file['url'])?$upload_file['url']:NULL,
                    '`parent_id`' => $parent_id,
                );
                if($id = add_category($data, 'tbl_category')){
                    move_uploaded_file($_FILES['cat_thumb']['tmp_name'], $upload_file['url']);
                    $cat_thumb = $upload_file['url'];
                    $glo_data['id'] = $id;
                    $glo_data['list_category'] = data_tree_ultra_level(get_category_by_parent_id($parent_id), $parent_id);
                    get_notify();
                }
            }else{
                echo "Đã tồn tại danh mục";
            }
        }
    }
    $list_category = data_tree(get_all_category());
    load_view('add_cat');
}

function deleteAction(){
    $cat_id = !empty($_GET['cat_id'])?(int)$_GET['cat_id']:FALSE;
    if(delete_category($cat_id)){
        redirect_url("?mod=product&controller=cat&action=index");
    }else{
        redirect_url("?mod=404&action=index");
    }
}

function updateAction(){
    $cat_id = !empty($_GET['cat_id'])?(int)$_GET['cat_id']:FALSE;
    load_view('update_cat');
}