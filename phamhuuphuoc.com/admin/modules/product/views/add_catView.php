<?php
get_header();
global $list_category;
?>

<style>
    .new-cat {
        font-weight: bold;
    }

    p.error {
        color: red;
        font-size: 13px;
        margin-top: -15px;
        margin-bottom: 10px;
    }
</style>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">

                        <label for="title">Tên danh mục</label>
                        <input type="text" name="title" id="title">
                        <?php echo form_error('title') ?>

                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <?php echo form_error('slug') ?>

                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc" class="ckeditor"></textarea>
                        <?php echo form_error('desc') ?>

                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="cat_thumb" id="upload-thumb">
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->
                            <img src="public/images/img-thumb.png">
                        </div>
                        <?php echo form_error('cat_thumb') ?>

                        <label>Danh mục chính</label>
                        <select name="parent_id">
                            <option value="">--- Chọn danh mục ---</option>
                            <option value="9999" class="new-cat">Danh mục chính mới</option>
                            <?php if (!empty($list_category)) {
                                foreach ($list_category as $category) {
                            ?>
                                    <option value="<?php echo $category['cat_id'] ?>"><?php echo str_repeat('--- ', $category['level']) . $category['title']; ?></option>
                            <?php
                                }
                            } ?>
                        </select>
                        <?php echo form_error('parent_id') ?>

                        <button type="submit" name="btn_add" id="btn-submit">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
?>