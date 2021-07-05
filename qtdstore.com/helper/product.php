<?php

function get_feature_product()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `is_feature` = '1' LIMIT 5");
    return $result;
}

function get_img_url($id)
{
    $result = db_fetch_row("SELECT `img_url` FROM `tbl_img` JOIN `tbl_product` ON `tbl_product`.`img_id` = `tbl_img`.`img_id` WHERE `tbl_product`.`product_id` = $id");
    return $result['img_url'];
}

function get_number_product()
{
    if (!isset($_GET['cat_id'])) {
        $result = db_fetch_array("SELECT * FROM `tbl_product`");
    } else {
        $id = $_GET['cat_id'];
        $result = db_fetch_array("SELECT * FROM `tbl_product` JOIN `tbl_product_category` ON `tbl_product`.`product_id` = `tbl_product_category`.`product_id` JOIN `tbl_category` ON `tbl_category`.`category_id` = `tbl_product_category`.`category_id` WHERE `tbl_category`.`category_id` = $id OR `tbl_category`.`category_parent_id` = $id");
    }
    return count($result);
}

function get_num_product(){
    $result = db_fetch_array("SELECT `product_id` FROM `tbl_product`");
    return count($result);
}