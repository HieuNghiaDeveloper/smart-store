<?php
function is_admin()
{
    $user_id = $_SESSION['user_id'];
    $user_login = $_SESSION['user_login'];
    $result = db_fetch_row("SELECT * FROM `tbl_admin` WHERE `users_id` = '{$user_id}' AND `display_name` = '{$user_login}'");
    if (!empty($result)) {
        return true;
    } else {
        return false;
    }
}
