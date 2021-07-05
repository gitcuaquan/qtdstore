<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $list_product = check_pagging();
    $data['list_product'] = $list_product;
    load_view('index', $data);
}

function detailAction()
{
    global $id;
    $detail = get_product_by_id($id);
    $data['detail'] = $detail;
    load_view('detail', $data);
}

function searchAction()
{
    load_view('search');
}

function addAction()
{
    if (!isset($_GET['id'])) {
        redirect_to("?");
    } else {
        # Lấy id và lấy thông tin sản phẩm
        $id = $_GET['id'];
        $product = get_product_by_id($id);

        # Kiểm tra giỏ hàng và cập nhật giỏ hàng
        $qty = 1;
        if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }

        $first_size = get_size_product_limit($id);

        $_SESSION['cart']['buy'][$id] = array(
            'product_id' => $id,
            'product_name' => $product['product_name'],
            'product_price' => $product['product_price'],
            'product_size' => $first_size,
            'qty' => $qty,
            'sub_total' => $product['product_price'] * $qty
        );

        // Cập nhật giỏ hàng tổng
        update_info_cart();
    

        redirect_to("?mod=cart");
    }
}
