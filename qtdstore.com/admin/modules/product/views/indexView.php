<?php
get_header()
?>

<head>
    <title>QTD Store - Quản lý sản phẩm</title>
    <link rel="stylesheet" href="public/css/form-search.css">
    <link rel="stylesheet" href="public/css/table.css">
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-xl-10 content">
                <div class="main-content">
                    <h1>Danh sách sản phẩm</h1>
                    <a href="?mod=product&action=add" class="btn-add-new">Thêm mới</a>
                    <ul class="clear order-list">
                        <li class="active">
                            <a href="?mod=product">Tất cả (<span class="num"><?php echo count(get_product_list()) ?></span>)</a>
                        </li>
                        <?php
                        $list_cat = get_cat();
                        foreach ($list_cat as $cat) {
                        ?>
                            <li>
                                <a href="?mod=product&cat_id=<?php echo $cat['category_id'] ?>"><?php echo $cat['category_title'] ?> (<span class="num"><?php echo count(get_product_by_cat_id($cat['category_id'])); ?></span>)</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <form action="" method="get">
                        <input type="hidden" name="mod" value="product">
                        <input type="text" name="search" placeholder="Nhập thông tin sản phẩm..." id="search-box">
                        <input type="submit" name="btn_search" id="search" value="Tìm kiếm">
                    </form>
                    <form action="" method="post">
                        <button type="submit" name="btn_del" id="del">Xóa</button>
                        <div class="list">
                            <table>
                                <thead>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="select_all" id="select-all">
                                        </td>
                                        <td>STT</td>
                                        <td>Mã</td>
                                        <td>Ảnh</td>
                                        <td>Tên sản phẩm</td>
                                        <td>Giá</td>
                                        <td>SL còn</td>
                                        <td>Danh mục</td>
                                        <td>Ngày nhập cuối</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $temp = get_page();
                                    foreach ($product_list as $item) {
                                        $temp++;
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="select[]" id="select-<?php echo $item['product_id'] ?>" value="<?php echo $item['product_id'] ?>">
                                            </td>
                                            <td><?php echo $temp ?></td>
                                            <td><a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>"><?php echo $item['product_code'] ?></a></td>
                                            <td><a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>" class="product-thumb"><img src="<?php echo get_thumb_url($item['img_id']) ?>"></a></td>
                                            <td class="text-left"><?php echo $item['product_name'] ?></td>
                                            <td><span class="price"><?php echo currency_format($item['product_price']) ?></span></td>
                                            <td><?php echo get_number_product($item['product_id']) ?></td>
                                            <td><?php
                                                $list_cat = get_list_category_by_product_id($item['product_id']);
                                                foreach ($list_cat as $cat) {
                                                    echo "<a href='?mod=category&action=detail&id={$cat['category_id']}' >{$cat['category_code']}</a>, ";
                                                }
                                                ?></td>
                                            <td><?php echo $item['product_date'] ?></td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="foot-table">
                        <span class="alert">* Click vào mã danh mục để xem chi tiết</span>
                        <?php
                        $url = check_category();
                        echo get_pagging($url);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>