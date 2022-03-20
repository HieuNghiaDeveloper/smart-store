<?php


function validate_image($label_field, $class_field, $upload_dir, $size = 20000000, $format = array('jpg', 'jpeg', 'png', 'gif'))
{
    $data = array();
    global $error;
    global $_FILES;
    // Vì là mutiple nên phải !empty tới phần tử thứ 0 của 'name'
    if (!empty($_FILES[$label_field]['name'][0])) {
        foreach ($_FILES[$label_field]['name'] as $k_file => $v_file) {
            # Đường dẫn tạm của file ảnh khi lên server
            $tmp_name = $_FILES[$label_field]['tmp_name'][$k_file];
            # Đường dẫn từ .. đến file ảnh
            $upload_file = $upload_dir . $_FILES[$label_field]['name'][$k_file];
            # Chỉ định dạng ảnh . VD : jpg, png 
            $file_format = pathinfo($_FILES[$label_field]['name'][$k_file], PATHINFO_EXTENSION);
            # Chỉ tên ảnh . VD : hehe, huhu
            $file_name = pathinfo($_FILES[$label_field]['name'][$k_file], PATHINFO_FILENAME);

            if (!in_array(strtolower($file_format), $format)) {
                $error[$label_field] = "<p class='{$class_field}'>Hệ thống chỉ hỗ trợ file ảnh có định dạng 'jpg', 'jpeg', 'png', 'gif'</p>";
            } else {
                if ($_FILES[$label_field]['size'][$k_file] > $size) {
                    $error[$label_field] = "<p class='{$class_field}'>Hệ thống hỗ trợ file ảnh có kích thước <20MB</p>";
                } else {
                    if (file_exists($upload_file)) {
                        $new_upload_file =  $upload_dir . $file_name . " - Copy." . $file_format;
                        $k = 2;
                        while (file_exists($new_upload_file)) {
                            $new_upload_file =  $upload_dir . $file_name . " - Copy({$k})." . $file_format;
                            $k++;
                        }
                        $data[] = array(
                            'url' => $new_upload_file,
                            'name' => $file_name,
                            'tmp_name' => $tmp_name
                        );
                    } else {
                        $data[] = array(
                            'url' => $upload_file,
                            'name' => $file_name,
                            'tmp_name' => $tmp_name
                        );
                    }
                }
            }
            
        }


    }
    return $data;
}
