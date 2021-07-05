<?php

function get_position($username)
{
    $position = db_fetch_row("SELECT `position` FROM `tbl_users` WHERE `username` = '{$username}'");
    return $position['position'];
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}

function get_id_by_username($username){
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    return $item['user_id'];
}

function get_amount($tbl){
    $result = db_fetch_array("SELECT * FROM `$tbl`");
    return count($result);
}

function get_waiting_bill(){
    $result = db_fetch_array("SELECT * FROM `tbl_bill` WHERE `bill_status` = '0'");
    return count($result);
}