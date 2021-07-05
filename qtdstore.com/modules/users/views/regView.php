<?php
get_header();
?>

<head>
    <title>QTD Store - Đăng ký thành viên</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>


<div id="wp-content">
    <?php get_breadcrumb() ?>
    <div class="container">
        <div class="row">
            <!-- banner -->
            <div class="col-lg-8">
                <?php
                get_slider();
                ?>
            </div>
            <!-- end banner -->

            <!-- form -->
            <div class="col-lg-4">
                <div class="form">
                    <h2>Đăng ký thành viên</h2>
                    <form action="" method="POST">
                        <input type="text" name="username" id="username" placeholder="Tên đăng nhập" value="<?php echo set_value('username') ?>">
                        <?php echo form_error('username') ?>
                        <input type="text" name="first_name" id="first-name" placeholder="Họ" value="<?php echo set_value('first_name') ?>">
                        <input type="text" name="last_name" id="last-name" placeholder="Tên" value="<?php echo set_value('last_name') ?>">
                        <?php echo form_error('first_name') ?>
                        <?php echo form_error('last_name') ?>
                        <input type="text" name="phone" id="phone" placeholder="Số điện thoại" value="<?php echo set_value('phone') ?>">
                        <select name="gender" id="gender">
                            <option value="">-- Giới tính --</option>
                            <option <?php if (isset($_POST['gender']) && $_POST['gender'] == "male") echo "selected='selected'" ?> value="male">Nam</option>
                            <option <?php if (isset($_POST['gender']) && $_POST['gender'] == "female") echo "selected='selected'" ?> value="female">Nữ</option>
                        </select>
                        <?php echo form_error('phone') ?>
                        <?php echo form_error('gender') ?>
                        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo set_value('email') ?>" class="clear-both">
                        <?php echo form_error('email') ?>
                        <input type="password" name="password" id="password" placeholder="Mật khẩu">
                        <?php echo form_error('password') ?>
                        <input type="password" name="repeat_password" id="repeat-password" placeholder="Nhập lại mật khẩu">
                        <?php echo form_error('repeat_password') ?>
                        <button type="submit" name="btn_reg">Đăng ký</button>
                        <?php echo form_error('account') ?>
                    </form>

                    <a href="?mod=users&action=login" class="login">Bạn đã có tài khoản?</a>

                </div>
            </div>
            <!-- end form -->
        </div>
    </div>
</div>

<?php
get_footer();
?>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/slider.js"></script>