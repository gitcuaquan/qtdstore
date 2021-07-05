<?php

function get_size($id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_product_storage` WHERE `product_id` = $id");
    return $result;
}

function get_name_size($size, $num)
{
    if ($size == 's' && $num != 0) {
        return 'S';
    }
    if ($size == 'm' && $num != 0) {
        return 'M';
    }
    if ($size == 'l' && $num != 0) {
        return 'L';
    }
    if ($size == 'xl' && $num != 0) {
        return 'XL';
    }
    if ($size == 'xxl' && $num != 0) {
        return 'XXL';
    }
    if ($size == 'over' && $num != 0) {
        return 'Oversize';
    }
}

function get_url_img_by_id($id)
{
    $result = db_fetch_row("SELECT `img_url` FROM `tbl_img` JOIN `tbl_product` ON `tbl_img`.`img_id` = `tbl_product`.`img_id` WHERE `tbl_product`.`product_id` = $id");
    return $result['img_url'];
}

function get_product_code_by_id($id)
{
    $result = db_fetch_row("SELECT `product_code` FROM `tbl_product` WHERE `product_id` = $id");
    return $result['product_code'];
}

function get_cart_info()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info'];
    }
}

function get_user_id($username)
{
    $user_id = db_fetch_row("SELECT `user_id` FROM `tbl_users` WHERE `username` = '{$username}'");
    return $user_id['user_id'];
}

function update_info_cart()
{
    if (isset($_SESSION['cart'])) {
        $num_order = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $cart) {
            $num_order += $cart['qty'];
            $total += $cart['sub_total'];
        }

        #Cập nhật cart tổng
        $_SESSION['cart']['info'] = array(
            'num_order' => $num_order,
            'total' => $total
        );
    }
}

function get_product_by_id($id)
{
    if (array_key_exists($id, $_SESSION['cart']['buy'])) {
        return $_SESSION['cart']['buy'][$id];
    } else {
        return false;
    }
}

function get_total_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    } else {
        return 0;
    }
}

function get_amount_by_size_id($id, $size)
{
    $result = db_fetch_row("SELECT `product_amount` FROM `tbl_product_storage` WHERE `product_size` = '{$size}' AND `product_id` = $id");
    return $result['product_amount'];
}

function get_size_session($id)
{
    return $_SESSION['cart']['buy'][$id]['product_size'];
}

function check_size($id, $size)
{
    if ($_SESSION['cart']['buy'][$id]['product_size'] == $size) {
        return "selected='selected'";
    } else {
        return "";
    }
}

function check_info($field)
{
    if (isset($_SESSION['user_login'])) {
        $username = $_SESSION['user_login'];
        $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
        if ($result > 0) {
            return $result[$field];
        } else {
            return "";
        }
    }
}

function check_fullname()
{
    if (isset($_SESSION['user_login'])) {
        $username = $_SESSION['user_login'];
        $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
        if ($result > 0) {
            return $result['first_name'] . " " . $result['last_name'];
        } else {
            return "";
        }
    }
}

function check_region()
{
    if (isset($_SESSION['user_login'])) {
        $username = $_SESSION['user_login'];
        $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
        if ($result > 0) {
            $user_id = $result['user_id'];
            $region = db_fetch_row("SELECT `region_id` FROM `tbl_users` WHERE `user_id` = $user_id");
            if ($region > 0) {
                return $region['region_id'];
            } else {
                return "";
            }
        }
    }
}

function get_delivery_fee()
{
    $result = db_fetch_row("SELECT `delivery_fee` FROM `tbl_delivery_fee` LIMIT 1");
    return $result['delivery_fee'];
}

function get_fee($region, $method)
{
    $result = db_fetch_row("SELECT `delivery_fee` FROM `tbl_delivery_fee` WHERE `region_id` = $region AND `delivery_id` = $method");
    return $result['delivery_fee'];
}

function check_email($email)
{
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `email` = '{$email}'");
    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function get_user_id_by_email($email)
{
    $result = db_fetch_row("SELECT `user_id` FROM `tbl_users` WHERE `email` = '{$email}'");
    return $result['user_id'];
}

function get_delivery_fee_id($region, $delivery)
{
    $result = db_fetch_row("SELECT `delivery_fee_id` FROM `tbl_delivery_fee` WHERE `region_id` = $region AND `delivery_id` = $delivery");
    return $result['delivery_fee_id'];
}

function get_bill_id($code)
{
$result = db_fetch_row("SELECT `bill_id` FROM `tbl_bill` WHERE `bill_code` = '{$code}'");
    return $result['bill_id'];
}

function check_phone_customer($phone)
{
    $result = db_fetch_row("SELECT * FROM `tbl_customer` WHERE `customer_phone` = '{$phone}'");
    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function get_customer_id($phone)
{
    $result = db_fetch_row("SELECT `customer_id` FROM `tbl_customer` WHERE `customer_phone` = '{$phone}'");
    return $result['customer_id'];
}

function get_storage($id, $size){
    $result = db_fetch_row("SELECT `product_amount` FROM `tbl_product_storage` WHERE `product_id` = $id AND `product_size` = '{$size}'");
    return $result['product_amount'];
}

function form_error($label_field){
    global $error;
    if (!empty($error[$label_field])) return $error[$label_field];
}

function is_phone($phone){
    $pattern = "/^[0]{1}[0-9]{9,10}$/";
    if(!preg_match($pattern, $phone, $matcha)){
        return false;
    } else {
        return true;
    }
}