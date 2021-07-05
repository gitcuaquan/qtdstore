<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    load_view('index');
}

function checkoutAction()
{
    if (!isset($_SESSION['cart']['buy'])) {
        redirect_to("?mod=cart");
    } else {
        global $error;
        if (isset($_POST['btn_book'])) {
            $error = array();
            // fullname
            if (empty($_POST['fullname'])) {
                $error['fullname'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                $fullname = $_POST['fullname'];
            }

            // phone
            if (empty($_POST['phone'])) {
                $error['phone'] = "<p class='error'>Không được để trống !</p>";
            } else {
                if (!is_phone($_POST['phone'])) {
                    $error['phone'] = "<p class='error'>Số điện thoại không đúng định dạng !</p>";
                } else {
                    $phone = $_POST['phone'];
                }
            }

            // email
            $email = $_POST['email'];

            // address
            if (empty($_POST['address'])) {
                $error['address'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                $address = $_POST['address'];
            }

            // region
            if (empty($_POST['region'])) {
                $error['region'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                $region = $_POST['region'];
            }

            $delivery = $_POST['delivery'];

            $method = $_POST['method'];

            foreach ($_SESSION['cart']['buy'] as $cart) {
                if ($cart['qty'] > get_storage($cart['product_id'], $cart['product_size'])) {
                    $error['qty'] = "<p class='error'>* Sản phẩm " . $cart['product_name'] . "không còn đủ hàng trong kho !</p>";
                }
            }

            // kết luận
            if (empty($error)) {
                if (!check_phone_customer($phone)) {
                    $data = array(
                        'customer_fullname' => $fullname,
                        'customer_phone' => $phone,
                        'customer_email' => $email,
                        'customer_address' => $address,
                        'region_id' => $region
                    );
                    db_insert("tbl_customer", $data);
                } else {
                    $data = array(
                        'customer_fullname' => $fullname,
                        'customer_phone' => $phone,
                        'customer_email' => $email,
                        'customer_address' => $address,
                        'region_id' => $region
                    );
                    db_update("tbl_customer", $data, "`customer_phone` = '{$phone}'");
                }

                $customer_id = get_customer_id($phone);

                if (check_email($email)) {
                    $user_id = get_user_id_by_email($email);
                    $data = array(
                        'user_id' => $user_id
                    );

                    db_update("tbl_customer", $data, "`customer_email` = '{$email}'");
                }

                $date = getdate();
                $bill_code = 'HD' . $date['year'] . $date['mon'] . $date['mday'];

                $fee_id = get_delivery_fee_id($region, $delivery);


                $total = $_SESSION['cart']['info']['total'];

                $fee = get_fee($region, $delivery);

                $_SESSION['cart']['info']['total_checkout'] = $total + $fee;

                $total_all = $_SESSION['cart']['info']['total_checkout'];

                $bill = array(
                    'bill_code' => $bill_code,
                    'method_pay' => $method,
                    'delivery_fee_id' => $fee_id,
                    'total' => $total_all,
                    'num_order' => $_SESSION['cart']['info']['num_order']
                );
                db_insert("tbl_bill", $bill);
                $bill_id = get_bill_id($bill_code);

                $bill_code = 'HD' . $date['year'] . $date['mon'] . $date['mday'] . $bill_id;

                $bill_update = array(
                    'bill_code' => $bill_code
                );
                db_update("tbl_bill", $bill_update, "`bill_id` = $bill_id");

                $customer_bill = array(
                    'customer_id' => $customer_id,
                    'bill_id' => $bill_id
                );
                db_insert("tbl_customer_bill", $customer_bill);

                foreach ($_SESSION['cart']['buy'] as $cart) {
                    $product_id = $cart['product_id'];
                    $qty = $cart['qty'];
                    $size = $cart['product_size'];
                    $detail_bill = array(
                        'bill_id' => $bill_id,
                        'product_id' => $product_id,
                        'qty' => $qty,
                        'size' => $size
                    );

                    db_insert("tbl_detail_bill", $detail_bill);

                    $product_amount = get_storage($product_id, $size);
                    $new_amount = $product_amount - $qty;
                    $update = array(
                        'product_amount' => $new_amount
                    );
                    db_update("tbl_product_storage", $update, "`product_id` = $product_id AND `product_size` = '{$size}'");

                    $id = $cart['product_id'];
                    $product_name = $cart['product_name'];
                    $product_price = $cart['product_price'];
                    $product_size = $cart['product_size'];
                    $qty = $cart['qty'];
                    $sub_total = $cart['sub_total'];

                    setcookie('product_id_' . $id, $id, time() - 604800);
                    setcookie('product_name_' . $id, $product_name, time() - 604800);
                    setcookie('product_price_' . $id, $product_price, time() - 604800);
                    setcookie('product_size_' . $id, $product_size, time() - 604800);
                    setcookie('qty_' . $id, $qty, time() - 604800);
                    setcookie('sub_total_' . $id, $sub_total, time() - 604800);
                }

                $num_order = get_num_order();
                $total = get_total_cart();

                setcookie('num_order', $num_order, time() - 604800);
                setcookie('total', $total, time() - 604800);

                redirect_to("?mod=cart&action=successful");
            }
        }
        load_view('checkout');
    }
}

function check_infoAction()
{
    $delivery = $_POST['delivery'];

    $region = $_POST['region'];

    $total = $_SESSION['cart']['info']['total'];

    $fee = get_fee($region, $delivery);

    $_SESSION['cart']['info']['total_checkout'] = $total + $fee;

    $total_all = $_SESSION['cart']['info']['total_checkout'];

    $data = array(
        'delivery_fee' => currency_format($fee),
        'total_all' => currency_format($total_all)
    );

    echo json_encode($data);
}

function successfulAction()
{
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    } else {
        redirect_to("?mod=cart");
    }
    load_view('successful');
}

function delAction()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_SESSION['cart'])) {
            $product_name = $_SESSION['cart']['buy'][$id]['product_name'];
            $product_price = $_SESSION['cart']['buy'][$id]['product_price'];
            $product_size = $_SESSION['cart']['buy'][$id]['product_size'];
            $qty = $_SESSION['cart']['buy'][$id]['qty'];
            $sub_total = $_SESSION['cart']['buy'][$id]['sub_total'];
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();

            setcookie('product_id_' . $id, $id, time() - 604800);
            setcookie('product_name_' . $id, $product_name, time() - 604800);
            setcookie('product_price_' . $id, $product_price, time() - 604800);
            setcookie('product_size_' . $id, $product_size, time() - 604800);
            setcookie('qty_' . $id, $qty, time() - 604800);
            setcookie('sub_total_' . $id, $sub_total, time() - 604800);

            $num_order = get_num_order();
            $total = get_total_cart();

            setcookie('num_order', $num_order, time() + 604800);
            setcookie('total', $total, time() + 604800);
        }
    }
    redirect_to("?mod=cart");
}

function updateAction()
{
    $id = $_GET['id'];
    $qty = $_POST['qty'];

    $item = get_product_by_id($id);

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        // Cập nhật số lượng
        $_SESSION['cart']['buy'][$id]['qty'] = $qty;


        // Cập nhật giá
        $sub_total = $item['product_price'] * $qty;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;

        setcookie('qty_' . $id, $qty, time() + 604800);
        setcookie('sub_total_' . $id, $sub_total, time() + 604800);


        // Cập nhật tổng hóa đơn
        update_info_cart();

        $total = get_total_cart();
        $num_order = get_num_order();

        setcookie('num_order', $num_order, time() + 604800);
        setcookie('total', $total, time() + 604800);

        $data = array(
            'num_order' => $num_order,
            'sub_total' => currency_format($sub_total),
            'total' => currency_format($total)
        );

        echo json_encode($data);
    }
}

function update_sizeAction()
{
    $id = $_GET['id'];
    $list_size = $_POST['product_size'];

    foreach ($list_size as $size) {
        setcookie('product_size_' . $id, $size, time() + 604800);
        $_SESSION['cart']['buy'][$id]['product_size'] = $size;
    }

    redirect_to("?mod=cart");
}
