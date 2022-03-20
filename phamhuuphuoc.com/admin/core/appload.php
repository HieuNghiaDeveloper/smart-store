<?php

/**-------------------------------------------------------------------
 * APPLOAD khu vực khởi động file cần thiết của hệ thống
 * -------------------------------------------------------------------
 */

ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

// Từ CONFIG
require CONFIG_PATH . DIRECTORY_SEPARATOR . "database.php";
require CONFIG_PATH . DIRECTORY_SEPARATOR . "config.php";
require CONFIG_PATH . DIRECTORY_SEPARATOR . "autoload.php";
require CONFIG_PATH . DIRECTORY_SEPARATOR . "email.php";

// Từ CORE
require CORE_PATH . DIRECTORY_SEPARATOR . "base.php";

// Từ LIB
require LIB_PATH . DIRECTORY_SEPARATOR . "database.php";
db_connect($db);

// Từ AUTOLOAD - AUTOLOAD LIB_HELPER
if(!empty($autoload)){
    foreach($autoload as $type => $list_auto){
        if(!empty($list_auto)){
            foreach($list_auto as $name){
                load($type, $name);
            }
        }
    }
}

require CORE_PATH . DIRECTORY_SEPARATOR . "router.php";
