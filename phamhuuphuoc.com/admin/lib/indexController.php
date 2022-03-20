<?php

function construct(){
    load('lib', 'validation_form');
    load_model('index');
}

function loginAction(){
    global $username, $password, $error;
    if(isset($_POST['btn_login'])){
        $username = validation_field('username_login', 'error');
        $password = validation_field('password_login', 'error');

        //Kết luận
        if(empty($error)){
            if($user = check_user($username, $password)){
                
            }else{
                echo "<p class='account_exist'>Tài khoản hoặc mật khẩu không chính xác</p>";
            }
        }
    }
    load_view('login');
}

function indexAction(){
    load_view('index');
}

function update_infoAction(){
    
    load_view('update_info');
}

function update_passAction(){
    load_view('update_pass');
}

function logoutAction(){

}