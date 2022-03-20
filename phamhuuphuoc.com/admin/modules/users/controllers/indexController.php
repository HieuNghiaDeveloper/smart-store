<?php

function construct()
{
    load('lib', 'validation_form');
    load_model('index');
}

function loginAction()
{
    if (!empty($_SESSION['is_login'])) {
        redirect_url('?');
    }
    global $username, $password, $error;
    if (isset($_POST['btn_login'])) {
        $username = validation_field('username_login', 'error');
        $password = validation_field('password_login', 'error');

        //Kết luận
        if (empty($error)) {
            if ($user = check_user($username, $password)) {
                set_seesion_login($user);
                set_cookie_login($user);
                redirect_url('?');
            } else {
                $error['account_exist'] = "<p class='error'>Tài khoản hoặc mật khẩu không chính xác</p>";
            }
        }
    }
    load_view('login');
}

function logoutAction()
{
    unset_seesion_login();
    unset_cookie_login();
    redirect_url('?');
}

function update_infoAction()
{
    global $error, $display_name, $username, $email, $phone, $address;
    // Load lại thông tin cũ
    if ($user = information_user($_SESSION['user_id'])) {
        $display_name = $user['display_name'];
        $username = $user['username'];
        $email = $user['email'];
        $phone = $user['phone'];
        $address = $user['address'];
        // Cập nhật thông tin mới
        if (isset($_POST['btn_update'])) {
            $display_name = validation_field('display_name', 'error');
            $phone = validation_field('phone', 'error');
            // $address = validation_field('address', 'error');
            $address = !empty($_POST['address']) ? $_POST['address'] : NULL;
            // Kết luận
            if (empty($error)) {
                $data = array(
                    'display_name' => htmlentities($display_name),
                    'phone' => htmlentities($phone),
                    'address' => htmlentities($address),
                );
                if (update_info($data, (int)$_SESSION['user_id']) == true) {
                    echo "Cập nhật thành công";
                } else {
                    echo "Cập nhật thất bại";
                }
            }
        }
    } else {
        $display_name = $username = $email = $phone = $address = "NULL";
    }
    load_view('update_info');
}

function update_passAction()
{
    global $error, $success, $old_password, $new_password, $re_password;
    if (isset($_POST['btn_update'])) {
        $old_password = validation_field('old_password', 'error');
        $new_password = validation_field('new_password', 'error');
        $re_password = validation_field('re_password', 'error');
        // Kết luận
        if (empty($error)) {
            if (check_password($old_password, $_SESSION['user_login']) == true) {
                if ($old_password != $new_password) {
                    if ($new_password == $re_password) {
                        if(update_password($new_password, $_SESSION['user_login']) == true){
                            $success['success'] = "<p class='success'>Đã cập nhật mật khẩu thành công</p>";
                        }
                    } else {
                        $error['error_password'] = "<p class='error_password'>Xác nhận mật khẩu mới không trùng khớp</p>";
                    }
                } else {
                    $error['error_password'] = "<p class='error_password'>Mật khẩu mới đã trùng với mật khẩu cũ</p>";
                }
            } else {
                $error['error_password'] = "<p class='error_password'>Mật khẩu cũ không chính xác</p>";
            }
        }
    }
    load_view('update_pass');
}

function indexAction()
{
    // indexAction sẽ được lưu các thao tác gần nhất của admin như thêm xóa chỉnh sửa
    load_view('index');
}
