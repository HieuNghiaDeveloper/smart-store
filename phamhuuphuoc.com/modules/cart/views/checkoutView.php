<?php
get_header();
?>


<div id="main-content-wp" class="checkout-page ">
    <div class="wp-inner clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">



            <div class="section" id="checkout-wp">
                <div class="section-head">
                    <h3 class="section-title">Thanh toán</h3>
                </div>

                <div class="section-detail">
                    <div class="wrap clearfix">





                        <form method="POST">
                            <div id="custom-info-wp" class="fl-left">
                                <h3 class="title">Thông tin khách hàng</h3>
                                <div class="detail">
                                    <div class="field-wp">
                                        <label>Họ tên</label>
                                        <input type="text" name="fullname" disabled="disabled" id="fullname" value="<?php if (!empty($user['fullname'])) echo $user['fullname']; ?>">
                                    </div>
                                    <div class="field-wp">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" value="<?php if (!empty($user['email'])) echo $user['email']; ?>">
                                    </div>
                                    <div class="field-wp">
                                        <label>Địa chỉ nhận hàng</label>
                                        <input type="text" name="address" id="address" value="<?php if (!empty($user['address'])) echo $user['address']; ?>">
                                    </div>
                                    <div class="field-wp">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="phone" id="phone" value="<?php if (!empty($user['phone'])) echo $user['phone']; ?>">
                                    </div>
                                    <div class="field-full-wp">
                                        <label>Ghi chú</label>
                                        <textarea name="note" placeholder="Ví dụ như : Giao hàng lúc mấy giờ, địa chỉ chính xác, ..."></textarea>
                                    </div>

                                </div>
                            </div>


                            <div id="order-review-wp" class="fl-right">
                                <h3 class="title">Thông tin đơn hàng</h3>
                                <div class="detail">
                                    <table class="shop-table">
                                        <thead>
                                            <tr>
                                                <td>Sản phẩm</td>
                                                <td>Tổng</td>
                                            </tr>
                                        </thead>
                                        <?php if (!empty($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart']['buy'] as $product) {
                                        ?>
                                                <tbody>
                                                    <tr class="cart-item">
                                                        <td class="product-name"><?php echo $product['name'] ?><strong class="product-quantity">x <?php echo $product['qty'] ?></strong></td>
                                                        <td class="product-total"><?php echo current_format($product['price']) ?></td>
                                                    </tr>
                                                </tbody>
                                        <?php
                                            }
                                        } ?>

                                        <tfoot>
                                            <tr class="order-total">
                                                <td>Tổng đơn hàng:</td>
                                                <td><strong class="total-price"><?php echo current_format($_SESSION['cart']['info']['total_price']) ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div id="payment-checkout-wp">
                                        <ul id="payment_methods">
                                            <li>
                                                <input type="radio" id="payment-home" name="payment-method" value="cod" checked="checked">
                                                <label for="payment-home">Thanh toán tại nhà</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="direct-payment" name="payment-method" value="store">
                                                <label for="direct-payment">Thanh toán tại cửa hàng</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="place-order-wp clearfix">
                                        <button type="submit" name="btn_checkout">Đặt hàng</button>
                                    </div>
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
get_footer();
?>