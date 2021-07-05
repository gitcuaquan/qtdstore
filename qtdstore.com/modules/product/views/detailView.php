<?php
get_header();
?>

<head>
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
    <title>QTD Store - Áo thun AT2000</title>
    <link rel="stylesheet" href="public/css/sidebar.css">
    <link rel="stylesheet" href="public/css/detail-product.css">
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=1923405377801113&autoLogAppEvents=1" nonce="VesJIKiM"></script>
    <!-- wp-content -->
    <div id="wp-content">
        <!-- breadcrumb -->
        <?php get_breadcrumb() ?>
        <!-- end breadcrumb -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 sidebar">
                    <!-- sidebar -->
                    <?php get_sidebar('product') ?>
                    <!-- end sidebar -->
                </div>
                <div class="col-lg-9 col-md-9">
                    <!-- detail product -->
                    <div class="detail-product">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                <div class="product-thumb-preview">
                                    <img src="" alt="" class="img-fluid">
                                </div>
                                <div class="slide-preview">
                                    <?php $list_thumb = get_list_thumb_product($detail['product_id']) ?>
                                    <div class="list-thumb">
                                        <?php
                                        foreach ($list_thumb as $thumb) {
                                        ?>
                                            <div class="col-3 item">
                                                <img src="admin/<?php echo $thumb['img_url'] ?>" alt="" class="img-fluid">
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="nav-thumb">
                                        <a href="" class="btn-prev">&#10094;</a>
                                        <a href="" class="btn-next">&#10095;</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="product-big-title">
                                    <h2><?php echo $detail['product_name'] ?></h2>
                                </div>
                                <div class="product-info">
                                    <p>Mã sản phẩm: <span class="product-code"><?php echo $detail['product_code'] ?></span></p>
                                    <p>Đã bán: <span class="product-sold-number">999</span></p>
                                    <p>Giá: <span class="product-new-price"><?php echo currency_format($detail['product_price']) ?></span></p>
                                    <p>Tình trạng: <span class="product-status"><?php echo check_storage($detail['product_id']) ?></span></p>
                                    <p><span class="product-desc"><?php echo $detail['product_desc'] ?></span></p>
                                    <hr>
                                    <?php $list_size = get_size($detail['product_id']) ?>
                                    <p>Các loại size còn:
                                        <?php foreach($list_size as $size){
                                            $name_size = get_name_size($size['product_size'], $size['product_amount']);
                                            echo "<strong>{$name_size}</strong>" . ", ";
                                        } ?>
                                    </p>
                                    <br>
                                    <a href="?mod=product&action=add&id=<?php echo $detail['product_id'] ?>" class="btn btn-add add-to-cart">Thêm vào giỏ hàng</a>
                                    <a href="" class="btn btn-like-top like"><i class="fas fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end detail product -->

                    <!-- detail describe -->
                    <div class="detail-describe">
                        <h1>Thông tin chi tiết</h1>
                        <p><?php echo $detail['product_detail'] ?></p>
                        <!-- commitment -->
                        <div class="commitment">
                            <h2>Chúng tôi cam kết</h2>
                            <img src="public/images/commitment.png" alt="" class="img-fluid">
                            <p>Mọi vấn đề thắc mắc về chính sách của chúng tôi, bạn có thể gửi yêu cầu qua email <strong>qtdstore.2020@gmail.com</strong> hoặc gọi điện theo số hotline <strong>036.3100.093</strong>.</p>
                            <div class="fb-comments" data-href="http://localhost/nguyenducthuong/project/qtdstore.com/?mod=product&amp;action=detail&id=<?php echo $detail['product_id'] ?>" data-numposts="5" data-width="100%"></div>
                        </div>
                        <!-- end commitment -->
                    </div>
                    <!-- end detail describe -->
                </div>
            </div>
        </div>
    </div>
    <!-- end wp-content -->
</body>

<?php
get_footer();

?>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/detail.js"></script>
