<?php
//Output normalized data
function set_value($label_field)
{
    global $$label_field;
    if (!empty($$label_field)) {
        return $$label_field;
    }
}

function set_value_file($label_field)
{
    global $$label_field;
    if (!empty($$label_field)) {
        return $$label_field;
    } else {
        return false;
    }
}

//Output error to users
function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field])) {
        return $error[$label_field];
    }
}

function form_success($label_field)
{
    global $success;
    if (!empty($success[$label_field])) {
        return $success[$label_field];
    }
}


//Output alert to users
function form_alert($label_field)
{
    global $alert;
    if (!empty($alert[$label_field])) {
        return $alert[$label_field];
    }
}


//Enough length check
function enough_lenght($username)
{
    if ((strlen($username) >= 6) and (strlen($username) <= 32))
        return true;
}


//Check username format
function is_username($username)
{
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (preg_match($partten, $username, $matchs))
        return true;
}


//Check password format
function is_password($password)
{
    $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (preg_match($partten, $password, $matchs))
        return true;
}

//Check email format
function is_email($email)
{
    $partten = "/^[A-Za-z0-9_\.]{2,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (preg_match($partten, $email, $matchs))
        return true;
}

//Check phone number format
function is_phone_number($phone)
{
    $partten_old = "/^[0-9]{10,11}$/";
    $partten_new = "/^(09|08|07|01[2|6|8|9])+([0-9]{8})$/";
    if (preg_match($partten_new, $phone, $matchs))
        return true;
}

function validation_field($label_field, $class_field)
{
    global $error;
    global $_POST;
    global $alert;
    #display_name
    if ($label_field == 'display_name') {
        if (empty($_POST['display_name'])) {
            $error['display_name'] = "<p class='{$class_field}'>Nhập tên hiển thị</p>";
        } else {
            return $_POST['display_name'];
        }
    }
    #fullname
    if ($label_field == 'fullname') {
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "<p class='{$class_field}'>Nhập họ và tên</p>";
        } else {
            return $_POST['fullname'];
        }
    }

    #username
    if ($label_field == 'username') {
        if (empty($_POST['username'])) {
            $error['username'] = "<p class='{$class_field}'>Nhập tên tài khoản</p>";
        } else {
            if (!enough_lenght($_POST['username'])) {
                $error['username'] = "<p class='{$class_field}'>Bạn có thể sử dụng tên tài khoản nằm trong khoảng 6-32 ký tự</p>";
            } else {
                if (!is_username($_POST['username'])) {
                    $error['username'] = "<p class='{$class_field}'>Bạn có thể sử dụng chữ cái không dấu, số, dấu chấm và dấu gạch dưới</p>";
                } else {
                    return $_POST['username'];
                }
            }
        }
    }

    #username_login
    if ($label_field == 'username_login') {
        if (empty($_POST['username'])) {
            $error['username'] = "<p class='{$class_field}'>Nhập tên tài khoản</p>";
        } else {
            return $_POST['username'];
        }
    }

    #password
    if ($label_field == 'password') {
        if (empty($_POST['password'])) {
            $error['password'] = "<p class='{$class_field}'>Nhập mật khẩu</p>";
        } else {
            if (!enough_lenght($_POST['password'])) {
                $error['password'] = "<p class='{$class_field}'>Bạn có thể sử dụng mật khẩu nằm trong khoảng 6-32 ký tự</p>";
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = "<p class='{$class_field}'>Bạn sử dụng các ký tự không dấu, số, ký tự đặc biệt và có ký tự đầu viết hoa</p>";
                } else {
                    return md5($_POST['password']);
                }
            }
        }
    }

    #old_password
    if ($label_field == 'old_password') {
        if (empty($_POST['old_password'])) {
            $error['old_password'] = "<p class='{$class_field}'>Nhập mật khẩu cũ</p>";
        } else {
            if (!enough_lenght($_POST['old_password'])) {
                $error['old_password'] = "<p class='{$class_field}'>Bạn có thể sử dụng mật khẩu nằm trong khoảng 6-32 ký tự</p>";
            } else {
                if (!is_password($_POST['old_password'])) {
                    $error['old_password'] = "<p class='{$class_field}'>Bạn sử dụng các ký tự không dấu, số, ký tự đặc biệt và có ký tự đầu viết hoa</p>";
                } else {
                    return md5($_POST['old_password']);
                }
            }
        }
    }

    #new_password
    if ($label_field == 'new_password') {
        if (empty($_POST['new_password'])) {
            $error['new_password'] = "<p class='{$class_field}'>Nhập mật khẩu mới</p>";
        } else {
            if (!enough_lenght($_POST['new_password'])) {
                $error['new_password'] = "<p class='{$class_field}'>Bạn có thể sử dụng mật khẩu nằm trong khoảng 6-32 ký tự</p>";
            } else {
                if (!is_password($_POST['new_password'])) {
                    $error['new_password'] = "<p class='{$class_field}'>Bạn sử dụng các ký tự không dấu, số, ký tự đặc biệt và có ký tự đầu viết hoa</p>";
                } else {
                    return md5($_POST['new_password']);
                }
            }
        }
    }

    #re_password
    if ($label_field == 're_password') {
        if (empty($_POST['re_password'])) {
            $error['re_password'] = "<p class='{$class_field}'>Nhập lại mật khẩu mới</p>";
        } else {
            return md5($_POST['re_password']);
        }
    }

    #password_login
    if ($label_field == 'password_login') {
        if (empty($_POST['password'])) {
            $error['password'] = "<p class='{$class_field}'>Nhập mật khẩu</p>";
        } else {
            return md5($_POST['password']);
        }
    }
    #email
    if ($label_field == 'email') {
        if (empty($_POST['email'])) {
            $error['email'] = "<p class='{$class_field}'>Nhập tài khoản email</p>";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "<p class='{$class_field}'>Tài khoản email có định dạng như sau : example@email.com</p>";
            } else {
                return $_POST['email'];
            }
        }
    }

    #phone
    if ($label_field == 'phone') {
        if (empty($_POST['phone'])) {
            $error['phone'] = "<p class='{$class_field}'>Nhập số điện thoại</p>";
        } else {
            if (!is_phone_number($_POST['phone'])) {
                $error['phone'] = "<p class='{$class_field}'>Các đầu số phổ biến hiện nay là 09, 08, 07, 012, 016, 018, 019</p>";
            } else {
                return $_POST['phone'];
            }
        }
    }

    #gender
    if ($label_field == 'gender') {
        if (empty($_POST['gender'])) {
            $alert['gender'] = "<p class='{$class_field}'>Bạn có thể cập nhật sau</p>";
            return NULL;
        } else {
            return $_POST['gender'];
        }
    }

    #address
    if ($label_field == 'address') {
        if (empty($_POST['address'])) {
            $error['address'] = "<p class='{$class_field}'>Nhập địa chỉ để có thể giao hàng nhanh hơn</p>";
        } else {
            return $_POST['address'];
        }
    }
}


