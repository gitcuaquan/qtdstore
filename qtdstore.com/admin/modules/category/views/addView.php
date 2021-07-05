<?php
get_header()
?>

<head>
    <title>QTD Store - Quản lý danh mục</title>
    <link rel="stylesheet" href="public/css/category.css">
    <link rel="stylesheet" href="public/css/form-detail.css">
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <div class="main-content">
                    <h1>Chi tiết danh mục</h1>
                    <form action="" method="POST" class="infomation">
                        <br><label for="category_name">Tên danh mục: </label>
                        <input type="text" name="category_name" id="category-name">
                        <div class="clear-both"><?php echo form_error('category_name') ?></div>
                        <br><label for="level">Cấp độ hiển thị: </label>
                        <input type="number" min="0" value="0" name="level" id="level">
                        <div class="clear-both"><?php echo form_error('level') ?></div>
                        <br><label for="parent_code">Mã danh mục cha: </label>
                        <input type="type" name="parent_code" id="parent-code">
                        <div class="clear-both"></div>
                        <br><label for="description">Mô tả: </label>
                        <input type="text" name="description" id="description">
                        <div class="clear-both"></div>
                        <br>
                        <button type="submit" name="btn_new" id="new">Làm mới</button>
                        <button type="submit" name="btn_add" id="add">Thêm</button>
                        <div class="clear-both"><?php echo form_error('success') ?></div>
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