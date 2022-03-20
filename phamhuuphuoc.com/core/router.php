<?php
// if(!empty($_SESSION['is_login'])){
//     if(!is_user() and get_action() != 'login'){
//         unset_cookie_login();
//         unset_seesion_login();
//         redirect_url('?mod=users&action=login');
//     }
// }
// if(isset($_COOKIE['is_login']) and !isset($_SESSION['is_login'])){
//     $user = array(
//         'fullname' => $_COOKIE['user_login'],
//         'users_id' => $_COOKIE['user_id'],
//     );
//     set_seesion_login($user);
// }
$path = MODULES_PATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR . get_controller() . "Controller.php";
if(file_exists($path)){
    require $path;
}else{
    echo "Đường dẫn không tồn tại";
}
$action_name = get_action()."Action";
call_function(array('construct', $action_name));

show_array($_SESSION);