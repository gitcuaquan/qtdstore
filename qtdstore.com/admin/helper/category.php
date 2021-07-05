<?php

function get_category_list($level)
{
    $sql = "SELECT * FROM `tbl_category` WHERE `category_level` = {$level}";
    $result = db_fetch_array($sql);
    return $result;
}

function check_parent($level, $parent_id)
{
    $sql = "SELECT * FROM `tbl_category` WHERE `category_level` = {$level} AND `category_parent_id` = {$parent_id}";
    $result = db_fetch_array($sql);
    if ($result > 0){
        return $result;
    } else {
        return "";
    }
}
