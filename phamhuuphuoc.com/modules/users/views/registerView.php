<?php
get_header();
//Đã lấy được những trường(data) bên indexController ở hàm registerAction()

?>


<div id="main-content-wp" class="checkout-page ">
    <div class="wp-inner clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="checkout-wp">
                <div class="section-head">
                    <h3 class="section-title">Đăng ký tài khoản</h3>
                </div>
                <div class="section-detail">
                    <div class="wrap clearfix">
                        <form method="POST">
                            <div id="custom-info-wp" class="fl-left">
                                <h3 class="title">Thông tin cần thiết cho lần mua hàng kế tiếp</h3>
                                <div class="detail">
                                    <!-- --------------------------------------------------------------------------------------------- -->
                                    <div class="field-wp">
                                        <label>Họ tên</label>
                                        <input type="text" name="fullname" id="fullname" value="<?php if (!empty($fullname)) echo $fullname; ?>">
                                        <?php if (!empty($error['fullname'])) echo "<p class='error_form'>{$error['fullname']}</p>" ?>
                                    </div>
                                    <div class="field-wp">
                                        <label>Tên tài khoản</label>
                                        <input type="text" name="username" id="username" value="<?php if (!empty($username)) echo $username; ?>">
                                        <?php if (!empty($error['username'])) echo "<p class='error_form'>{$error['username']}</p>" ?>
                                    </div>
                                    <div class="field-wp">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" id="password">
                                        <?php if (!empty($error['password'])) echo "<p class='error_form'>{$error['password']}</p>" ?>
                                    </div>

                                    <div class="field-wp">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" value="<?php if (!empty($email)) echo $email; ?>">
                                        <?php if (!empty($error['email'])) echo "<p class='error_form'>{$error['email']}</p>" ?>
                                    </div>
                                    <div class="field-wp">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="phone" id="phone" value="<?php if (!empty($phone)) echo $phone; ?>">
                                        <?php if (!empty($error['phone'])) echo "<p class='error_form'>{$error['phone']}</p>" ?>
                                    </div>
                                    <div class="field-wp">
                                        <label>Giới tính</label>
                                        <select name="gender" id="gender">
                                            <option value="">--Chọn--</option>
                                            <option value="male" <?php if (!empty($_POST['gender']) and $_POST['gender'] == 'male') echo "selected='selected'"; ?>>Nam</option>
                                            <option value="female" <?php if (!empty($_POST['gender']) and $_POST['gender'] == 'female') echo "selected='selected'"; ?>>Nữ</option>
                                        </select>
                                        <?php if (!empty($alert['gender'])) echo "<p class='error_form alert_form'>{$alert['gender']}</p>" ?>
                                    </div>
                                    <div class="field-wp margin_submit">
                                        <label>Địa chỉ nhận hàng</label>
                                        <input type="text" name="address" id="address" value="<?php if (!empty($address)) echo $address; ?>">
                                        <?php if (!empty($error['address'])) echo "<p class='error_form'>{$error['address']}</p>" ?>
                                    </div>

                                    <div id="register_input" class="clearfix">
                                        <input type="submit" name="btn_register" id="register" value="Đăng ký">
                                    </div>
                                    <!-- --------------------------------------------------------------------------------------------- -->


                                </div>
                            </div>



                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<?php
if (!empty($alert['success'])) {
}
get_footer();
?>