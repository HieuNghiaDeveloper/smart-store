<?php
get_header();
global $list_category;
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
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">

                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo set_value('product_name') ?>">
                        <?php echo form_error('product_name') ?>

                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="code" id="product-code" value="<?php echo set_value('code') ?>" disabled='disabled'>
                        <?php echo form_error('code') ?>

                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?php echo set_value('price') ?>">
                        <?php echo form_error('price') ?>

                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"><?php echo set_value('desc') ?></textarea>
                        <?php echo form_error('desc') ?>

                        <label for="content">Chi tiết</label>
                        <textarea name="content" id="content" class="ckeditor"><?php echo set_value('content') ?></textarea>
                        <?php echo form_error('content') ?>

                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="product_images[]" id="upload-thumb" multiple="">
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->
                            
                            <img src="public/images/img-thumb.png">
                        </div>
                        <?php echo form_error('product_images') ?>

                        <label>Danh mục sản phẩm</label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            <?php if(!empty($list_category)){
                                foreach($list_category as $category){
                                ?>
                                    <option value="<?php echo $category['cat_id'] ?>" <?php if($category['parent_id'] == 0) echo "disabled = 'disabled'" ?>><?php echo str_repeat("-- ", $category['level']) . $category['title'] ?></option>
                                <?php
                                }
                            } ?>
                        </select>
                        <?php echo form_error('cat_id') ?>
                        <!-- <label>Trạng thái</label> -->
                        <!-- <select name="status">
                            <option value="0">-- Chọn danh mục --</option>
                            <option value="1">Chờ duyệt</option>
                            <option value="2">Đã đăng</option>
                        </select> -->

                        <button type="submit" name="btn_add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>