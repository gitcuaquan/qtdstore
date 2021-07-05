<?php
get_header();
?>

<head>
    <title>QTD Store - Thời trang giới trẻ</title>
    <link rel="stylesheet" href="public/css/home.css">
</head>


<!-- wp-content -->
<div id="wp-content">
    <div class="container">
        <?php
        get_slider()
        ?>
    </div>

    <!-- policy -->
    <div id="policy">
        <div class="container">
            <div class="row policy-list">
                <div class="col-lg-3 col-md-6">
                    <div class="policy-item">
                        <i class="fas fa-shipping-fast policy-icon"></i>
                        <h3>Giao hàng tiết kiệm</h3>
                        <span class="policy-desc">Tới tận tay khách hàng</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="policy-item">
                        <i class="fas fa-headphones policy-icon"></i>
                        <h3>Hỗ trợ tư vấn 24/7</h3>
                        <span class="policy-desc">036.3100.093</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="policy-item">
                        <i class="far fa-credit-card policy-icon"></i>
                        <h3>Thanh toán nhanh</h3>
                        <span class="policy-desc">Hỗ trợ nhiều hình thức</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="policy-item">
                        <i class="fas fa-cart-plus policy-icon"></i>
                        <h3>Đặt hàng online</h3>
                        <span class="policy-desc">Thao tác đơn giản</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end policy -->

    <!-- featured product -->
    <div id="featured-product">
        <div class="home-box">
            <div class="home-box-head">
                <h2 class="cat-title">Top sản phẩm bán chạy</h2>
            </div>
            <div class="home-box-body">
                <div class="container overflow-hidden">
                    <?php $list_feature = get_list_feature_product() ?>
                    <div class="owl-carousel owl-theme list-carousel">
                        <?php foreach ($list_feature as $feature) {
                        ?>
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="sale">SALE</span>
                                    <a href="?mod=product&action=detail&id=<?php echo $feature['product_id'] ?>"><img src="admin/<?php echo get_url_img_by_id($feature['img_id']) ?>" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="?mod=product&action=detail&id=<?php echo $feature['product_id'] ?>" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="?mod=product&action=add&id=<?php echo $feature['product_id'] ?>" class="btn btn-add add-to-cart" data-id=<?php echo $feature['product_id'] ?>>THÊM GIỎ HÀNG</a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="?mod=product&action=detail&id=<?php echo $feature['product_id'] ?>" class="product-title"><?php echo $feature['product_name'] ?></a>
                                </div>
                                <p><span class="new-price"><?php echo currency_format($feature['product_price']) ?></span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end featured product -->

    <!-- new product -->
    <div id="new-product">
        <div class="home-box">
            <div class="home-box-head">
                <h2 class="cat-title">Top sản phẩm hot nhất</h2>
            </div>
            <div class="home-box-body">
                <div class="container overflow-hidden">
                    <?php $list_hot = get_list_hot_product() ?>
                    <div class="owl-carousel owl-theme list-carousel">
                        <?php foreach ($list_hot as $hot) {
                        ?>
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="sale">SALE</span>
                                    <a href="?mod=product&action=detail&id=<?php echo $hot['product_id'] ?>"><img src="admin/<?php echo get_url_img_by_id($hot['img_id']) ?>" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="?mod=product&action=detail&id=<?php echo $hot['product_id'] ?>" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="?mod=product&action=add&id=<?php echo $hot['product_id'] ?>" class="btn btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="?mod=product&action=detail&id=<?php echo $hot['product_id'] ?>" class="product-title"><?php echo $hot['product_name'] ?></a>
                                </div>
                                <p><span class="new-price"><?php echo currency_format($hot['product_price']) ?></span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end new product -->

    <!-- banner + email -->
    <div id="banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-12" id="left">
                    <div id="receive-mail">
                        <i class="fas fa-envelope mail-icon"></i>
                        <h3>Đăng ký Theo dõi</h3>
                        <p>Nhận thông báo về những sản phẩm hot, giảm giá...</p>
                        <form action="" method="post">
                            <input type="email" name="receive_mail" placeholder="Nhập email của bạn...">
                            <input type="submit" value="Đăng ký">
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 pl-0 summer">
                        <h4>Thời trang xuân hè</h4>
                        <a href="">
                            <img src="public/images/cat_xuan.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 p-0 winter">
                        <h4>Thời trang thu đông</h4>
                        <a href="">
                            <img src="public/images/cat_dong.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 pl-0">
                    <div id="right">
                        <img src=" public/images/banner_qc.png" alt="" class="img-fluid">
                        <div id="right-caption">
                            <h4>ĐÓN CHÀO MÙA ĐÔNG CÙNG QTD STORE</h4>
                            <h5>GIẢM NGAY 20% <br> KHI MUA THEO BỘ NAM NỮ</h5>
                        </div>
                        <img src="public/images/HOT.gif" alt="" class="hot">
                        <a href="" class="btn-view-detail">Khám phá ngay &#10132;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end banner + email -->

    <!-- collaborator -->
    <div id="collaborator">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="collab-content">
                        <h1>Trở thành cộng tác viên?</h1>
                        <p>
                            Cùng với sự phát triển của các hãng thời trang, nhu cầu thị trường ngày càng"đi lên". Để có thể đáp ứng được tất cả nhu cầu của khách hàng một cách chóng trong một thời gian ngắn nhất, chúng tôi luôn chào đón các bạn gia nhập đội ngũ cộng tác viên của
                            chúng tôi. Với chính sách cộng tác viên linh hoạt, có lợi cho cả 2 bên, mong muốn hợp tác lâu dài, chúng tôi tin rằng đây sẽ là sự lựa chọn đúng đắn cho con đường phát triển sự nghiệp sự nghiệp kinh doanh của bạn.
                        </p>
                        <p><strong>Hãy xem chi tiết chính sách cộng tác viên của chúng tôi và nhanh tay đăng ký ngay hôm nay nhé!</strong></p>
                        <a href="">Chính sách cộng tác viên</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="collab-thumb">
                        <img src="public/images/reference-profile-collaborator.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end collaborator -->

    <!-- blog -->
    <div id="blog">
        <div class="home-box">
            <div class="home-box-head">
                <h2 class="cat-title">Tin tức</h2>
            </div>
            <div class="home-box-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 blog-site">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <a href=""><img src="public/images/blog-1.jpg" alt="" class="img-fluid"></a>
                                </div>
                                <a href="" class="blog-title">Nguyên tắc phối đồ cho nam giới phù hợp với từng vóc dáng!</a>
                                <div class="blog-info">
                                    <a href="" class="blog-auth">Admin</a>
                                    <span class="blog-date">14/10/2020</span>
                                </div>
                                <div class="blog-desc">
                                    <p class="blog-desc">Nguyên tắc phối đồ cho nam giới phù hợp với từng vóc dáng cần lưu ý, dựa vào những bí quyết phối đồ nào mang đến màu sắc thời trang đơn giản, cuốn hút. Đặc biệt, với những nguyên tắc phối đồ này sẽ giúp
                                        cải thiện đáng kể vóc dáng thêm hài hòa, nổi bật hơn!</p>
                                </div>
                                <a href="" class="view-more">Xem thêm ...</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 blog-site">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <a href=""><img src="public/images/blog-2.jpg" alt="" class="img-fluid"></a>
                                </div>
                                <a href="" class="blog-title">Phối quần jean nam ấn tượng với trang phục nào mới chuẩn?</a>
                                <div class="blog-info">
                                    <a href="" class="blog-auth">Admin</a>
                                    <span class="blog-date">8/10/2020</span>
                                </div>
                                <div class="blog-desc">
                                    <p>Phối quần jean rách nam ấn tượng cùng trang phục nào mới chuẩn? Cần lưu ý, dựa vào nguyên tắc nào? Đâu mới là bí quyết phối đồ trong phong cách nào? Cùng tìm hiểu cách phối quần jeans rách nam qua bài viết
                                        dưới đây sẽ giúp nam giới sẽ đưa ra quyết định đúng nhất.</p>
                                </div>
                                <a href="" class="view-more">Xem thêm ...</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 blog-site">
                            <div class="blog-item">
                                <div class="blog-thumb">
                                    <a href=""><img src="public/images/blog-3.jpg" alt="" class="img-fluid"></a>
                                </div>
                                <a href="" class="blog-title">Phối đồ all black nam đơn giản tạo nên cá tính thời thượng!</a>
                                <div class="blog-info">
                                    <a href="" class="blog-auth">Admin</a>
                                    <span class="blog-date">2/10/2020</span>
                                </div>
                                <div class="blog-desc">
                                    <p>Phối đồ all black nam đơn giản tạo nên cá tính thời thượng cần lưu ý những điểm gì? Dựa vào những quy tắc phối hợp đồ như thế nào mang đến sắc màu thời trang đơn giản, cá tính, nhẹ nhàng và cuốn hút nhất
                                        dành cho các bạn nam!</p>
                                </div>
                                <a href="" class="view-more">Xem thêm ...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="" class="btn-more">XEM THÊM BÀI VIẾT</a>
            </div>
        </div>
    </div>
    <!-- end blog -->

</div>
<!-- end wp-content -->

<?php
get_footer();

?>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/slider.js"></script>
<script src="public/js/home.js"></script>