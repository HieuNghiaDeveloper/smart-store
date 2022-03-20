<?php
get_header();
?>

<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Giỏ hàng</h3>
            </div>
        </div>
    </div>


    <div id="wrapper" class="wp-inner clearfix">

        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <?php if (!empty($_SESSION['cart']['buy'])) {
                ?>
                    <table class="table">
                        <!-- table_header -->
                        <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                                <td>Thao tác</td>
                            </tr>
                        </thead>
                        <?php foreach ($_SESSION['cart']['buy'] as $item) {
                        ?>
                            <!-- table_middle -->
                            <tbody>
                                <tr>
                                    <!-- code sản phẩm -->
                                    <td><?php echo $item['code'] ?></td>
                                    <!-- hình ảnh sản phẩm(có thẻ a) -->
                                    <td>
                                        <a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>" class="thumb">
                                            <img src="admin/<?php echo $item['url'] ?>" alt="">
                                        </a>
                                    </td>
                                    <!-- tên sản phẩm(có thẻ a) -->
                                    <td class="product_name_width">
                                        <a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>" class="name-product"><?php echo $item['name'] ?></a>
                                    </td>
                                    <!-- giá tiền 1 sản phẩm -->
                                    <td><?php echo current_format($item['price']) ?></td>
                                    <!-- số lượng sản phẩm(thẻ input) -->
                                    <td>
                                        <input type="number" min="1" user-id="<?php echo $_SESSION['user_id'] ?>" product-id="<?php echo $item['product_id'] ?>" name="num-order" value="<?php echo $item['qty'] ?>" class="num-order">
                                    </td>
                                    <!-- tổng tiền sản phẩm(qty * price) -->
                                    <td colspan="2" class="sub-total-<?php echo $item['product_id'] ?>"><?php echo current_format($item['sub_total']) ?></td>
                                    <!-- xóa sản phẩm(có thẻ a) -->
                                    <td>
                                        <a href="?mod=cart&action=delete&id=<?php echo $item['product_id'] ?>" class="del-product"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        } ?>
                        <!-- table_footer -->
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span><?php echo current_format($_SESSION['cart']['info']['total_price']) ?></span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <a href="?mod=cart&action=checkout" title="" id="checkout-cart">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                <?php
                } else {
                    echo "<p class='empty-cart'>Giỏ hàng đang trống</p><a href='?' class='empty-cart'>Mua ngay</a>";
                } ?>
            </div>
        </div>

        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <a href="?" title="" id="buy-more">Mua tiếp</a><br />
                <a href="?mod=cart&action=delete_all" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>

</div>


<?php
get_footer();
?>