<?php

function construct()
{
    load_model('index');
    load('lib', 'cart');
    load('lib', 'validation_form');
}

function indexAction()
{
    unset($_SESSION['cart']);
    if (!isset($_SESSION['is_login'])) {
        header("Location: ?mod=users&action=login");
    }
    $_SESSION['cart']['buy'] = get_product_cart($_SESSION['user_id']);
    total_cart();
    load_view('index');
    
}

function addAction()
{
    if (!isset($_SESSION['is_login'])) {
        header("Location: ?mod=users&action=login");
    }
    // if(!empty($_SESSION['product_id'])){
    //     unset($_SESSION['product_id']);
    // }
    $_SESSION['product_id'] = !empty($_GET['id']) ? (int)$_GET['id'] : FALSE;

    # TH1 : Chưa từng tồn tại user_id trong `tbl_cart`
    if (!check_user_id_exist_cart($_SESSION['user_id'])) {
        // Nếu người dùng chưa thêm sản phẩm lần nào thì insert
        insert_product_cart($_SESSION['user_id'], $_SESSION['product_id']);
    }
    #TH2 : Đã tồn tại ít nhất user_id trong `tbl_cart`
    else {
        if (check_product_id_exist_cart($_SESSION['user_id'], $_SESSION['product_id'])) {
            // Nếu đã tồn tại sản phẩm thì update
            update_qty_product_cart($_SESSION['user_id'], $_SESSION['product_id']);
        } else {
            // Nếu chưa tồn tại sản phẩm thì insert
            insert_product_cart($_SESSION['user_id'], $_SESSION['product_id']);
        }
    }

    // unset($_SESSION['product_id']);
    header("Location: ?mod=cart&action=index");
}

function deleteAction()
{
    $product_id = !empty($_GET['id']) ? (int)$_GET['id'] : FALSE;
    delete_product_cart($_SESSION['user_id'], $product_id);
    header("Location: ?mod=cart&action=index");
}

function delete_allAction()
{
    delete_all_product_cart_db($_SESSION['user_id']);
    header("Location: ?mod=cart&action=index");
}


function update_ajaxAction()
{
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];

    //Khi update ajax thì đã mua rồi(user_id và product_id đã tồn tại 
    //trong giỏ hàng, không cần insert hay kiểm tra gì cả
    //chỉ cần update qty)
    update_ajax_qty_product_cart_db($user_id, $product_id, $qty);
                       
    if (array_key_exists($product_id, $_SESSION['cart']['buy'])) {
        //Cập nhật lại qty và sub_total
        $_SESSION['cart']['buy'][$product_id]['qty'] = $qty;
        $_SESSION['cart']['buy'][$product_id]['sub_total'] = $qty *  $_SESSION['cart']['buy'][$product_id]['price'];

        //Cập nhật lại tổng giỏ hàng
        total_cart();

        //Copy các dữ liệu khi sử dụng lại thì ngắn gọn
        $sub_total = $_SESSION['cart']['buy'][$product_id]['sub_total'];
        $total_qty = $_SESSION['cart']['info']['total_qty'];
        $total_price = $_SESSION['cart']['info']['total_price'];

        //Gán dữ liệu vào đối tượng trả về
        $result = array(
            'sub_total' => current_format($sub_total),
            'total_price' => current_format($total_price),
            'total_qty' => $total_qty
        );
    }
    
    echo json_encode($result);
}


