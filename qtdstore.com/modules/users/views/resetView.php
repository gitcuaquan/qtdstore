<?php
get_header();
?>

<head>
    <title>QTD Store - Quên mật khẩu</title>
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
                    <h2>Quên mật khẩu</h2>
                    <form action="" method="POST">
                        <label for="email">Mời bạn nhập email đã đăng ký</label>
                        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email') ?>
                        <button type="submit" name="btn_reset">Xác thực</button>
                        <?php echo form_error('confirm') ?>
                    </form>
                    <a href="?mod=users&action=login" class="login">Quay lại</a>
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