<?php

function get_list_bill()
{
    $result = db_fetch_array("SELECT * FROM `tbl_bill` JOIN `tbl_customer_bill` ON `tbl_bill`.`bill_id` = `tbl_customer_bill`.`bill_id` ORDER BY `bill_date` DESC");
    return $result;
}

function get_list_active_bill()
{
    $result = db_fetch_array("SELECT * FROM `tbl_bill` JOIN `tbl_customer_bill` ON `tbl_bill`.`bill_id` = `tbl_customer_bill`.`bill_id` WHERE `tbl_bill`.`bill_status` = '1' ORDER BY `bill_date` DESC");
    return $result;
}

function get_list_not_active_bill()
{
    $result = db_fetch_array("SELECT * FROM `tbl_bill` JOIN `tbl_customer_bill` ON `tbl_bill`.`bill_id` = `tbl_customer_bill`.`bill_id` WHERE `tbl_bill`.`bill_status` = '0' ORDER BY `bill_date` DESC");
    return $result;
}

function get_list_finish_bill()
{
    $result = db_fetch_array("SELECT * FROM `tbl_bill` JOIN `tbl_customer_bill` ON `tbl_bill`.`bill_id` = `tbl_customer_bill`.`bill_id` WHERE `tbl_bill`.`bill_condition` = '1' ORDER BY `bill_date` DESC");
    return $result;
}

function check_status($id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_bill` WHERE `bill_id` = $id");
    if ($result['bill_status']  == 1) {
        return "<span class='active'>Đã xác thực</span>";
    }
    if ($result['bill_status']  == 0) {
        return "<span class='not-active'>Chưa xác thực</span>";
    }
}

function check_condition($id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_bill` WHERE `bill_id` = $id");
    if ($result['bill_condition']  == 1) {
        return "<span class='finish'>Hoàn thành</span>";
    }
    if ($result['bill_condition']  == 0) {
        return "<span class='not-finish'>Đang giao</span>";
    }
}

function get_bill($id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_bill` WHERE `tbl_bill`.`bill_id` = $id");
    return $result;
}

function get_detail_bill($id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_detail_bill` JOIN `tbl_product` ON `tbl_product`.`product_id` = `tbl_detail_bill`.`product_id` JOIN `tbl_img` ON `tbl_product`.`img_id` = `tbl_img`.`img_id` WHERE `tbl_detail_bill`.`bill_id` = $id");
    return $result;
}

function select_delivery($id)
{
    $result = db_fetch_row("SELECT `delivery_fee` FROM `tbl_delivery_fee` JOIN `tbl_bill` ON `tbl_delivery_fee`.`delivery_fee_id` = `tbl_bill`.`delivery_fee_id` WHERE `tbl_bill`.`delivery_fee_id` = $id");
    return $result['delivery_fee'];
}

function select_method($id)
{
    $result = db_fetch_row("SELECT `method_pay` FROM `tbl_bill` WHERE `bill_id` = $id");
    if($result['method_pay'] == 0){
        return "COD";
    } else {
        return "Banking";
    }
}

function select_status($id)
{
    $result = db_fetch_row("SELECT `bill_status` FROM `tbl_bill` WHERE `bill_id` = $id");
    return $result['bill_status'];
}

function select_condition($id)
{
    $result = db_fetch_row("SELECT `bill_condition` FROM `tbl_bill` WHERE `bill_id` = $id");
    return $result['bill_condition'];
}


function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field])) return $error[$label_field];
}
