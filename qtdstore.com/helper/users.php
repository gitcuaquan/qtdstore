<?php

// hàm is_login
function is_login()
{
    if (isset($_SESSION['is_login'])) {
        return true;
    } else {
        return false;
    }
}

// hàm trả về username của user khi login
function user_login()
{
    if (!empty($_SESSION['user_login'])) {
        return $_SESSION['user_login'];
    } else {
        return false;
    }
}

function check_position_redirect($username){
    $user = db_fetch_row("SELECT `position` FROM `tbl_users` WHERE `username` = '{$username}'");
    $position = $user['position'];
    if ($position == 'member') {
        return "?mod=users";
    } else {
        return "admin/?";
    }
}

function check_user(){
    if(!isset($_COOKIE['user_login'])){
        if(isset($_SESSION['user_login'])){
            return $_SESSION['user_login'];
        }
    } else {
        return $_COOKIE['user_login'];
    }
}