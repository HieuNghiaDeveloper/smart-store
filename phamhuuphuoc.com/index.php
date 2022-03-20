<?php

// Từ đường dẫn chính của dự án
$app_path = dirname(__FILE__);
define("APP_PATH", $app_path);


// Đến folder CONFIG
define("CONFIG_PATH", APP_PATH . DIRECTORY_SEPARATOR . "config");


// Đến folder CORE
define("CORE_PATH", APP_PATH . DIRECTORY_SEPARATOR . "core");


// Đến folder HELPER
define("HELPER_PATH", APP_PATH . DIRECTORY_SEPARATOR . "helper");


// Đến folder LAYOUT
define("LAYOUT_PATH", APP_PATH . DIRECTORY_SEPARATOR . "layout");


// Đến folder LIB
define("LIB_PATH", APP_PATH . DIRECTORY_SEPARATOR . "lib");


// Đến folder MODULES
define("MODULES_PATH", APP_PATH . DIRECTORY_SEPARATOR . "modules");


// Đến folder PUBLIC
define("PUBLIC_PATH", APP_PATH . DIRECTORY_SEPARATOR . "public");

// Đến folder gg_API
define("GGAPI_PATH", APP_PATH . DIRECTORY_SEPARATOR . "google_api");

require CORE_PATH . DIRECTORY_SEPARATOR . "appload.php";
