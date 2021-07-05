<?php
get_header()
?>

<head>
    <title>QTD Store - Thông tin chi tiết</title>
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <h1>Thông tin khách hàng</h1>
                <form action="" method="POST" class="infomation">
                    <br><label for="phone">Số điện thoại: </label>
                    <input type="text" name="phone" id="phone" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="username">Họ và tên: </label>
                    <input type="text" name="fullname" id="fullname" value="Nguyễn Đức Thương" disabled="disabled" class="can">
                    <div class="clear-both"></div>
                    <br><label for="username" disabled="disabled">Giới tính: </label>
                    <select name="gender" id="gender" disabled="disabled" class="f-right w-70" class="can">
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                    </select>
                    <div class="clear-both"></div>
                    <br><label for="date_birth">Ngày sinh: </label>
                    <input type="date" name="date_birth" id="date-birth" disabled="disabled" class="can">
                    <div class="clear-both"></div>
                    <br><label for="email">Email: </label>
                    <input type="email" name="email" id="email" disabled="disabled" class="can">
                    <div class="clear-both"></div>
                    <br><label for="address">Địa chỉ: </label>
                    <input type="text" name="address" id="address" disabled="disabled" class="can">
                    <div class="clear-both"></div>
                    <div class="clear-both"></div>
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

