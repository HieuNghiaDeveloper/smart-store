<?php
get_header();
global $list_product;
?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=product&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php if(!empty($list_product)) { echo count($list_product); }else  { echo 0; } ?>)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(<?php if(!empty($list_product)) { echo count($list_product); }else  { echo 0; } ?>)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <?php if (!empty($list_product)) {
                            ?>
                                <tbody>

                                    <?php
                                    $index = 1;
                                    foreach ($list_product as $product) {
                                    ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $index; ?></h3></span>
                                            <td><span class="tbody-text"><?php echo $product['code'] ?></h3></span>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <?php if (empty($product['url'])) {
                                                    ?>
                                                        <img src="public/images/img-product.png" alt="">
                                                    <?php
                                                    }else{
                                                    ?>
                                                        <img src="<?php echo $product['url'] ?>" alt="">
                                                    <?php
                                                    } ?>
                                                </div>
                                            </td>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $product['name'] ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=product&controller=index&action=update&id=<?php echo $product['product_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="?mod=product&controller=index&action=delete&id=<?php echo $product['product_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo current_format($product['price']) ?></span></td>
                                            <td><span class="tbody-text"><?php echo $product['category_title'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $product['status'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $product['creator'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo timestamp_to_date_format($product['creation_time']) ?></span></td>
                                        </tr>
                                    <?php
                                        $index++;
                                    } ?>

                                </tbody>
                            <?php
                            } ?>


                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <!-- <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title="">
                                <</a>
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