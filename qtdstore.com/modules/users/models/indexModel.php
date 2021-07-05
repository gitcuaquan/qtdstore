<?php
function update_users($data, $username)
{
    db_update('tbl_users', $data, "`username` = '{$username}'");
}

function update_password($data, $reset_token)
{
    db_update('tbl_users', $data, "`reset_token` = '{$reset_token}'");
}

function check_reset_token($reset_token)
{
    $check_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_token` = '{$reset_token}'");
    if ($check_token > 0) {
        return true;
    } else {
        return false;
    }
}

function update_reset_token($data, $email)
{
    db_update('tbl_users', $data, "`email` = '{$email}'");
}

function check_email($email)
{
    $check_email = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}'");
    if ($check_email > 0) {
        return true;
    } else {
        return false;
    }
}

function check_login($username, $password)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    if ($check_user > 0) {
        return true;
    } else {
        return false;
    }
}

function check_position($username)
{
    $check_position = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    return $check_position['position'];
}

function get_password($username)
{
    $get_password = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    return $get_password['password'];
}

function get_img_url_by_username($username)
{
    $img_id = db_fetch_row("SELECT * FROM `tbl_users` JOIN `tbl_img` ON `tbl_users`.`img_id` = `tbl_img`.`img_id` WHERE `username` = '{$username}'");
    return $img_id['img_url'];
}

function get_img_id_by_path($path)
{
    $img_id = db_fetch_row("SELECT * FROM `tbl_img` WHERE `img_url` = '{$path}'");
    return $img_id['img_id'];
}

function user_exists($username, $email)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}' OR `username` = '{$username}'");
    echo $check_user;
    if ($check_user > 0) {
        return true;
    } else {
        return false;
    }
}

function check_gender($gender)
{
    if ($gender == 'male') {
        return "Nam";
    } else {
        if ($gender == 'female') {
            return "Nữ";
        }
    }
}

function get_avatar($username)
{
    $avt = db_fetch_row("SELECT * FROM `tbl_users` JOIN `tbl_img` ON `tbl_users`.`img_id` = `tbl_img`.`img_id` WHERE `username` = '{$username}'");
    return $avt['img_url'];
}

function check_region($region)
{
    if ($region == 9) {
        return "";
    } else {
        if ($region == '1') {
            return "Miền Bắc";
        } else {
            if ($region == '2') {
                return "Miền Trung";
            } else {
                if ($region == '3') {
                    return "Miền Nam";
                }
            }
        }
    }
}

function get_list_user()
{
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '{$id}'");
    return $item;
}

function get_user_by_username($username)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    return $item;
}

function active_user($active_token)
{
    return db_update('tbl_users', array('is_active' => 1), "`active_token` = '{$active_token}'");
}

function check_active_token($active_token)
{
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `active_token` = '{$active_token}' AND `is_active` = '0'");
    if ($check > 0) {
        return true;
    } else {
        return false;
    }
}

function get_name($user_login)
{
    $fullname = db_fetch_row("SELECT `last_name` FROM `tbl_users` WHERE `username` = '{$user_login}'");
    return $fullname['last_name'];
}

function get_position($user_login)
{
    $position = db_fetch_row("SELECT `position` FROM `tbl_users` WHERE `username` = '{$user_login}'");
    return $position['position'];
}