<style>
    .recently-add {
        background: #ffc866 !important;
        color: #fff !important;
    }

    #wp-container {
        width: 100%;
        display: flex;
        justify-content: center;
        color: #fff;
        position: absolute;
        top: -100px;
        z-index: 999999999999999999999;
        transition: all 0.65s;
    }

    .toggle {
        position: fixed !important;
        top: 10% !important;
        /* left: 50%!important; */
        /* transform: translate(-50%, -50%)!important; */
        transition: all 0.65s;
    }

    #wp-container p {
        margin: 0;
    }

    .notify-ui {
        position: relative;
        box-shadow: 0 2px 5px 1px rgb(64 60 67 / 25%);
        flex-basis: 80%;
        display: flex;
        justify-content: space-between;
        background: #2c3947;
        padding: 15px;
        border-radius: 10px;
    }

    .box-left {
        flex-basis: 60%;
        display: flex;
        align-items: center;
    }

    .box-left>p.notify-success {
        font-size: 17px;
        margin-left: 10px !important;
        font-weight: 600;
    }

    .box-right {
        flex-basis: 45%;
        display: flex;
        flex-wrap: wrap;
        position: relative;
    }

    .box-right>.box-head {
        flex-basis: 100%;
    }

    .box-head h5 {
        font-weight: 600;
        text-transform: uppercase;
        margin: 0;
        font-size: 0.65em;
        color: #bec7d5;
    }

    .box-right>.box-body {
        flex-basis: 100%;
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
    }

    .box-body>.result {
        flex-basis: 70%;
        margin-top: 5px;
        position: relative;
        font-size: 14px;
    }

    .box-body>.result>.parent-result {
        background: #3d4e5f;
        padding: 5px;
        /* border-radius: 2px; */
        position: relative;
        cursor: pointer;
    }

    /* .box-body>.result>.parent-result:hover+.child-result {
        visibility: visible;
        opacity: 1;
        transition: all 0.3s;
    } */

    .box-body>.result>.child-result {
        display: none;
        box-shadow: 0 2px 5px 1px rgb(64 60 67 / 80%);
        position: absolute;
        top: 35px;
        /* border-radius: 2px; */
        z-index: 9999999999;
        cursor: pointer;
        width: 100%;
        overflow: hidden;
    }

    /* .box-body>.result>.child-result:hover {
        visibility: hidden;
        opacity: 0;
        box-shadow: 0 2px 5px 1px rgb(64 60 67 / 80%);
        position: absolute;
        top: 40px;
        border-radius: 2px;
        overflow: hidden;
        z-index: 9999999999;
        cursor: pointer;
        width: 100%;
    } */

    .child-result>.list-child-result {
        display: flex;
        flex-wrap: wrap;
        background: #3d4e5f;
        color: #fff;
    }

    .list-child-result>.child-result-item {
        flex-basis: 100%;
        border-bottom: 1px solid #333;
        padding: 5px;
        /* padding-left: 15px; */
        font-size: 14px;
    }

    button#accept {
        position: absolute;
        top: 7px;
        right: 0px;
        padding: 10px 20px;
        border: none;
        outline: none;
        background: #ffc866;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<?php
global $glo_data;
$cat_id_insert = $glo_data['id'];
?>
<div id="wp-container" class="" deep="<?php if (!empty($glo_data)) {
                                                        echo "deep";
                                                    } ?>">
    <div class="notify-ui">
        <div class="box-left">
            <p class="notify-success">Thêm danh mục thành công</p>
        </div>
        <div class="box-right">
            <div class="box-head">
                <h5>Danh sách sau khi cập nhật</h5>
                <!-- <p>icon tắt thông báo</p> -->
            </div>
            <div class="box-body">
                <div class="result">
                    <?php
                    if (!empty($glo_data)) {
                        foreach ($glo_data['list_category'] as $data_p) {
                    ?>
                            <div class="parent-result <?php if ($data_p['cat_id'] == $cat_id_insert) {
                                                            echo "recently-add";
                                                        } ?>"><?php echo $data_p['title'] ?></div>
                    <?php
                            break;
                        }
                    } ?>

                    <div class="child-result">
                        <div class="list-child-result">
                            <?php
                            if (!empty($glo_data)) {
                                for ($i = 1; $i < count($glo_data['list_category']); $i++) {
                            ?>
                                    <div class="child-result-item <?php if ($glo_data['list_category'][$i]['cat_id'] == $glo_data['id']) {
                                                                        echo "recently-add";
                                                                    } ?>"><?php echo str_repeat('---', $glo_data['list_category'][$i]['level']) . " " . $glo_data['list_category'][$i]['title']; ?></div>
                            <?php
                                }
                            } ?>
                        </div>
                    </div>

                </div>
                <button name="btn_accept" id="accept">Accept</button>
            </div>
        </div>
    </div>
</div>