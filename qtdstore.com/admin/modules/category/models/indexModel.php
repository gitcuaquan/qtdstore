<?php

function get_list_category(){
    $sql = "SELECT * FROM `tbl_category`";
    $result = db_fetch_array($sql);
    if($result > 0){
        return $result;
    } else {
        return "";
    }
}