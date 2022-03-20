$(function () {
    $(".num-order").change(function () {
        //Lưu id và qty nhằm mục đích chuyển qua Action Update_ajax

        var user_id = $(this).attr("user-id");
        var product_id = $(this).attr("product-id");
        var qty = $(this).val();

        var data = { user_id: user_id, product_id: product_id, qty: qty };

        $.ajax({
            url: "?mod=cart&action=update_ajax",
            method: "POST",
            data: data,
            dataType: "json",

            success: function (data) {
                //Dữ liệu trả về để hiển thị
                $(".sub-total-"+product_id).text(data.sub_total);
                $("#total-price").text(data.total_price);
                $("#num").text(data.total_qty);
            },

            error: function (xhr, ajaxOption, thorwnError) {
                console.log(xhr.status);
                console.log(thorwnError);
            }
        })
    })
});