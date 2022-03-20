<?php
get_header();
?>
<div id="main-content-wp" class="detail-product-page clearfix">
    <div class="wp-inner clearfix">
        <?php
        get_sidebar();
        ?>

        <?php if (!empty($product)) {
        ?>
            <div id="content" class="fl-right">
                <div class="section" id="info-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb fl-left">
                            <img src="admin/<?php echo $product['url'] ?>" alt="">
                        </div>
                        <div class="detail fl-right">
                            <h3 class="title"><?php echo $product['name'] ?></h3>
                            <p class="price"><?php echo current_format($product['price']) ?></p>
                            <p class="product-code">Mã sản phẩm: <span><?php echo $product['code'] ?></span></p>
                            <div class="desc-short">
                                <h5>Mô tả sản phẩm:</h5>
                                <p><?php echo html_entity_decode($product['desc']) ?></p>
                            </div>
                            <div class="num-order-wp">
                                <span>Số lượng:</span>
                                <input type="text" id="num-order" name="num-order" value="1">
                                <a href="?mod=cart&action=add&id=<?php echo $product['product_id'] ?>"class="add-to-cart">Thêm giỏ hàng</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="section" id="desc-wp">
                    <div class="section-head">
                        <h3 class="section-title">Chi tiết sản phẩm</h3>
                    </div>
                    <div class="section-detail">
                        <?php echo html_entity_decode($product['content']) ?>
                    </div>
                </div>
            </div>
        <?php
        } ?>

    </div>
</div>
<?php
get_footer();
?>