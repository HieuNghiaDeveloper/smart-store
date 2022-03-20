<?php

function set_cookie_login($user = array()){
    setcookie('is_login', true, time() + 3600);
    setcookie('user_login', $user['fullname'], time() + 3600);
    setcookie('user_id', $user['users_id'], time() + 3600);
}

function unset_cookie_login(){
    setcookie('is_login', true, time() - 3600);
    setcookie('user_login', true, time() - 3600);
    setcookie('user_id', true, time() - 3600);
}