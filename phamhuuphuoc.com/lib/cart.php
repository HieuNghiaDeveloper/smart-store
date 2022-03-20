<?php
function add_cart($id, $product)
{
    $qty = 1;
    if (isset($_SESSION['cart']['buy']) and array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }
    $_SESSION['cart']['buy'][$id] = array(
        'id' => $product['id'],
        'product_title' => $product['product_title'],
        'code' => $product['code'],
        'product_thumb' => $product['product_thumb'],
        'price' => $product['price'],
        'qty' => $qty,
        'sub_total' => $product['price'] * $qty
    );
}

function total_cart()
{
    $total_price = 0;
    $total_qty = 0;
    if (!empty($_SESSION['cart']['buy'])) {
        foreach ($_SESSION['cart']['buy'] as $item) {
            $total_qty += $item['qty'];
            $total_price += $item['sub_total'];
        }
        $_SESSION['cart']['info'] = array(
            'total_qty' => $total_qty,
            'total_price' => $total_price,
        );
    }
}


function delete_cart($id)
{
    if (array_key_exists($id, $_SESSION['cart']['buy'])) {
        $_SESSION['cart']['info']['total_qty'] -= $_SESSION['cart']['buy'][$id]['qty'];
        $_SESSION['cart']['info']['total_price'] -= $_SESSION['cart']['buy'][$id]['sub_total'];
        unset($_SESSION['cart']['buy'][$id]);
    }
}

function delele_all_cart()
{
    if (isset($_SESSION['cart']['buy'])) {
        unset($_SESSION['cart']);
    }
}
