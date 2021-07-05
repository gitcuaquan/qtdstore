<?php
get_header();
?>

<head>
    <title>QTD Store - Tất cả sản phẩm</title>
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

                <div class="search-bar">
                    <div class="box-search">
                        <form action="" method="post">
                            <select name="product_cat" class="product-cat-search">
                                <option value="">-- Danh mục --</option>
                                <option value="1">Thời trang</option>
                                <option value="2">Phụ kiện</option>
                                <option value="3">Quần áo nam</option>
                                <option value="4">Quần áo nữ</option>
                                <option value="5">Quần áo unisex</option>
                                <option value="6">Thời trang xuân hè</option>
                                <option value="7">Thời trang thu đông</option>
                            </select>
                            <input type="search" name="search" id="search" placeholder="Tìm kiếm sản phẩm?">
                            <input type="submit" value="Tìm kiếm" name="btn_search" class="btn-search">
                        </form>
                    </div>
                </div>

                <!-- main-category -->
                <div class="main-category">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="new">NEW</span>
                                    <a href=""><img src="public/images/product-7.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="sale">SALE</span>
                                    <a href=""><img src="public/images/product-1.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="sale">SALE</span>
                                    <a href=""><img src="public/images/product-9.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="sale">SALE</span>
                                    <a href=""><img src="public/images/product-8.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="sale">SALE</span>
                                    <a href=""><img src="public/images/product-1.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="new">NEW</span>
                                    <a href=""><img src="public/images/product-12.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="new">NEW</span>
                                    <a href=""><img src="public/images/product-11.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="new">NEW</span>
                                    <a href=""><img src="public/images/product-5.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="new">NEW</span>
                                    <a href=""><img src="public/images/product-4.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="new">NEW</span>
                                    <a href=""><img src="public/images/product-3.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="new">NEW</span>
                                    <a href=""><img src="public/images/product-2.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="item">
                                <div class="product-thumb">
                                    <span class="new">NEW</span>
                                    <a href=""><img src="public/images/product-1.jpg" alt="" class="img-fluid"></a>
                                    <div class="btn-bar">
                                        <a href="" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-like like"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="fix">
                                    <a href="" class="product-title">Áo thun polo đỏ trẻ trung 2020 (AXH-180)</a>
                                </div>
                                <p><span class="new-price">265.000đ </span></p>
                                <p>Đã bán: <span class="num-sold">999</span></p>
                                <a href="" class="btn-add add-to-cart">THÊM GIỎ HÀNG</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end main catetory -->

                <!-- pagging -->
                <div class="pagging">
                    <a href="" class="btn-pagging disabled">
                        <</a> <a href="" class="btn-pagging active">1
                    </a>
                    <a href="" class="btn-pagging">2</a>
                    <a href="" class="btn-pagging">></a>
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