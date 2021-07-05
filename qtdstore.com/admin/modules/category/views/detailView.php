<?php
get_header()
?>

<head>
    <title>QTD Store - Quản lý tài khoản</title>
    <link rel="stylesheet" href="public/css/category.css">
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
               <?php get_sidebar() ?> 
            </div>
            
            <div class="col-lg-10 content">
                <h1>Chi tiết danh mục sản phẩm</h1>
                <form action="" method="POST" class="infomation">
                    <label for="category_code">Mã danh mục: </label>
                    <input type="text" name="category_code" id="category-code" class="can" value="TT0" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="username">Tên danh mục: </label>
                    <input type="text" name="fullname" id="fullname" value="Nguyễn Đức Thương" disabled="disabled" class="can">
                    <div class="clear-both"></div>
                    <br><label for="level">Cấp độ hiển thị: </label>
                    <input type="text" name="level" id="level" disabled="disabled" class="can" value="0">
                    <div class="clear-both"></div>
                    <br><label for="parent_code">Mã danh mục cha: </label>
                    <input type="type" name="parent_code" id="parent-code" disabled="disabled" class="can">
                    <div class="clear-both"></div>
                    <br><label for="description">Mô tả: </label>
                    <input type="text" name="description" id="description" disabled="disabled" class="can">
                    <div class="clear-both"></div>
                    <div class="text-right">
                        <br><label for="status">Trạng thái: </label>
                        <select name="status" id="status" disabled="disabled" class="w-30" class="can">
                            <option value="normal">Đã kích hoạt</option>
                            <option value="vip">Chưa kích hoạt</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" name="btn_del" id="del">Xóa</button>
                    <button type="submit" name="btn_edit" id="edit">Sửa</button>
                    <button type="submit" name="btn_confirm" id="confirm" disabled="disabled">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>

<script src="public/js/tab.js"></script>