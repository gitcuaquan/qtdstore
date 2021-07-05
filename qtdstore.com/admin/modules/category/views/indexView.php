<?php
get_header()
?>

<head>
    <title>QTD Store - Quản lý danh mục</title>
    <link rel="stylesheet" href="public/css/form-search.css">
    <link rel="stylesheet" href="public/css/table.css">
    <link rel="stylesheet" href="public/css/category.css">
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <div class="main-content">
                    <h1>Danh sách danh mục sản phẩm</h1>
                    <a href="?mod=category&action=add" class="btn-add-new">Thêm mới</a>
                    <form action="" method="get">
                        <input type="search" name="search" id="search-box" placeholder="Nhập mã danh mục...">
                        <button type="submit" name="btn_search" id="search">Tìm kiếm</button>
                    </form>
                    <form action="" method="post">

                        <button type="submit" name="btn_del" id="del">Xóa</button>
                        <table>
                            <thead>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="select_all" id="select-all">
                                    </td>
                                    <td>STT</td>
                                    <td>Mã ID</td>
                                    <td>Tên danh mục</td>
                                    <td>Cấp độ hiển thị</td>
                                    <td>Mã danh mục cha</td>
                                </tr>
                            </thead>
                            <?php $category = get_list_category(); ?>
                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($category as $item) {
                                    $temp++;
                                ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="select_all[]" value="<?php echo $item['category_id'] ?>" id="select">
                                        </td>
                                        <td><?php echo $temp ?></td>
                                        <td><?php echo $item['category_id'] ?></td>
                                        <td class="text-left"><a href="?mod=category&action=detail&id=<?php echo $item['category_id'] ?>"><?php echo $item['category_title'] ?></a></td>
                                        <td><?php echo $item['category_level'] ?></td>
                                        <td><?php echo $item['category_parent_id'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <p>
                            <span class="alert">* Click vào mã danh mục để xem chi tiết</span>
                            <span class="pagging">
                                <a href="" class="prev"><i class="fas fa-angle-double-left"></i></a>
                                <a href="" class="">1</a>
                                <a href="" class="">2</a>
                                <a href="" class="">3</a>
                                <a href="" class="next"><i class="fas fa-angle-double-right"></i></a>
                            </span>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>

<script src="public/js/tab.js"></script>