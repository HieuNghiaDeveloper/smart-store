<!DOCTYPE html>
<html>

<head>
    <title>Quản lý phamhuuphuoc.com</title>
    <base href="<?php global $config;
                echo $config['base_url']; ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />

    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/plugins/ckeditor/ckeditor.js"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
</head>

<body>
    <style>
        .deep{
            opacity: 0.5!important;
            pointer-events:none;
        }
    </style>
    <div id="site">
        <div id="container" class="" deep="<?php if(isset($_SESSION['deep']) and $_SESSION['deep'] == "deep") { echo "deep"; } ?>">
            <div id="header-wp">
                <div class="wp-inner clearfix">
                    <a href="?" title="" id="logo" class="fl-left">ADMIN</a>
                    <!-- ----------------------------------------------- -->

                    <ul id="main-menu" class="fl-left">
                        <!-- POST -->
                        <!-- <li>
                            <a href="?mod=post&action=index" title="">Bài viết</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=post&action=add">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?mod=post&action=index">Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="?mod=post&controller=cat&action=index">Danh mục bài viết</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- PAGE -->
                        <!-- <li>
                            <a href="?mod=page&action=index">Trang</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=page&action=add">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?mod=page&action=index" title="">Danh sách trang</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- PRODUCT -->
                        <li>
                            <a href="?mod=product&action=index">Sản phẩm</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=product&action=add">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?mod=product&action=index">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?mod=product&controller=cat&action=index">Danh mục sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?mod=product&controller=brand&action=index">Thương hiệu sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <!-- ORDER -->
                        <li>
                            <a href="?mod=order&action=order" title="">Bán hàng</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=order&action=order" title="">Danh sách đơn hàng</a>
                                </li>
                                <!-- <li>
                                    <a href="?mod=order&action=customer" title="">Danh sách khách hàng</a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- MENU -->
                        <!-- <li>
                            <a href="?mod=widget&action=menu">Menu</a>
                        </li> -->
                    </ul>



                    <!-- ------------------------------------- -->
                    <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                        <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <div id="thumb-circle" class="fl-left">
                                <img src="public/images/img-admin.png">
                            </div>
                            <h3 id="account" class="fl-right"><?php if (empty($_SESSION['is_login'])) {
                                                                    echo "Admin";
                                                                } else {
                                                                    echo $_SESSION['user_login'];
                                                                } ?></h3>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="?mod=users&action=update_info" title="Thông tin cá nhân">My Account</a></li>
                            <li><a href="?mod=users&action=logout" title="Thoát">Thoát</a></li>
                        </ul>
                    </div>
                </div>
            </div>