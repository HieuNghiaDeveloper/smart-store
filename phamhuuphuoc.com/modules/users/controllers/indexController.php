<?php
function construct()
{

    load_model('index');
    load('lib', 'validation_form');
}

function loginAction()
{
    unset($_SESSION['cart']);
    //Ngăn chặn khứ hồi về trang login khi đang ở bất kỳ trang nào
    //nếu như đã login rồi, sẽ được đưa về trang chủ
    if (!empty($_SESSION['is_login'])) {
        header("Location: ?");
    }
    /*
    -- Có 3 nơi để đăng nhập
        - Đăng nhập trực tiếp ở trang chủ hoặc bất cứ trang nào nếu có link đăng nhập
        - Click vào giỏ hàng , nếu chưa login sẽ được chuyển đi login
        - Đặt mua hàng , nếu chưa login sẽ được chuyển đi login
    */
    global $error;
    if (isset($_POST['btn_login'])) {
        $error = array();
        // -------------
        if (empty($_POST['username'])) {
            $error['username'] = "Nhập tên tài khoản";
        } else {
            $username = $_POST['username'];
        }
        if (empty($_POST['password'])) {
            $error['password'] = "Nhập mật khẩu";
        } else {
            $password = md5($_POST['password']);
        }
        // -------------
        if (empty($error)) {
            if ($user = check_user($username, $password)) {
                set_seesion_login($user);
                if (isset($_POST['remember_me'])) {
                    set_cookie_login($user);
                }
                if (empty($_SESSION['product_id'])) {
                    header("Location: ?mod=cart&action=index");
                } else {
                    header("Location: ?mod=cart&action=add&id={$_SESSION['product_id']}");
                }
            } else {
                $error['acc_not_exist'] = "<p class='error'>Tên tài khoản hoặc mật khẩu không chính xác</p>";
            }
        }
    }

    load_view('login');
}

function login_regAction()
{
    require_once GGAPI_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
    // Lấy những giá trị này từ https://console.google.com
    $client_id = '899648779865-ptk6f4cbs927senkgn3o90ej3taob41m.apps.googleusercontent.com';
    $client_secret = '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';
    $redirect_uri = 'http://localhost/University/DH51800699_PhamHuuPhuoc_D18-TH01/phamhuuphuoc.com/?mod=users&action=login_reg';

    
    //Thông tin kết nói database
    $db_username = "root"; //Database Username
    $db_password = ""; //Database Password
    $host_name = "localhost"; //Mysql Hostname
    $db_name = 'project'; //Database Name
    ###################################################################

    $client = new Google_Client();
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope("email");
    $client->addScope("profile");

    $service = new Google_Service_Oauth2($client);

    // Nếu kết nối thành công, sau đó xử lý thông tin và lưu vào database
    if (isset($_GET['code'])) {
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        //header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        $user = $service->userinfo->get(); //get user info
        // connect to database
        $mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
        if ($mysqli->connect_error) {
            die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        //Kiểm tra xem nếu user này đã tồn tại, sau đó nên login tự động
        $result = $mysqli->query("SELECT COUNT(`email`) as usercount FROM `tbl_users` WHERE `email`= '{$user->email}'");
        $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist


        if ($user_count) // Nếu user tồn tại thì show thông tin hiện có
        {
            $result = $mysqli->query("SELECT `users_id`, `fullname` FROM `tbl_users` WHERE `email`= '{$user->email}'");
            $hehe = $result->fetch_object();
            $data = array(
                'fullname' => $hehe->fullname,
                'users_id' => $hehe->users_id,
            );
            set_seesion_login($data);
            if (!empty($_SESSION['is_login'])) {
                redirect_url("?");
            }
        } else { //Ngược lại tạo mới 1 user vào database

            $data = array(
                'fullname' => $user->givenName . $user->familyName,
                'username' => $user->email,
                'email' => $user->email,
                'phone' => '0123456789',
                'gender' => 'male',
                'address' => 'address',
                'password' => 'password',
                'is_active' => 1,
            );
            db_insert('tbl_users', $data);

            $data = db_fetch_row("SELECT `fullname`, `users_id` FROM `tbl_users` WHERE `email` = '{$user->email}'");
            set_seesion_login($data);
            if (!empty($_SESSION['is_login'])) {
                redirect_url("?");
            }
        }
        exit;
    }

    //Nếu sẵn sàng kết nối, sau đó lưu session với tên access_token
    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
    } else { // Ngược lại tạo 1 link để login
        global $authUrl;
        $authUrl = $client->createAuthUrl();
    }

    load_view('login_google');
}

