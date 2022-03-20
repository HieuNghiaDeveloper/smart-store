<?php
get_header();
?>

<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <!-- <div class="clearfix">
            <a href="?mod=users&action=add" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thông tin ADMIN</h3>
        </div> -->
    </div>
    <div class="wrap clearfix">
        <?php 
        get_sidebar('admin');
        ?>
    </div>
</div>


<?php
get_footer();
?>