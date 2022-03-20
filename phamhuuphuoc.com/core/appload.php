<?php
ob_start();
session_start();
// Gọi những file cần thiết khi vừa chạy dự án

// Từ CONFIG
require CONFIG_PATH . DIRECTORY_SEPARATOR . "database.php";
require CONFIG_PATH . DIRECTORY_SEPARATOR . "config.php";
require CONFIG_PATH . DIRECTORY_SEPARATOR . "autoload.php";
require CONFIG_PATH . DIRECTORY_SEPARATOR . "list_product.php";
require CONFIG_PATH . DIRECTORY_SEPARATOR . "list_pages.php";
require CONFIG_PATH . DIRECTORY_SEPARATOR . "email.php";


// Từ CORE
require CORE_PATH . DIRECTORY_SEPARATOR . "base.php";


// Từ LIB
require LIB_PATH . DIRECTORY_SEPARATOR . "database.php";

db_connect($db);

// req GGAPI_PATH . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";


// Từ file tự động load
if (is_array($autoload)) {
    foreach ($autoload as $type => $list_auto) {
        if (!empty($list_auto)) {
            foreach ($list_auto as $name) {
                load($type, $name);
            }
        }
    }
}



require CORE_PATH . DIRECTORY_SEPARATOR . "router.php";