<?php
get_header();
?>

<style>
    .h3_update{
        font-weight: 600;
        font-size: 25px;
        padding: 20px;
        text-align: center;
        text-transform: uppercase;
        color: #4fa327;
        margin-right: 100px;
    }
    p.error{
        font-size: 11px;
        color: red;
        margin-top: -10px;
        margin-bottom: 10px;
        padding-left: 12px;
        font-weight: bold;
    }
</style>
<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <?php
        get_sidebar('admin');
        ?>
        <h3 class="h3_update">Thông tin và Cập nhật</h3>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="display_name" id="display-name" value="<?php echo set_value('display_name') ?>">
                        <?php echo form_error('display_name') ?>

                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" disabled="disabled" value="<?php echo set_value('username') ?>">
                        <?php echo form_error('username') ?>

                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" disabled="disabled" value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email') ?>
                        
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone" id="tel" value="<?php echo set_value('phone') ?>">
                        <?php echo form_error('phone') ?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address" placeholder="Bạn muốn cập nhật địa chỉ mới?"><?php echo set_value('address') ?></textarea>
                        <?php echo form_error('address') ?>

                        <button type="submit" name="btn_update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
?>