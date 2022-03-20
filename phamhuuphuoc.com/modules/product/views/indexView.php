<?php
get_header();
?>


<div id="main-content-wp" class="category-product-page">
    <div class="wp-inner clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title">LAPTOP</h3>
                    <p class="section-desc">Có <?php if(!empty($list_product)){echo count($list_product);}else{echo 0;} ?> sản phẩm trong mục này</p>
                </div>


                <!-- Danh sách sản phẩm theo cat_id -->
                <div class="section-detail">
                    <?php if (!empty($list_product)) {
                    ?>
                        <ul class="list-item clearfix">
                            <?php foreach ($list_product as $product) {
                            ?>
                                <li>
                                    <a href="?mod=product&action=detail&id=<?php echo $product['product_id'] ?>">
                                        <img src="admin/<?php echo $product['url'] ?>" alt="">
                                    </a>
                                    <a href="?mod=product&action=detail&id=<?php echo $product['product_id'] ?>" class="title"><?php echo $product['name'] ?></a>
                                    <p class="price"><?php echo current_format($product['price']) ?></p>
                                </li>
                            <?php
                            } ?>

                        </ul>
                    <?php
                    } ?>
                </div>



            </div>
            <!-- <div class="section" id="pagenavi-wp">
                <div class="section-detail">
                    <ul id="list-pagenavi">
                        <li class="active">
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                    <a href="" title="" class="next-page"><i class="fa fa-angle-right"></i></a>
                </div>
            </div> -->
        </div>
    </div>
</div>


<?php
get_footer();
?>