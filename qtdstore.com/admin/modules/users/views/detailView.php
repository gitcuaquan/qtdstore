<?php
get_header()
?>

<head>
    <title>QTD Store - Thông tin chi tiết</title>
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
                    <h1>Thông tin tài khoản</h1>
                    <form action="" method="POST" id="infomation">
                        <label for="username">Tài khoản: </label>
                        <input type="text" name="username" id="username" value="<?php echo $user['username'] ?>" disabled="disabled">
                        <div class="clear-both"></div>
                        <br><label for="username">Họ và tên: </label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo $user['first_name'] . " " . $user['last_name'] ?>" disabled="disabled">
                        <div class="clear-both"></div>
                        <br><label for="username" disabled="disabled">Giới tính: </label>
                        <select name="gender" id="gender" disabled="disabled" class="f-right w-70">
                            <option value="male" <?php if ($user['gender'] == 'male') echo "selected='selected'" ?>>Nam</option>
                            <option value="female" <?php if ($user['gender'] == 'female') echo "selected='selected'" ?>>Nữ</option>
                        </select>
                        <div class="clear-both"></div>
                        <br><label for="date_birth">Ngày sinh: </label>
                        <input type="date" name="date_birth" id="date-birth" disabled="disabled" value="<?php echo $user['date_of_birth'] ?>">
                        <div class="clear-both"></div>
                        <br><label for="email">Email: </label>
                        <input type="email" name="email" id="email" disabled="disabled" value="<?php echo $user['email'] ?>">
                        <div class="clear-both"></div>
                        <br><label for="phone">Số điện thoại: </label>
                        <input type="text" name="phone" id="phone" disabled="disabled" value="<?php echo $user['phone'] ?>">
                        <div class="clear-both"></div>
                        <br><label for="address">Địa chỉ: </label>
                        <input type="text" name="address" id="address" disabled="disabled" value="<?php echo $user['address'] ?>">
                        <div class="clear-both"></div>
                        <br><label for="date_reg">Ngày đăng ký: </label>
                        <input type="date" name="date_reg" id="date-reg" disabled="disabled" value="<?php echo $user['reg_date'] ?>">
                        <div class="clear-both"></div>
                        <br><label for="avatar">Ảnh đại diện: </label>
                        <input type="text" name="avatar" id="avatar" disabled="disabled" value="<?php echo get_avatar($user['username']) ?>" title="<?php echo get_avatar($user['username']) ?>">
                        <div class="clear-both"></div>
                        <div class="more">
                            <label for="position">Chức vụ: </label>
                            <select name="position" id="position" disabled="disabled" class="w-30 can">
                                <option value="member" <?php if ($user['position'] == 'member') echo "selected='selected'" ?>>Thành viên</option>
                                <option value="salesman" <?php if ($user['position'] == 'salesman') echo "selected='selected'" ?>>Nhân viên</option>
                                <option value="manager" <?php if ($user['position'] == 'manager') echo "selected='selected'" ?>>ADMIN</option>
                            </select>
                            <div class="clear-both"></div>
                            <br><label for="type">Loại thành viên: </label>
                            <select name="type" id="type" disabled="disabled" class="w-30">
                                <option value="normal">Thường</option>
                                <option value="vip">VIP</option>
                            </select>
                            <div class="clear-both"></div>
                            <br><label for="status">Trạng thái: </label>
                            <select name="status" id="status" disabled="disabled" class="w-30">
                                <option value="is_active">Đã kích hoạt</option>
                                <option value="not_active">Chưa kích hoạt</option>
                            </select>
                            <div class="clear-both"></div>
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
</div>

<?php
get_footer()
?>