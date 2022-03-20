<?php

function construct()
{
    load_model('index');
    load('helper', 'file');
    load('helper', 'product');
    load('lib', 'data_tree');
    load('lib', 'validation_form');

}

function indexAction()
{
    global $list_product;
    $list_product = get_all_product();
    load_view("index");
}

function addAction()
{
    global $error, $product_name, $code, $price, $desc, $content;
    if (isset($_POST['btn_add'])) {
        $product_name = validation_fields_product('product_name', 'error', 0, 150);
        $code = get_last_code();
        $code = 1 + (int)str_replace(array('P', 'H', 'P', '#') , '', $code);
        $price = validation_fields_product('price', 'error', 0, 150);
        $desc = validation_fields_product('desc', 'error', 0, 1000);
        $content = validation_fields_product('content', 'error', 0, 1000000);
        $cat_id = validation_fields_product('cat_id', 'error', 0, 0);

        $product_images = validate_image('product_images', 'error', 'public/images/product/');

        $creator = get_creator($_SESSION['user_id']);
        $creation_time = time();
        if (empty($error)) {
            if (!check_product_exist($product_name)) {
                $data = array(
                    '`name`' => $product_name,
                    '`code`' => "PHP" . $code,
                    '`price`' => $price,
                    '`desc`' => htmlentities($desc),
                    '`content`' => htmlentities($content),
                    '`creator`' => $creator,
                    '`creation_time`' => $creation_time,
                    '`cat_id`' => $cat_id,
                );
                if ($product_id = add_product($data)) {
                    if (!empty($product_images)) {
                        foreach ($product_images as $image) {
                            if (add_image_product($image['name'], $image['url'], $product_id, 1)) {
                                move_uploaded_file($image['tmp_name'], $image['url']);
                            }
                        }
                    }
                    global $message;
                    $message = "Đã thêm sản phẩm thành công";
                    get_notify('product');
                } else {
                    $error['add_failed'] = "<p class='error'>Đã có lỗi trong quá trình thêm sản phẩm.</p>";
                }
            } else {
                $error['add_failed'] = "<p class='error'>Tên sản phẩm đã tồn tại trong CSDL</p>";
            }
        }
    }
    global $list_category;
    $list_category = data_tree(get_all_category());
    $code = get_last_code();
    $code = str_replace(array('P', 'H', 'P', '#') , '', $code);
    $code = (int)$code + 1;
    $code = "PHP" . $code;
    load_view("add");
}

function updateAction(){
    global $error, $list_category, $product_name, $code, $price, $url, $desc, $content, $cat_id;
    $id = !empty($_GET['id'])?(int)$_GET['id']:FALSE;
    // ---------------------

    if(isset($_POST['btn_update'])){
        $price = validation_fields_product('price', 'error', 0, 150);
        $desc = validation_fields_product('desc', 'error', 0, 1000);
        $content = validation_fields_product('content', 'error', 0, 1000000);
        $cat_id = validation_fields_product('cat_id', 'error', 0, 0);

        if(empty($error)){
            $data = array(
                '`price`' => $price,
                '`desc`' => $desc,
                '`content`' => $content,
                '`cat_id`' => $cat_id,
            );
            if(update_info_product($id, $data)){
                global $message;
                $message = "Đã cập nhật sản phẩm thành công";
                get_notify('product');
            }
        }
    }

    // ---------------------
    $product = get_product_by_id($id);
    $list_category = data_tree(get_all_category());

    $product_name = $product['name'];
    $code = $product['code'];
    $price = $product['price'];
    $url = $product['url'];

    $desc = $product['desc'];
    $content = $product['content'];
    $cat_id = $product['cat_id'];

    load_view('update');
}

function deleteAction(){
    $id = !empty($_GET['id'])?(int)$_GET['id']:FALSE;
    delete_product($id);
    redirect_url('?mod=product&controller=index&action=index');
}
