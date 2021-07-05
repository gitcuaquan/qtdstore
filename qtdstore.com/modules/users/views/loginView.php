<?php
get_header();
?>

<head>
    <title>QTD Store - Đăng nhập</title>
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
                    <h2>Đăng nhập</h2>
                    <form action="" method="POST">
                        <input type="text" name="username" id="username" placeholder="Tên đăng nhập" value="<?php echo set_value('username') ?>">
                        <?php echo form_error('username') ?>
                        <input type="password" name="password" id="password" placeholder="Mật khẩu">
                        <?php echo form_error('password') ?>
                        <p>
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Ghi nhớ đăng nhập</label>
                        </p>
                        <button type="submit" name="btn_login">Đăng nhập</button>
                        <?php echo form_error('account') ?>
                    </form>
                    <p>
                        <a href="?mod=users&action=reset" class="forgotten">Quên mật khẩu</a>
                        <a href="?mod=users&action=reg" class="reg">Bạn chưa có tài khoản?</a>
                    </p>
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
<script src="public/js/home.js"></script>