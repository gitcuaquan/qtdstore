<?php
get_header();
?>

<head>
    <title>QTD Store - Trang quản trị</title>
    <link rel="stylesheet" href="public/css/home.css">
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <div class="thumb">
                    <img src="public/images/wallpaper.png" alt="" class="img-fluid">
                    <div class="background"></div>
                    <h3>Xin chào <span class="user-name"><?php echo $user['first_name'] . " " . $user['last_name'] ?></span> !</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <a href="?mod=bill" class="item bill">
                            <span class="item-title">Đơn hàng</span><br>
                            <span class="num"><?php echo get_amount("tbl_bill") ?></span><span class="waiting">(<?php echo get_waiting_bill() ?> đang chờ)</span><br>
                            <span class="view-more">Xem chi tiết &#10144;</span>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="?mod=product" class="item product">
                            <span class="item-title">Sản phẩm</span><br>
                            <span class="num"><?php echo get_amount("tbl_product") ?></span><br>
                            <span class="view-more">Xem chi tiết &#10144;</span>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="?mod=users" class="item user">
                            <span class="item-title">Người dùng</span><br>
                            <span class="num"><?php echo get_amount("tbl_users") ?></span><br>
                            <span class="view-more">Xem chi tiết &#10144;</span>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="?mod=store" class="item money">
                            <span class="item-title">Doanh thu tháng này</span><br>
                            <span class="num">1.650.000đ</span><br>
                            <span class="view-more">Xem chi tiết &#10144;</span>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="?mod=category" class="item category">
                            <span class="item-title">Danh mục</span><br>
                            <span class="num"><?php echo get_amount("tbl_category") ?></span><br>
                            <span class="view-more">Xem chi tiết &#10144;</span>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="?mod=banner" class="item qlqc">
                            <span class="item-title">Quảng cáo</span><br>
                            <span class="num">5</span><br>
                            <span class="view-more">Xem chi tiết &#10144;</span>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="?mod=store&action=discount" class="item sale">
                            <span class="item-title">Mã giảm giá</span><br>
                            <span class="num">4</span><br>
                            <span class="view-more">Xem chi tiết &#10144;</span>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="?mod=store&action=info" class="item info">
                            <span class="item-title">Thông tin trang</span><br>
                            <span class="num">14</span><br>
                            <span class="view-more">Xem chi tiết &#10144;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>