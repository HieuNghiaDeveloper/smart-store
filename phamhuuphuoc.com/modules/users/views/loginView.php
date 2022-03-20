<?php
get_header();
global $error;
?>


<div id="main-content-wp" class="detail-news-page">
    <div class="wp-inner clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <style>
                .login{
                    display: flex;
                    flex-wrap: wrap;
                    min-height: 0!important;
                    margin-bottom: 300px;
                    
                }
                .login-head{
                    flex-basis: 100%;
                    display: flex;
                    justify-content: center;
                }
                .login-foot{
                    flex-basis: 100%;
                    display: flex;
                    flex-wrap: wrap;
                    text-align: center;
                }
                .login-foot form{
                    flex-basis: 100%;
                }
                .login-foot form input:not(#remember-me){
                    text-align: center;
                    /* display: block; */
                    margin-bottom: 20px;
                }
                .login-foot form input#login{
                    margin-top: 20px;
                    padding: 0 62px;
                }
                .login-foot form label#label-remember-me{
                    display: inline-block;
                }
                .login-foot a#lost_pass{
                    flex-basis: 100%;

                }
                p.error{
                    flex-basis: 100%;
                    font-size: 15px;
                    color: red;
                    text-align: center;
                    margin-bottom: 20px;
                }
            </style>
            <div class="section login" id="detail-news-wp">
                <div class="section-head login-head">
                    <h3 class="section-title">Đăng nhập</h3>
                </div>
                <div class="section-detail login-foot">
                    <?php echo form_error('acc_not_exist'); ?>
                    <form method="post" id="login-to-the-world">
                        <input type="text" name="username" id="username" placeholder="Username" value=""><br>

                        <input type="password" name="password" id="password" placeholder="Password">

                        <div class="remember">
                            <input type="checkbox" name="remember_me" id="remember-me">
                            <label for="remember-me" id="label-remember-me">Ghi nhớ đăng nhập</label>
                        </div>
                        <input type="submit" value="Login" name="btn_login" id="login">
                    </form>
                    <a href="?mod=users&action=login_reg" id="lost_pass">Đăng nhập bằng tài khoản Google</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
get_footer();
?>