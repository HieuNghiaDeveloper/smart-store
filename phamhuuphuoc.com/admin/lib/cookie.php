<?php

function set_cookie_login($user = array()){
    setcookie('is_login', true, time() + 3600, '/');
    setcookie('user_login', $user['display_name'], time() + 3600, '/');
    setcookie('user_id', $user['users_id'], time() + 3600, '/');
}

function unset_cookie_login(){
    setcookie('is_login', "", time() - 3600, '/');
    setcookie('user_login', "", time() - 3600, '/');
    setcookie('user_id', "", time() - 3600, '/');
}