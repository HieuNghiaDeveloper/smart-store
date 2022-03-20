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
        margin-top: -15px;
        font-size: 12px;
        color: red;
        margin-bottom: 15px;
    }

    p.error_password{
        font-size: 14px;
        color: red;
        text-align: center;
        margin-right: 100px;
        font-weight: bold;
    }
    p.success{
        font-size: 14px;
        color: green;
        text-align: center;
        margin-right: 100px;
        font-weight: bold;
    }
</style>
<div id="main-content-wp" class="change-pass-page">
    <div class="wrap clearfix">
        <?php get_sidebar('admin'); ?>
        <h3 class="h3_update">Cập nhật mật khẩu</h3>
        <?php echo form_error('error_password') ?>
        <?php echo form_success('success') ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="pass-old">Mật khẩu cũ</label>
                        <input type="password" name="old_password" id="pass-old">
                        <?php echo form_error('old_password') ?>


                        <label for="pass-new">Mật khẩu mới</label>
                        <input type="password" name="new_password" id="pass-new">
                        <?php echo form_error('new_password') ?>
                        

                        <label for="confirm-pass">Xác nhận mật khẩu mới</label>
                        <input type="password" name="re_password" id="confirm-pass">
                        <?php echo form_error('re_password') ?>
                        

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