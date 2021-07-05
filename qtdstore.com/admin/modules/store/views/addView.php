<?php
get_header()
?>

<head>
    <title>QTD Store - Quản lý danh mục</title>
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <h1>Thêm mã giảm giá</h1>
                <form action="" method="POST" class="infomation">
                    <label for="discount_code">Mã giảm giá: </label>
                    <input type="text" name="discount_code" id="discount-code">
                    <div class="clear-both"></div>
                    <br><label for="discount_value">Số lượng giảm: </label>
                    <input type="text" name="discount_value" id="discount-value">
                    <div class="clear-both"></div>
                    <br><label for="date_start">Bắt đầu từ: </label>
                    <input type="date" name="date_start" id="date-start">
                    <div class="clear-both"></div>
                    <br><label for="date_end">Hạn sử dụng: </label>
                    <input type="date" name="date_end" id="date-end">
                    <div class="clear-both"></div>
                    <br>
                    <button type="submit" name="btn_new" id="new">Làm mới</button>
                    <button type="submit" name="btn_add" id="add">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>