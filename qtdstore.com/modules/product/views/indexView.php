<?php
get_header();
?>

<head>
    <title>QTD Store - Danh sách sản phẩm</title>
    <link rel="stylesheet" href="public/css/main-category.css">
    <link rel="stylesheet" href="public/css/sidebar.css">
</head>

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
                <!-- wallpaper -->
                <?php get_wallpaper() ?>
                <!-- end wallpaper -->

                <!-- main-category -->
                <div class="main-category">
                    <div class="row">
                        <?php
                        foreach ($list_product as $item) {
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="item">
                                    <div class="product-thumb">
                                        <span class="new">NEW</span>
                                        <a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>"><img src="admin/<?php echo get_url($item['img_id']) ?>" alt="" class="img-fluid"></a>
                                        <div class="btn-bar">
                                            <a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                            <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="fix">
                                        <a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>" class="product-title"><?php echo $item['product_name'] ?></a>
                                    </div>
                                    <p><span class="new-price"><?php echo $item['product_price'] ?></span></p>
                                    <p>Đã bán: <span class="num-sold">999</span></p>
                                    <a href="?mod=product&action=add&id=<?php echo $item['product_id'] ?>" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- end main catetory -->

            <!-- pagging -->
            <div class="container">
                <?php
                $url = check_category();
                echo get_pagging($url);
                ?>
            </div>
            <!-- end pagging -->
        </div>
    </div>
</div>
</div>
</div>
<!-- end wp-content -->

<?php
get_footer();

?>