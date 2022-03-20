<?php

/**--------------------------------------------------------------------
 * ROUTER là khu vực trung tâm điều hướng hệ thống
 * --------------------------------------------------------------------
 */
if(!empty($_SESSION['is_login'])){
    if(!is_admin() and get_action() != 'login'){
        unset_cookie_login();
        unset_seesion_login();
        redirect_url('?mod=users&action=login');
    }
}
if (!empty($_COOKIE['is_login'])) {
    $_SESSION['is_login'] = true;
    $_SESSION['user_login'] = $_COOKIE['user_login'];
    $_SESSION['user_id'] = $_COOKIE['user_id'];
}

if (empty($_SESSION['is_login']) and get_action() != 'login') {
    redirect_url('?mod=users&action=login');
}
$request_path = APP_PATH . DIRECTORY_SEPARATOR . "modules" . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR . get_controller() . "Controller.php";
// phamhuuphuoc.com / modules / home / controllers / indexController.php
if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "PATH : <b>[{$request_path}]</b> not exist";
}


$action_name = get_action() . "Action";
call_function(array('construct', $action_name));
