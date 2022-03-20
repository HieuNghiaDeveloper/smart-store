<?php
get_header();
?>
<style>
    .bg-whitesmoke {
        border: none;
        outline: none;
    }

    input.input-status {
        padding: 4.5px 10px !important;
    }

    select.status {
        padding: 7px 0px 7px 7px !important;
    }

    select option {
        background: white;
        color: #000;
    }

    select.processing {
        background: #fff000;
        color: #333 !important;
    }

    select.cancelled {
        background: #ff3f34;
        color: #fff !important;
    }

    select.transported {
        background: #ffa502;
        color: #fff !important;
    }

    select.successful {
        background: #4cd137;
        color: #fff !important;
    }
</style>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="detail-exhibition fl-right">
            <?php if (!empty($info_order)) {
            ?>
                <div class="section" id="info">
                    <div class="section-head">
                        <h3 class="section-title">Thông tin đơn hàng</h3>
                    </div>
                    <ul class="list-item">
                        <li>
                            <h3 class="title">Mã đơn hàng</h3>
                            <span class="detail">PHP-<?php echo $info_order['order_id'] ?></span>
                        </li>
                        <li>
                            <h3 class="title">Địa chỉ nhận hàng</h3>
                            <span class="detail"><?php echo $info_order['address'] ?></span>
                        </li>
                        <li>
                            <h3 class="title">Thông tin vận chuyển</h3>
                            <span class="detail"><?php echo convert_payment($info_order['payment']) ?></span>
                        </li>
                        <li>
                            <h3 class="title">Thời gian đặt hàng</h3>
                            <span class="detail">Ngày : <?php echo timestamp_to_date_format($info_order['order_time']) ?> || Lúc <?php echo timestamp_to_date_format_($info_order['order_time']) ?></span>
                        </li>
                        <form method="POST" action="">
                            <li>
                                <h3 class="title">Tình trạng đơn hàng</h3>
                                <select name="status" class="status <?php echo $info_order['status'] ?>">
                                    <option value='processing' <?php if ($info_order['status'] == 'processing') {
                                                                    echo "selected='selected' class='processing'";
                                                                } ?>>Đang xử lý</option>
                                    <option value='cancelled' <?php if ($info_order['status'] == 'cancelled') {
                                                                    echo "selected='selected' class='cancelled'";
                                                                } ?>>Đã hủy</option>
                                    <option value='transported' <?php if ($info_order['status'] == 'transported') {
                                                                    echo "selected='selected' class='transported'";
                                                                } ?>>Đang vận chuyển</option>
                                    <option value="successful" <?php if ($info_order['status'] == 'successful') {
                                                                    echo "selected='selected' class='successful'";
                                                                } ?>>Giao hàng thành công</option>
                                </select>
                                <input class="input-status" type="submit" name="btn_status" value="Cập nhật đơn hàng">
                            </li>
                        </form>
                    </ul>
                </div>
                <br><hr><br>
            <?php
            } ?>


            <?php if (!empty($list_order)) {
            ?>
                <div class="section">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm đơn hàng</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table info-exhibition">
                            <thead>
                                <tr>
                                    <td class="thead-text">#</td>
                                    <td class="thead-text">Ảnh sản phẩm</td>
                                    <td class="thead-text">Tên sản phẩm</td>
                                    <td class="thead-text">Đơn giá</td>
                                    <td class="thead-text">Số lượng</td>
                                    <td class="thead-text">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                foreach ($list_order as $order) {
                                ?>
                                    <tr <?php if ($index % 2 == 1) {
                                            echo "class='bg-whitesmoke'";
                                        } ?>>
                                        <td class="thead-text"><?php echo $index; ?></td>
                                        <td class="thead-text">
                                            <div class="thumb">
                                                <img src="<?php echo $order['url'] ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="thead-text"><?php echo $order['name'] ?></td>
                                        <td class="thead-text"><?php echo current_format($order['price'], "VND") ?></td>
                                        <td class="thead-text"><?php echo $order['qty'] ?></td>
                                        <td class="thead-text"><?php echo current_format($order['price'] * $order['qty'], "VND") ?></td>
                                    </tr>
                                <?php
                                    $index++;
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <br><hr><br>
            <?php
            } ?>


            <?php if (!empty($total_order)) {
            ?>
                <div class="section">
                    <h3 class="section-title">Giá trị đơn hàng</h3>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <span class="total-fee">Tổng số lượng</span>
                                <span class="total">Tổng đơn hàng</span>
                            </li>
                            <li>
                                <span class="total-fee"><?php echo $total_order['total_qty'] ?></span>
                                <span class="total"><?php echo current_format($total_order['total_price'], " VND") ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php
            } ?>

        </div>
    </div>
</div>
<?php
get_footer();
?>