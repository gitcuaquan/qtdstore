<?php
get_header();
?>

<head>
    <title>QTD Store - Thiết lập mật khẩu mới</title>
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
                    <h2>Thiết lập mật khẩu mới</h2>
                    <form action="" method="POST">
                        <label for="password">Mời bạn nhập mật khẩu mới</label>
                        <input type="password" name="password" id="password" placeholder="Mật khẩu mới">
                        <?php echo form_error('password') ?>
                        <input type="password" name="repeat_password" id="repeat-password" placeholder="Nhập lại mật khẩu">
                        <?php echo form_error('repeat_password') ?>
                        <button type="submit" name="btn_save">Xác nhận</button>
                        <?php echo form_error('finish') ?>
                    </form>
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