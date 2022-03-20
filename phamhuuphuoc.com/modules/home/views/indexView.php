<?php
get_header();
?>

<style>
    #list-category>a {
        margin-right: 25px;
    }
</style>
<div id="main-content-wp" class="home-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar() ?>

        <div id="content" class="fl-right">
            <?php if (!empty($list_category)) {
            ?>
                <div id="list-category">
                    <?php
                    foreach ($list_category as $category) {
                    ?>
                        <a href="?type=<?php echo $category['cat_id'] ?>"><?php echo $category['title'] ?></a>
                    <?php
                    }
                    ?>
                </div>
            <?php
            } ?>
            <?php if (!empty($list_product)) {
            ?>
                <div class="section list-cat">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <?php foreach ($list_product as $product) {
                            ?>
                                <li>
                                    <a href="?mod=product&action=detail&id=<?php echo $product['product_id'] ?>" class="thumb">
                                        <img src="admin/<?php echo $product['url'] ?>" alt="">
                                    </a>
                                    <a href="?mod=product&action=detail&id=<?php echo $product['product_id'] ?>" class="title"><?php echo $product['name'] ?></a>
                                    <p class="price"><?php echo current_format($product['price']) ?></p>
                                </li>
                            <?php
                            } ?>
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