function enougth_length($least, $most, $string)
{
    if ((strlen($string) >= $least) and (strlen($string) <= $most))
        return true;
}

function is_category_title($least, $most, $title)
{
    $title = trim($title);
    $partten = "/^[A-Za-z0-9\&ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{{$least},{$most}}$/";
    if (preg_match($partten, $title, $matchs)) {
        return true;
    }
}




function validation_fields($label_field, $class_field, $least, $most)
{
    global $error;
    global $_POST;
    // category_title
    if ($label_field == 'title') {
        if (empty($_POST['title'])) {
            $error['title'] = "<p class='{$class_field}'>Vui lòng chọn tên danh mục</p>";
        } else {
            if (!enougth_length($least, $most, $_POST['title'])) {
                $error['title'] = "<p class='{$class_field}'>Tên danh mục có số lượng từ {$least} - {$most} ký tự</p>";
            } else {
                if (!is_category_title($least, $most, $_POST['title'])) {
                    $error['title'] = "<p class='{$class_field}'>Bạn có thể sử dụng các ký tự từ A-z0-9, Unicode và khoảng trắng</p>";
                } else {
                    return trim($_POST['title']);
                }
            }
        }
    }

    // category_desc
    if ($label_field == 'desc') {
        if (empty($_POST['desc'])) {
            return NULL;
        } else {
            if (!enougth_length($least, $most, $_POST['desc'])) {
                $error['desc'] = "Bạn hãy mô tả ngắn gọn trong khoảng {$least} - {$most} ký tự";
            } else {
                return trim(strip_tags($_POST['desc']));
                // return $_POST['desc'];
            }
        }
    }



    // category_slug
    if ($label_field == 'slug') {
        if (empty($_POST['slug'])) {
            $error['slug'] = "<p class='{$class_field}'>Vui lòng nhập Friendly URL</p>";
        } else {
            if (!enougth_length($least, $most, $_POST['slug'])) {
                $error['slug'] = "<p class='{$class_field}'>Friendly URL có số lượng {$least} - {$most} ký tự</p>";
            } else {
                return create_slug(trim($_POST['slug']));
            }
        }
    }

    // parent_id
    if ($label_field == 'parent_id') {
        if (empty($_POST['parent_id'])) {
            $error['parent_id'] = "<p class='{$class_field}'>Bạn vui lòng chọn danh mục chính mới hoặc danh mục bạn tạo cần phụ thuộc</p>";
        } else {
            if ($_POST['parent_id'] == 9999) {
                return 0;
            } else {
                return $_POST['parent_id'];
            }
        }
    }

    // cat_id
    if ($label_field == 'cat_id') {
        if (empty($_POST['cat_id'])) {
            $error['cat_id'] = "<p class='{$class_field}'>Bạn vui lòng chọn danh mục mà bài viết thuộc vào</p>";
        } else {
            return $_POST['cat_id'];
        }
    }




}
