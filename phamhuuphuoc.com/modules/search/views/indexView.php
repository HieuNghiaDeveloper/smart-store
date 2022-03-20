<?php
get_header();
global $status_order;
?>

<style>
    .section-result{
        display: flex;
    }
    .section-result p{
        padding: 5px 5px;
    }
    .box-left{
        padding-right: 20px;
        border-right: 1px solid silver;
    }
    .box-right{
        padding-left: 20px;
    }
    span.status {
        background: blue;
        padding: 6px;
        color: #fff;
        border-radius: 4px;
    }

    span.processing {
        background: #fff000;
        color: #333;
    }

    span.cancelled {
        background: #ff3f34;
    }

    span.transported {
        background: #ffa502;
    }

    span.successful {
        background: #4cd137;
    }

    input {
        padding: 4px;
    }

    input#search {
        width: 220px;
    }

    p.error {
        color: red;
        font-size: 13px;
    }
</style>
<div id="main-content-wp" class="detail-news-page">
    <div class="wp-inner clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-news-wp">
                <div class="section-head">
                    <h3 class="section-title">Tra cứu tình trạng đơn hàng</h3>
                </div>

                <div class="section-detail">
                    <form action="" method="POST">
                        <?php echo form_error('search') ?>
                        <input id="search" type="text" name="search" placeholder="Mời bạn nhập mã đơn hàng">
                        <input type="submit" value="Tra cứu" name="btn_search">
                    </form>
                </div>
                <br>
                <hr><br>
                <?php if (!empty($status_order)) {
                ?>
                    <div class="section-result">
                        <div class="box-left">
                            <p>Mã đơn hàng</p>
                            <p>Tên khách hàng</p>
                            <p>Số điện thoại liên lạc</p>
                            <p>Địa chỉ nhận hàng</p>
                            <p>Quá trình giao hàng</p>
                            <p>Tình trạng đơn hàng của bạn</p>
                        </div>
                        <div class="box-right">
                            <p><?php echo $status_order['order_code'] ?></p>
                            <p><?php echo $status_order['fullname'] ?></p>
                            <p><?php echo $status_order['phone'] ?></p>
                            <p><?php echo $status_order['address'] ?></p>
                            <p>
                                <span class="status processing">Đang xử lý</span>
                                <span class="status cancelled">Đã hủy</span>
                                <span class="status transported">Đang vận chuyển</span>
                                <span class="status successful">Giao hàng thành công</span>
                            </p>
                            <p>
                                <span class="status <?php echo $status_order['status'] ?>"><?php echo convert_status($status_order['status']) ?></span>
                            </p>
                            <p></p>

                        </div>
                    </div>
                <?php
                } ?>

            </div>
        </div>
    </div>
</div>


<?php
get_footer();
?>