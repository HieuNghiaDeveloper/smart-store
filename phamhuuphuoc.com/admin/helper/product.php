<?php
function enough_length($least_char, $most_char, $string)
{
    if ((strlen($string) >= $least_char) and (strlen($string) <= $most_char))
        return true;
}

function is_product_name($least_char, $most_char, $product_name)
{
    $product_name = trim($product_name);
    $partten = "/^[\w_\s\p{L}\/\.!@#$%^&*()-]{{$least_char},{$most_char}}$/u";
    if (preg_match($partten, $product_name, $matchs)) {
        return true;
    }
}

function is_product_code($code)
{
    $code = trim($code);
    $partten = "/^[A-Za-z0-9_\.#]{2,32}+$/";
    if (preg_match($partten, $code, $matchs)) {
        return true;
    }
}

function is_product_price($price){
    $price = trim($price);
    $partten = "/^[0-9]{4,10}$/";
    if (preg_match($partten, $price, $matchs)) {
        return true;
    }
}

function validation_fields_product($label_field, $class_error, $least_char = 0, $most_char = 0, $class_success = '', $class_alert = '')
{
    global $error;
    global $_POST;

    // product_name
    if ($label_field == 'product_name') {
        if (empty($_POST['product_name'])) {
            $error['product_name'] = "<p class='{$class_error}'>Vui lòng chọn tên sản phẩm</p>";
        } else {
            if (!enough_length($least_char, $most_char, $_POST['product_name'])) {
                $error['product_name'] = "<p class='{$class_error}'>Tên sản phẩm có số lượng từ {$least_char} - {$most_char} ký tự</p>";
            } else {
                if (!is_product_name($least_char, $most_char, $_POST['product_name'])) {
                    $error['product_name'] = "<p class='{$class_error}'>Bạn có thể sử dụng các ký tự từ A-z0-9, Unicode và khoảng trắng</p>";
                } else {
                    return trim($_POST['product_name']);
                }
            }
        }
    }

    // code
    if ($label_field == 'code') {
        if (empty($_POST['code'])) {
            $error['code'] = "<p class='{$class_error}'>Bạn vui lòng nhập mã sản phẩm</p>";
        } else {
            if (!is_product_code($_POST['code'])) {
                $error['code'] = "<p class='{$class_error}'>Mã sản phẩm có định dạng như sau : PHP#1 hoặc PHP_1</p>";
            } else {
                return trim($_POST['code']);
            }
        }
    }

    // price
    if ($label_field == 'price') {
        if (empty($_POST['price'])) {
            $error['price'] = "<p class='{$class_error}'>Bạn vui lòng nhập giá sản phẩm</p>";
        } else {
            if(!is_product_price($_POST[$label_field])){
                $error['price'] = "<p class='{$class_error}'>Bạn vui lòng nhập giá sản phẩm bằng số . Ví dụ : 1.000.000VND = 1000000</p>";
            }else{
                return trim($_POST['price']);
            }
        }
    }

    // desc
    if ($label_field == 'desc') {
        if (empty($_POST['desc'])) {
            return NULL;
        } else {
            if (!enough_length($least_char, $most_char, $_POST['desc'])) {
                $error['desc'] = "Bạn hãy mô tả ngắn gọn trong khoảng {$least_char} - {$most_char} ký tự";
            } else {
                return trim($_POST['desc']);
            }
        }
    }

    // content
    if ($label_field == 'content') {
        if (empty($_POST['content'])) {
            return NULL;
        } else {
            if (!enough_length($least_char, $most_char, $_POST['content'])) {
                $error['content'] = "Bạn hãy mô tả ngắn gọn trong khoảng {$least_char} - {$most_char} ký tự";
            } else {
                return trim($_POST['content']);
            }
        }
    }

    // cat_id
    if ($label_field == 'cat_id') {
        if (empty($_POST['cat_id'])) {
            $error['cat_id'] = "<p class='{$class_error}'>Bạn vui lòng chọn danh mục mà sản phẩm thuộc vào</p>";
        } else {
            return $_POST['cat_id'];
        }
    }

}
