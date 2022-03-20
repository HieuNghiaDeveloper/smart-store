<?php

/**-----------------------------------------------------------------
 * Modules
 * -----------------------------------------------------------------
 */
// get Controller name
function get_controller()
{
    global $config;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $config['default_controller'];
    return $controller;
}

// get module name
function get_module()
{
    global $config;
    $module = isset($_GET['mod']) ? $_GET['mod'] : $config['default_module'];
    return $module;
}

// get Action name
function get_action()
{
    global $config;
    $action = isset($_GET['action']) ? $_GET['action'] : $config['default_action'];
    return $action;
}


/**-----------------------------------------------------------------
 * Load Lib, Helper
 * Autoload các file LIB và HELPER ở phân vùng vào xử lý
 * Ví dụ: load('lib','database');
 * Đầu vào
 * ---- $type: Loại phân vùng hệ thống: lib, helper...
 * ---- $name: Tên chức năng được load: database, string...
 * -----------------------------------------------------------------
 */

function load($type, $name)
{
    if ($type == 'lib') {
        $path = LIB_PATH . DIRECTORY_SEPARATOR . "{$name}.php";
    }
    if ($type == 'helper') {
        $path = HELPER_PATH . DIRECTORY_SEPARATOR . "{$name}.php";
    }

    if (file_exists($path)) {
        // echo $path;
        require $path;
    } else {
        echo "PATH : <b>[{$path}]</b> not exist</br>";
    }
}

/**-----------------------------------------------------------------
 * callFunction
 * Gọi đến hàm theo tham số biến 
 * -----------------------------------------------------------------
 */
function call_function($list_function = array())
{
    foreach ($list_function as $f) {
        if (function_exists($f())) {
            $f();
        }
    }
}


/**-----------------------------------------------------------------
 * Load Model-View
 * Load các file trong phân vùng của Modules đang thực thi
 * Kết nối với CSDL và thao tác với người dùng 
 * -----------------------------------------------------------------
 */
function load_view($name, $data_send = array())
{
    // Có thể gửi dữ liệu từ trong 1 action nào đó đến 1 view mà action đó đang gọi
    global $glo_data;
    $glo_data = $data_send;
    $path = MODULES_PATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "{$name}View.php";
    if (file_exists($path)) {
        if (is_array($glo_data) and !empty($glo_data)) {
            foreach ($glo_data as $k_data => $v_data) {
                $$k_data = $v_data;
            }
        }
        require $path;
    } else {
        echo "ERROR. View:[{$name}] không tìm thấy<br>";
        echo "PATH : <b>[{$path}]</b> not exist</br>";
    }
}

function load_model($name)
{
    $path = MODULES_PATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR . "{$name}Model.php";
    if (file_exists($path)) {
        require $path;
    } else {
        echo "Models:[{$name}] không tìm thấy";
        echo "PATH : <b>[{$path}]</b> not exist</br>";
    }
}

/**-----------------------------------------------------------------
 * Get các phần Template và ghép vào file nào đó 
 * Có thể sử dụng dữ liệu global mà load_view đem đến
 * -----------------------------------------------------------------
 */

function get_header($name = "")
{
    global $glo_data;
    if (empty($name)) {
        $name = "header";
    } else {
        $name = "header-{$name}";
    }
    $path = LAYOUT_PATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path)) {
        // if (is_array($glo_data) and !empty($glo_data)) {
        //     foreach ($glo_data as $k_data => $v_data) {
        //         $$k_data = $v_data;
        //     }
        // }
        require $path;
    } else {
        echo "Template-header:[{$name}] không tìm thấy";
        echo "PATH : <b>[{$path}]</b> not exist</br>";
    }
}

function get_notify($name = "")
{
    if (empty($name)) {
        $name = "notify";
    } else {
        $name = "notify-{$name}";
    }
    $path = LAYOUT_PATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path)) {
        // if (is_array($glo_data) and !empty($glo_data)) {
        //     foreach ($glo_data as $k_data => $v_data) {
        //         $$k_data = $v_data;
        //     }
        // }
        require $path;
    } else {
        echo "Template-notify:[{$name}] không tìm thấy";
        echo "PATH : <b>[{$path}]</b> not exist</br>";
    }
}


function get_footer($name = "")
{
    global $glo_data;
    if (empty($name)) {
        $name = "footer";
    } else {
        $name = "footer-{$name}";
    }
    $path = LAYOUT_PATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path)) {
        if (is_array($glo_data) and !empty($glo_data)) {
            foreach ($glo_data as $k_data => $v_data) {
                $$k_data = $v_data;
            }
        }
        require $path;
    } else {
        echo "Template-footer:[{$name}] không tồn tại";
        echo "PATH : <b>[{$path}]</b> not exist</br>";
    }
}

function get_sidebar($name = "")
{
    global $glo_data;
    if (empty($name)) {
        $name = "sidebar";
    } else {
        $name = "sidebar-{$name}";
    }
    $path = LAYOUT_PATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path)) {
        if (is_array($glo_data) and !empty($glo_data)) {
            foreach ($glo_data as $k_data => $v_data) {
                $$k_data = $v_data;
            }
        }
        require $path;
    } else {
        echo "Template-sidebar:[{$name}] không tồn tại";
        echo "PATH : <b>[{$path}]</b> not exist</br>";
    }
}
