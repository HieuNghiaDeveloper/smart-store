<?php
function is_user(){
    $user_id = $_SESSION['user_id'];
    $user_login = $_SESSION['user_login'];
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `users_id` = '{$user_id}' AND `fullname` = '{$user_login}'");
    if (!empty($result)) {
        return true;
    } else {
        return false;
    }
}