function logoutAction()
{
    unset_seesion_login();

    unset_cookie_login();

    header("Location: ?");
}

function registerAction()
{
    $data_send = array();
    $error = array();
    $alert = array();
    if (isset($_POST['btn_register'])) {


        #fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Nhập họ và tên";
        } else {
            $fullname = $_POST['fullname'];
            $data_send['fullname'] = $fullname;
        }

        #username
        if (empty($_POST['username'])) {
            $error['username'] = "Nhập tên tài khoản";
        } else {
            if (!enough_lenght($_POST['username'])) {
                $error['username'] = "Xin lỗi, tên tài khoản của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 32.";
            } else {
                if (!is_username($_POST['username'])) {
                    $error['username'] = "Bạn có thể sử dụng chữ cái, số, dấu chấm và dấu gạch dưới";
                } else {
                    $username = $_POST['username'];
                    $data_send['username'] = $username;
                }
            }
        }

        #password
        if (empty($_POST['password'])) {
            $error['password'] = "Nhập mật khẩu";
        } else {
            if (!enough_lenght($_POST['password'])) {
                $error['password'] = "Xin lỗi, mật khẩu của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 32.";
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = "Bạn có thể sử dụng chữ cái, số, dấu chấm, dấu gạch dưới, các ký tự đặc biệt và có chữ cái đầu viết hoa";
                } else {
                    $password = md5($_POST['password']);
                }
            }
        }

        #email
        if (empty($_POST['email'])) {
            $error['email'] = "Nhập tài khoản email";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Bạn có thể sử dụng định dạng email như mẫu sau example@email.com";
            } else {
                $email = $_POST['email'];
                $data_send['email'] = $email;
            }
        }

        #phone
        if (empty($_POST['phone'])) {
            $error['phone'] = "Nhập số điện thoại";
        } else {
            if (!is_phone_number($_POST['phone'])) {
                $error['phone'] = "SĐT hiện nay có số lượng trong khoảng 10 đến 11 số, các đầu số đang hiện hành 09, 08, 012, 016, 018, 019";
            } else {
                $phone = $_POST['phone'];
                $data_send['phone'] = $phone;
            }
        }

        #gender
        if (empty($_POST['gender'])) {
            $gender = NULL;
            $alert['gender'] = "Bạn có thể trả lời sau !!!";
        } else {
            $gender = $_POST['gender'];
            $data_send['gender'] = $gender;
        }

        #address
        if (empty($_POST['address'])) {
            $error['address'] = "Nhập địa chỉ";
        } else {
            $address = $_POST['address'];
            $data_send['address'] = $address;
        }


        //---Kết luận
        if (empty($error)) {
            //1. Phòng chống XSS
            $data = array(
                'fullname' => htmlentities($fullname),
                'username' => htmlentities($username),
                'password' => htmlentities($password),
                'email' => htmlentities($email),
                'phone' => htmlentities($phone),
                'gender' => htmlentities($gender),
                'address' => htmlentities($address)
            );
            //2. Phòng chống SQLInjection(đã có mysqli_real_escape_string trong db_insert)
            if (add_user_db($data) == true) {
                $user = check_user($data['username'], $data['password']);
                set_seesion_login($user);
                header("Location: ?");
            } else {
                $error['username'] = "Tên tài khoản đã tồn tại";
            }
        }
        $data_send['error'] = $error;
        $data_send['alert'] = $alert;
        //-----------
    }
    load_view("register", $data_send);
}