function checkoutAction()
{

    $data['user'] = get_user_db($_SESSION['user_id']);
    load_view("checkout", $data);
    if (isset($_POST['btn_checkout'])) {
        $error = array();

        #email
        if (empty($_POST['email'])) {
            $error['email'] = "Email giúp bạn cập nhật tình trạng đơn hàng";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Bạn có thể sử dụng định dạng email như mẫu sau example@email.com";
            } else {
                $email = $_POST['email'];
            }
        }

        #address
        if (empty($_POST['address'])) {
            $error['address'] = "Địa chỉ chính xác có thể giúp bạn nhận đơn hàng trong thời gian ngắn nhất";
        } else {
            $address = $_POST['address'];
        }

        #phone
        if (empty($_POST['phone'])) {
            $error['phone'] = "Nếu bạn thay đổi số điện thoại, đừng ngần ngại nói với chúng tôi nhé.";
        } else {
            if (!is_phone_number($_POST['phone'])) {
                $error['phone'] = "SĐT hiện nay có số lượng trong khoảng 10 đến 11 số, các đầu số đang hiện hành 09, 08, 012, 016, 018, 019";
            } else {
                $phone = $_POST['phone'];
            }
        }

        #note
        if (empty($_POST['note'])) {
            $note = "";
        } else {
            $note = $_POST['note'];
        }


        #payment
        if (empty($_POST['payment-method'])) {
            $error['payment-method'] = "HELLU NGƯỜI AE";
        } else {
            $payment_method = $_POST['payment-method'];
        }

        //---------------Kết luận
        if (empty($error)) {
            $info_order = array(
                'users_id' => (int)$_SESSION['user_id'],
                'fullname' => $data['user']['fullname'],
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'note' => $note,
                'payment' => $payment_method,
                'order_time' => time(),
                'status' => 'processing',
            );
            if ($id_insert = insert_product_order($_SESSION['user_id'], $info_order)) {
                //Xóa giỏ hàng đợi sau khi đặt hàng thành công(hàm dưới
                // chỉ nên sử dụng cho hệ thống không chọn 1 trong những
                // sản phẩm trong cart chuyển thành order)
                delete_all_product_cart_db($_SESSION['user_id']);
                unset($_SESSION['cart']);
                /*Gửi email ở đây sau khi đặt hàng thành công
                ... server email hỗ trợ
                */

                $info_order_email = get_order_by_id($id_insert);

                $order_code = $info_order_email[0]['order_code'];
                $order_fullname = $info_order_email[0]['fullname'];
                $order_phone = $info_order_email[0]['phone'];
                $order_address = $info_order_email[0]['address'];
                $content  = "<h2>Chào bạn <b>{$order_fullname}</b> . Bạn vui lòng kiểm tra lại thông tin đơn hàng vừa đặt ở UNISMART</h2><hr>";

                $content .= "<h3>Thông tin cá nhân</h3>";
                $content .= "<p>Mã đơn hàng <b>{$order_code}</b></p>";
                $content .= "<p>Tên khách hàng <b>{$order_fullname}</b></p>";
                $content .= "<p>Số điện thoại liên lạc <b>{$order_phone}</b></p>";
                $content .= "<p>Địa chỉ nhận hàng <b>{$order_address}</b></p><br><hr><br>";


                $content .= "<h3>Thông tin về sản phẩm vừa đặt</h3>";
                foreach ($info_order_email as $order_email) {
                    $content .= "<p>" . $order_email['name'] . "|" . $order_email['price'] . "<b>x</b>" . $order_email['qty'] . "<b>=</b>" . ($order_email['price'] * $order_email['qty']);
                }

                $content .= "<br><hr><br><p>Chúng tôi thực sự biết ơn bạn vì đã chọn chúng tôi làm nhà cung cấp dịch vụ và cho chúng tôi cơ hội phát triển. Không có thành tựu nào của chúng tôi có thể đạt được nếu không có bạn và sự hỗ trợ vững chắc của bạn<p>";
                $content .= "<p style='color:red;'>Nếu có bất kỳ thắc mắc nào về đơn hàng trên thì hãy liên hệ với TEAM SUPPORT qua hotline : <b>0764710821</b></h3>";

                load('lib', 'sendmail');
                global $server_setting;
                sendMailEasy($server_setting, $email, $_SESSION['user_login'], "Chúc mừng bạn đã đặt hàng thành công", $content);
                header("Location: ?mod=cart&action=thank");
            }
        } else {
            show_array($error);
        }
        //-----------------------
    }
}


function thankAction()
{
    load_view('thank');
}
