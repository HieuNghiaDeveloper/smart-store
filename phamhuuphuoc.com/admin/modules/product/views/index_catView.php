<?php
get_header();
global $list_category;
?>


<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh mục sản phẩm</h3>
                    <a href="?mod=product&controller=cat&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">

                        <table class="table list-table-wp">
                            <?php if (!empty($list_category)) {
                            ?>
                                <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Thứ tự</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $index = 1;
                                    foreach ($list_category as $category) {
                                    ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $index ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo str_repeat('--- ', $category['level']) . $category['title'] ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=product&controller=cat&action=update&cat_id=<?php echo $category['cat_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="?mod=product&controller=cat&action=delete&cat_id=<?php echo $category['cat_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $category['parent_id'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $category['status'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $category['creator'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo timestamp_to_date_format($category['creation_time']) ?></span></td>
                                        </tr>
                                    <?php
                                        $index++;
                                    } ?>
                                </tbody>
                                <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                            <?php
                            }else{
                                echo "<p>Danh mục sản phẩm hiện đang trống<p>";
                            } ?>
                        </table>

                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <!-- <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>