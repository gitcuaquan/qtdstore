<?php
function update_password($data, $reset_token)
{
    db_update('tbl_users', $data, "`reset_token` = '{$reset_token}'");
}

function check_active($is_active)
{
    if ($is_active == 1) {
        return "<span class='is-active'>Đã kích hoạt</span>";
    } else {
        return "<span class='not-active'>Chưa kích hoạt</span>";
    }
}

function get_position($username){
    $position = db_fetch_row("SELECT `position` FROM `tbl_users` WHERE `username` = '{$username}'");
    return $position['position'];
}

function check_position($postion)
{
    if ($postion == 'manager') {
        return '<strong>Admin</strong>';
    }
    if ($postion == 'salesman') {
        return 'Nhân viên';
    }
    if ($postion == 'member') {
        return 'Thành viên';
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

function get_name($user_login)
{
    $fullname = db_fetch_row("SELECT `last_name` FROM `tbl_users` WHERE `username` = '{$user_login}'");
    return $fullname['last_name'];
}

function get_avatar($username){
    $avt = db_fetch_row("SELECT * FROM `tbl_users` JOIN `tbl_img` ON `tbl_users`.`img_id` = `tbl_img`.`img_id` WHERE `username` = '{$username}'");
    return $avt['img_url'];
}


function get_list_user()
{
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}

function get_list_user_by_search($search){
    $sql = "SELECT * FROM `tbl_users` WHERE `username` LIKE '%{$search}%' OR `first_name` LIKE '%{$search}%' OR `last_name` LIKE '%{$search}%'";
    $list_user = db_fetch_array($sql);
    return $list_user;
}

function check_pagging()
{
    $total_row = db_num_rows("SELECT * FROM `tbl_users`");

    $num_per_page = 10;

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;

    if ($total_row <= 10) {
        if (isset($_GET['is_active'])) {
            $result = db_fetch_array("SELECT * FROM `tbl_users` WHERE `is_active` = '0'");
            return $result;
        } else {
            $result = db_fetch_array("SELECT * FROM `tbl_users`");
            return $result;
        }
    } else {
        if (isset($_GET['is_active'])) {
            $result = db_fetch_array("SELECT * FROM `tbl_users` WHERE `is_active` = '0' LIMIT {$start}, {$num_per_page}");
            return $result;
        } else {
            $result = db_fetch_array("SELECT * FROM `tbl_users` LIMIT {$start}, {$num_per_page}");
            return $result;
        }
    }
}

function get_pagging($base_url)
{
    $total_row = db_num_rows("SELECT * FROM `tbl_users`");

    $num_per_page = 10;

    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $str_pagging = "<ul class='clear pagging'>";
    if ($page <= 1 && !isset($_GET['page'])) {
        $str_pagging .= "";
    }
    if ($page > 1) {
        $prev_page = $page - 1;
        $str_pagging .= "<li><a href=\"{$base_url}&page={$prev_page}\" class='prev'>Trước</a></li>";
    }

    for ($i = 1; $i <= $num_page; $i++) {
        $active = "";
        if ($i == $page) {
            $active = "class='active'";
        }
        $str_pagging .= "<li {$active}><a href=\"{$base_url}&page={$i}\">{$i}</a></li>";
    }
    if ($page < $num_page) {
        $next_page = $page + 1;
        $str_pagging .= "<li><a href=\"{$base_url}&page={$next_page}\" class='next'>Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}

function get_page()
{

    $num_per_page = 10;

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    return $start;
}
