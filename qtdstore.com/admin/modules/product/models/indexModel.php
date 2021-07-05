<?php

function get_img_id_by_path($path)
{
    $img_id = db_fetch_row("SELECT * FROM `tbl_img` WHERE `img_url` = '{$path}'");
    return $img_id['img_id'];
}

function get_product_id_by_img_id($img_id)
{
    $product_id = db_fetch_row("SELECT * FROM `tbl_product` WHERE `img_id` = '{$img_id}'");
    return $product_id['product_id'];
}

function get_id_img($url)
{
    $get_id_img = db_fetch_row("SELECT * FROM `tbl_img` WHERE `img_url` = '{$url}'");
    return $get_id_img['img_id'];
}

function get_product_list()
{
    $get_product = db_fetch_array("SELECT * FROM `tbl_product`");
    return $get_product;
}

function get_number_product($id)
{
    $get_number_product = db_fetch_row("SELECT SUM(`product_amount`) FROM `tbl_product_storage` WHERE `product_id` = {$id}");

    return array_sum($get_number_product);
}

function get_list_category_by_product_id($id)
{
    $list_cate = db_fetch_array("SELECT * FROM `tbl_product_category` JOIN `tbl_category` ON `tbl_product_category`.`category_id` = `tbl_category`.`category_id` WHERE `product_id` = {$id}");
    return $list_cate;
}

function get_thumb_url($id)
{
    $url = db_fetch_row("SELECT `img_url` FROM `tbl_img` WHERE `img_id` = $id");
    return $url['img_url'];
}

function get_list_product_by_search($search)
{
    $product = db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_code` LIKE '%{$search}%' OR `product_name` LIKE '%{$search}%'");
    return $product;
}

function get_cat()
{
    $list_cat = db_fetch_array("SELECT * FROM `tbl_category` WHERE `category_parent_id` = 4");
    return $list_cat;
}

function get_product_by_cat_id($id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_product_category` JOIN `tbl_product` ON `tbl_product_category`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_category` ON `tbl_product_category`.`category_id` = `tbl_category`.`category_id` WHERE `category_parent_id` = $id");
    return $result;
}

function get_detail_product($id)
{
    if (isset($id)) {
        $result = db_fetch_row("SELECT * FROM `tbl_product` JOIN `tbl_product_category` ON `tbl_product`.`product_id` = `tbl_product_category`.`product_id` JOIN `tbl_product_img` ON `tbl_product_category`.`product_id` = `tbl_product_img`.`product_id` JOIN `tbl_product_storage` ON `tbl_product_img`.`product_id` = `tbl_product_storage`.`product_id` WHERE `tbl_product`.`product_id` = $id");
        return $result;
    } else {
        redirect_to("?mod=product");
    }
}

function check($product_id, $id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_product_category` WHERE `category_id` = $id AND `product_id` = $product_id");
    if ($result > 0) {
        return "checked='checked'";
    } else {
        return "";
    }
}

function check_storage($product_id, $size)
{
    $result = db_fetch_row("SELECT * FROM `tbl_product_storage` WHERE `product_size` = '{$size}' AND `product_id` = $product_id");
    if ($result > 0) {
        return "checked='checked'";
    } else {
        return "";
    }
}

function check_amount($product_id, $size)
{
    $result = db_fetch_row("SELECT `product_amount` FROM `tbl_product_storage` WHERE `product_size` = '{$size}' AND `product_id` = $product_id");
    if ($result > 0) {
        return $result['product_amount'];
    } else {
        return "";
    }
}

function get_list_thumb($id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_img` JOIN `tbl_product_img` ON `tbl_img`.`img_id` = `tbl_product_img`.`img_id` WHERE `product_id` = $id");
    return $result;
}

function check_pagging()
{
    $total_row = db_num_rows("SELECT * FROM `tbl_product`");

    $num_per_page = 5;

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;

    if ($total_row <= 5) {
        if (isset($_GET['cat_id'])) {
            $cat = $_GET['cat_id'];
            $result = db_fetch_array("SELECT * FROM `tbl_product_category` JOIN `tbl_product` ON `tbl_product_category`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_category` ON `tbl_product_category`.`category_id` = `tbl_category`.`category_id` WHERE `category_parent_id` = $cat");
            return $result;
        } else {
            $result = db_fetch_array("SELECT * FROM `tbl_product`");
            return $result;
        }
    } else {
        if (isset($_GET['cat_id'])) {
            $cat = $_GET['cat_id'];
            $result = db_fetch_array("SELECT * FROM `tbl_product_category` JOIN `tbl_product` ON `tbl_product_category`.`product_id` = `tbl_product`.`product_id` JOIN `tbl_category` ON `tbl_product_category`.`category_id` = `tbl_category`.`category_id` WHERE `category_parent_id` = $cat LIMIT {$start}, {$num_per_page}");
            return $result;
        } else {
            $result = db_fetch_array("SELECT * FROM `tbl_product` LIMIT {$start}, {$num_per_page}");
            return $result;
        }
    }
}

function get_pagging($base_url)
{
    $total_row = db_num_rows("SELECT * FROM `tbl_product`");

    $num_per_page = 5;

    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $str_pagging = "<ul class='clear pagging'>";
    if ($page <= 1 && !isset($_GET['page'])) {
        $str_pagging .= "";
    }

    if ($page > 1 && isset($_GET['cat_id'])) {
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

    $num_per_page = 5;

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    return $start;
}

function check_category()
{
    if (isset($_GET['cat_id'])) {
        return "?mod=product&cat_id={$_GET['cat_id']}";
    } else {
        return "?mod=product";
    }
}
