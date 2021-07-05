<?php

function get_url_img_by_id($id)
{
    $result = db_fetch_row("SELECT `img_url` FROM `tbl_img` JOIN `tbl_product` ON `tbl_img`.`img_id` = `tbl_product`.`img_id` WHERE `tbl_product`.`img_id` = $id");
    return $result['img_url'];
}


function check_pagging()
{
    if (!isset($_GET['cat_id'])) {
        $total_row = db_num_rows("SELECT * FROM `tbl_product`");
    } else {
        $cat = $_GET['cat_id'];
        $total_row = db_num_rows("SELECT * FROM `tbl_product` JOIN `tbl_product_category` ON `tbl_product_category`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_category` ON `tbl_product_category`.`category_id` = `tbl_category`.`category_id` WHERE `tbl_category`.`category_parent_id` = $cat OR `tbl_category`.`category_id` = $cat");
    }

    $num_per_page = 12;

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;

    if ($total_row <= 12) {
        if (isset($_GET['cat_id'])) {
            $cat = $_GET['cat_id'];
            $result = db_fetch_array("SELECT * FROM `tbl_product_category` JOIN `tbl_product` ON `tbl_product_category`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_category` ON `tbl_product_category`.`category_id` = `tbl_category`.`category_id` WHERE `tbl_category`.`category_parent_id` = $cat OR `tbl_category`.`category_id` = $cat ORDER BY `product_date` DESC");
        } else {
            $result = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY `product_date` DESC");
        }
        return $result;
    } else {
        if (isset($_GET['cat_id'])) {
            $cat = $_GET['cat_id'];
            $result = db_fetch_array("SELECT * FROM `tbl_product_category` JOIN `tbl_product` ON `tbl_product_category`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_category` ON `tbl_product_category`.`category_id` = `tbl_category`.`category_id` WHERE `tbl_category`.`category_parent_id` = $cat  OR `tbl_category`.`category_id` = $cat ORDER BY `product_date` DESC LIMIT {$start}, {$num_per_page}");
        } else {
            $result = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY `product_date` DESC LIMIT {$start}, {$num_per_page}");
        }
        return $result;
    }
}

function get_pagging($base_url)
{
    if (!isset($_GET['cat_id'])) {
        $total_row = db_num_rows("SELECT * FROM `tbl_product`");
    } else {
        $cat = $_GET['cat_id'];
        $total_row = db_num_rows("SELECT * FROM `tbl_product` JOIN `tbl_product_category` ON `tbl_product_category`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_category` ON `tbl_product_category`.`category_id` = `tbl_category`.`category_id` WHERE `tbl_category`.`category_parent_id` = $cat OR `tbl_category`.`category_id` = $cat");
    }

    $num_per_page = 12;

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

function check_category()
{
    if (isset($_GET['cat_id'])) {
        return "?mod=product&cat_id={$_GET['cat_id']}";
    } else {
        return "?mod=product";
    }
}

function get_product_by_id($id)
{
    if (!isset($_GET['id'])) {
        $id = 1;
    } else {
        $id = $_GET['id'];
    }
    $result = db_fetch_row("SELECT * FROM `tbl_product` JOIN `tbl_product_category` ON `tbl_product_category`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_product_storage` ON `tbl_product_storage`.`product_id` = `tbl_product`.`product_id` WHERE `tbl_product`.`product_id` = $id");
    return $result;
}

function get_list_thumb_product($id)
{
    $result = db_fetch_array("SELECT `img_url` FROM `tbl_product_img` JOIN `tbl_img` ON `tbl_product_img`.`img_id` = `tbl_img`.`img_id` WHERE `tbl_product_img`.`product_id` = $id");
    return $result;
}

function check_storage($id)
{
    $get_number_product = db_fetch_row("SELECT SUM(`product_amount`) FROM `tbl_product_storage` WHERE `product_id` = {$id}");

    $num = array_sum($get_number_product);

    if ($num == 0) {
        return "<span class='het'>Hết hàng</span>";
    } else {
        return "<span class='con'>Còn hàng</span>";
    }
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

function get_num_order_cart()
{
    if (isset($_SESSION['cart'])) {
        $num_order = $_SESSION['cart']['info']['num_order'];
        return $num_order;
    }
}


function get_user_id($username)
{
    $user_id = db_fetch_row("SELECT `user_id` FROM `tbl_users` WHERE `username` = '{$username}'");
    return $user_id['user_id'];
}

function get_url($id)
{
    $result = db_fetch_row("SELECT `img_url` FROM `tbl_product` JOIN `tbl_img` ON `tbl_product`.`img_id` = `tbl_img`.`img_id` WHERE `tbl_product`.`img_id` = {$id}");
    return $result['img_url'];
}

function get_size_product_limit($id)
{
    $size = db_fetch_row("SELECT `product_size` FROM `tbl_product_storage` WHERE `product_id` = {$id} AND `product_amount` > 0 LIMIT 1");
    return $size['product_size'];
}

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
