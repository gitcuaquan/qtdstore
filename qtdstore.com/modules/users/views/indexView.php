<?php
get_header()
?>

<head>
    <title>QTD Store - Quản lý tài khoản</title>
    <link rel="stylesheet" href="public/css/users.css">
</head>

<div id="wp-content">
    <?php
    get_breadcrumb()
    ?>

    <div class="container">
        <h2>Quản lý tài khoản</h2>

        <div class="row">
            <div class="col-lg-8">
                <div class="box">
                    <div class="box-head">
                        <ul class="clear tab-list">
                            <li>Thông tin cá nhân</li>
                            <li>Cập nhật</li>
                            <li>Đổi mật khẩu</li>
                            <li>Quản lý đơn hàng</li>
                        </ul>
                    </div>
                    <div class="box-body">
                        <div class="tab-content">
                            <table>
                                <tr>
                                    <th>Họ và tên</th>
                                    <td class="fullname"><?php echo $user['first_name'] . " " . $user['last_name'] ?></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <td class="phone"><?php echo $user['phone'] ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày sinh</th>
                                    <td class="date"><?php echo $user['date_of_birth'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $user['email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Giới tính</th>
                                    <td class="gender"><?php echo check_gender($user['gender']) ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ</th>
                                    <td class="address"><?php echo $user['address'] ?></td>
                                </tr>
                                <tr>
                                    <th>Khu vực</th>
                                    <td class="region"><?php echo check_region($user['region_id']) ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày tạo</th>
                                    <td><?php echo $user['reg_date'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-content">
                            <form action="" method="POST">
                                <br><label for="first-name">Họ:</label>
                                <input type="text" name="first_name" id="first-name" value="<?php echo $user['first_name'] ?>">
                                <div class="clear-both"></div>
                                <div class="hide first-name"></div>
                                <br><label for="last-name">Tên:</label>
                                <input type="text" name="last_name" id="last-name" value="<?php echo $user['last_name'] ?>">
                                <div class="clear-both"></div>
                                <div class="hide last-name"></div>
                                <br><label for="date-of-birth">Ngày sinh:</label>
                                <input type="date" name="date_of_birth" id="date-of-birth" value="<?php echo $user['date_of_birth'] ?>">
                                <div class="clear-both"></div>
                                <br><label for="phone">Số điện thoại:</label>
                                <input type="text" name="phone" id="phone" value="<?php echo $user['phone'] ?>">
                                <div class="clear-both"></div>
                                <div class="hide phone"></div>
                                <br><label for="gender">Giới tính:</label>
                                <select name="gender" id="gender">
                                    <option value="">-- Chọn giới tính --</option>
                                    <option <?php if (isset($user['gender']) && $user['gender'] == "male") echo "selected='selected'" ?> value="male">Nam</option>
                                    <option <?php if (isset($user['gender']) && $user['gender'] == "female") echo "selected='selected'" ?> value="female">Nữ</option>
                                </select>
                                <div class="clear-both"></div>
                                <br><label for="address">Địa chỉ:</label>
                                <input type="text" name="address" id="address" value="<?php echo $user['address'] ?>">
                                <div class="clear-both"></div>
                                <br><label for="region">Khu vực:</label>
                                <select name="region" id="region">
                                    <option value="">-- Chọn khu vực --</option>
                                    <option <?php if (isset($user['region_id']) && $user['region_id'] == "1") echo "selected='selected'" ?> value="1">Miền Bắc</option>
                                    <option <?php if (isset($user['region_id']) && $user['region_id'] == "2") echo "selected='selected'" ?> value="2">Miền Trung</option>
                                    <option <?php if (isset($user['region_id']) && $user['region_id'] == "3") echo "selected='selected'" ?> value="2">Miền Nam</option>
                                </select>
                                <div class="clear-both"></div>
                                <p class="success"></p>
                                <br><button type="submit" name="btn_confirm" id="update-info">Xác nhận</button>
                            </form>
                        </div>
                        <div class="tab-content">
                            <form action="" method="POST">
                                <label for="password">Mật khẩu cũ:</label>
                                <input type="password" name="password" id="password">
                                <div class="clear-both"></div>
                                <?php form_error('password') ?>
                                <br><label for="new-pass">Mật khẩu mới:</label>
                                <input type="password" name="new_password" id="new-pass">
                                <div class="clear-both"></div>
                                <?php form_error('new_password') ?>
                                <br><label for="re-new-pass">Xác nhận mật khẩu mới:</label>
                                <input type="password" name="confirm_new_password" id="re-new-pass">
                                <div class="clear-both"></div>
                                <?php form_error('confirm_new_password') ?>
                                <br><button type="submit" name="btn_submit" id="confirm-password">Xác nhận</button>
                                <div class="clear-both"></div>
                            </form>
                        </div>
                        <div class="tab-content">
                            <table class="order-list">
                                <thead>
                                    <tr>
                                        <td>STT</td>
                                        <td>Mã đơn hàng</td>
                                        <td>Ngày mua</td>
                                        <td>Tổng giá</td>
                                        <td>Trạng thái</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="">HD343434</a></td>
                                        <td>20/10/2020</td>
                                        <td><span class="price">450.000đ</span></td>
                                        <td><span class="done">Đã giao</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><a href="">HD343434</a></td>
                                        <td>20/10/2020</td>
                                        <td><span class="price">450.000đ</span></td>
                                        <td><span class="unfinished">Đang giao hàng</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><a href="">HD343434</a></td>
                                        <td>20/10/2020</td>
                                        <td><span class="price">450.000đ</span></td>
                                        <td><span class="waiting">Chờ xác thực</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-user">
                    <a class="choose"><i class="fas fa-camera"></i></a>
                    <form action="" method="post" id="upload-avt" enctype="multipart/form-data">
                        <label for="file" id="choose-file">Chọn ảnh</label>
                        <span class="upload-url">Chưa có ảnh</span>
                        <input type="file" name="file" id="file" data-url="?mod=users&action=upload">
                        <button type="submit" name="btn_upload" class="btn-upload">Tải lên</button>
                        <div class="clear-both"></div>
                    </form>

                    <div class="avatar">
                        <a class="avatar-thumb"><img src="<?php echo get_avatar(check_user()) ?>" alt="" class="avatar-show"></a>
                    </div>
                    <div class="form-error"></div>

                    <h3 class="show_fullname"><?php echo $user['first_name'] . " " . $user['last_name'] ?></h3>
                    <p>Số sản phẩm đã mua: <strong><span class="num-bought">3</span></strong></p>
                    <p>Loại thành viên: <span class="normal-user type-user">Thường</span></p>
                    <p>Ngày đăng ký: <strong><span class="num-bought"><?php echo $user['reg_date'] ?></span></strong></p>
                    <a href="?mod=users&action=logout" class="btn-logout">Đăng xuất &nbsp;<i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="notify-upload">
        <span class="icon-x">&#10006;</span>
        <?php echo form_error('update') ?>
    </div>

    
</div>

<?php
get_footer()
?>
<script src="public/js/tab.js"></script>