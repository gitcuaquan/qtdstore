<?php

function get_list_feature_product()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `is_feature` = '1'");
    return $result;
}

function get_list_hot_product()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `is_hot` = '1'");
    return $result;
}

function get_url_img_by_id($id){
    $result = db_fetch_row("SELECT `img_url` FROM `tbl_img` JOIN `tbl_product` ON `tbl_img`.`img_id` = `tbl_product`.`img_id` WHERE `tbl_product`.`img_id` = $id");
    return $result['img_url'];
}
