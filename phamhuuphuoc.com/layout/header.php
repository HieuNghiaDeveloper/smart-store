<!DOCTYPE html>
<html>

<head>
    <title>Smart Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />

    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
    <script src="public/js/cart.js" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp" class="clearfix">
                <div class="wp-inner">
                    <a href="?" title="" id="logo" class="fl-left">SMART STORE</a>
                    <div id="say-hi">
                        <?php if (isset($_SESSION['is_login'])) {
                            echo "<p>Xin chào <strong>{$_SESSION['user_login']}</strong></p><a href='?mod=users&action=logout' id='logout'>Thoát</a>";
                        }else{
                            echo "<a href='?mod=users&action=login' id='login'>Đăng nhập</a>  |  <a href='?mod=users&action=register' id='register'>Đăng ký</a>";
                        } ?>
                    </div>
                    <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <div id="cart-wp" class="fl-right">
                        <a href="?mod=cart&action=index" title="" id="btn-cart">
                            <span id="icon"><img src="public/images/icon-cart.png" alt=""></span>
                            <span id="num"><?php if (isset($_SESSION['cart']['info']['total_qty'])) {
                                                echo $_SESSION['cart']['info']['total_qty'];
                                            } else {
                                                echo 0;
                                            } ?></span>
                        </a>
                    </div>
                </div>
            </div>