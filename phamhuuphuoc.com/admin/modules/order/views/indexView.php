<?php
get_header();
?>
<style>
    td>span.status-order {
        border-radius: 4px;
        font-size: 13px;
        color: #fff;
    }

    td>span.processing {
        background: #fff000;
        padding: 7px;
        color: #333;
    }

    td>span.transported {
        background: #ffa502;
        padding: 7px;
    }

    td>span.cancelled {
        background: #ff3f34;
        padding: 7px;
    }

    td>span.successful {
        background: #4cd137;
        padding: 7px;
    }
</style>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php if (!empty($list_order)){echo count($list_order);}else{echo 0;} ?>)</span></a></li>
                            <!-- <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li> -->
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <!-- <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div> -->
                    <div class="table-responsive">
                        <?php if (!empty($list_order)) {
                        ?>
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Mã</span></td>
                                        <td><span class="thead-text">Khách hàng</span></td>
                                        <td><span class="thead-text">Tổng tiền</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                        <td><span class="thead-text">Chi tiết</span></td>
                                        <td><span class="thead-text">Tác vụ</span></td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $index = 1;
                                    foreach ($list_order as $order) {
                                    ?>
                                        <tr <?php if ($index % 2 == 1) {
                                                echo "class='bg-whitesmoke'";
                                            } ?>>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $index ?></span>
                                            <td><span class="tbody-text">PHP-<?php echo $order['order_id'] ?></span>
                                            <td>
                                                <div class="tb-title fl-left">
                                                    <span class="tbody-text"><?php echo $order['fullname'] ?></span>
                                                </div>
                                            </td>
                                            <td><span class="tbody-text"><?php echo current_format($order['total_price']) ?></span></td>
                                            <td><span class="tbody-text <?php echo "status-order ";
                                                                        echo $order['status']; ?>"><?php echo convert_status($order['status']) ?></span></td>
                                            <td><span class="tbody-text"><?php echo timestamp_to_date_format_His($order['order_time'], array('d', 'm', 'Y', 'H', 'i', 's')) ?></span></td>
                                            <td><span class="tbody-text"><a href="?mod=order&action=detail_order&id=<?php echo $order['order_id'] ?>" title="" class="tbody-text">Chi tiết</span></a></td>
                                            <td><a href="?page=detail_order" title="" class="tbody-text">Tác vụ</a></td>
                                        </tr>
                                    <?php
                                        $index++;
                                    } ?>

                                </tbody>
                            </table>
                        <?php
                        }else{
                            echo "<p>Danh sách đơn hàng trống</p>";
                        } ?>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <!-- <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p> -->
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