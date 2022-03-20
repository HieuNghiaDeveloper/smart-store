<?php
global $message;
?>
<style>
    .new {
        flex-basis: 50% !important;
    }

    .message {
        flex-basis: 100%;
        text-align: center;
    }

    #close {
        font-size: 14px;
        padding: 5px;
        position: absolute;
        top: -1px;
        right: 5px;
        cursor: pointer;
    }

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
</style>
<div id="wp-container" class="" deep="deep" deep="<?php if (!empty($message)) {
                                                        echo "deep";
                                                    } ?>">
    <div class="notify-ui">
        <div class="message">
            <p class="notify-success"><?php echo $message ?></p>
            <span id="close">x</span>
        </div>
    </div>
</div>