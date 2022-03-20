<?php
get_header();
global $list_category, $cat_id;
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <?php echo form_error('add_failed') ?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">

                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo set_value('product_name') ?>" disabled='disabled'>

                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="code" id="product-code" value="<?php echo set_value('code') ?>" disabled='disabled'>

                        <label>Hình ảnh</label>
                        <div class="thumb" style="display: flex; justify-content: center;">
                            <img src="<?php echo set_value('url') ?>" alt="" width="300" height="300">

                        </div>
                        <br><br>

                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?php echo set_value('price') ?>">
                        <?php echo form_error('price') ?>

                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"><?php echo set_value('desc') ?></textarea>
                        <?php echo form_error('desc') ?>

                        <label for="content">Chi tiết</label>
                        <textarea name="content" id="content" class="ckeditor"><?php echo set_value('content') ?></textarea>
                        <?php echo form_error('content') ?>

                        <label>Danh mục sản phẩm</label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            <?php if (!empty($list_category)) {
                                foreach ($list_category as $category) {
                            ?>
                                    <option <?php if ($category['cat_id'] == $cat_id) echo "selected='selected'" ?> value="<?php echo $category['cat_id'] ?>" <?php if ($category['parent_id'] == 0) echo "disabled = 'disabled'" ?>><?php echo str_repeat("-- ", $category['level']) . $category['title'] ?></option>
                            <?php
                                }
                            } ?>
                        </select>
                        <?php echo form_error('cat_id') ?>

                        <button type="submit" name="btn_update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>