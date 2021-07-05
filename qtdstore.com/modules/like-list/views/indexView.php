<?php
get_header()
?>

<head>
    <title>QTD Store - Danh sách yêu thích</title>
    <link rel="stylesheet" href="public/css/cart.css">
</head>

<div id="wp-content">
    <?php get_breadcrumb() ?>

    <div class="container">
        <h1>Giỏ hàng của tôi</h1>
        <div class="cart-list">
            <!-- cart table -->
            <table class="cart-table">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Mã sản phẩm</td>
                        <td>Ảnh</td>
                        <td>Thông tin</td>
                        <td>Đơn giá</td>
                        <td>Trạng thái</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><span class="product-code">ATD2020</span></td>
                        <td>
                            <a href="" class="product-thumb">
                                <img src="public/images/buy-1.jpg" alt="" class="img-fluid">
                            </a>
                        </td>
                        <td>
                            <a href="" class="product-title">Vest nano vạt tròn B416</a>
                            <p>Size: <span class="product-size">XL</span></p>
                            <a href="" class="like">Thêm vào giỏ hàng</a>
                        </td>
                        <td>
                            <span class="product-price">450.000đ</span>
                        </td>
                        <td>
                            <span class="num-status stocking">Còn hàng</span>
                            <!-- <span class="num-status out-of-stock">Hết hàng</span> -->
                            <a href="" class="btn-del"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><span class="product-code">ATD2020</span></td>
                        <td>
                            <a href="" class="product-thumb">
                                <img src="public/images/buy-2.jpg" alt="" class="img-fluid">
                            </a>
                        </td>
                        <td>
                            <a href="" class="product-title">Vest nano vạt tròn B416</a>
                            <p>Size: <span class="product-size">XL</span></p>
                            <a href="" class="like">Thêm vào giỏ hàng</a>
                        </td>
                        <td>
                            <span class="product-price">450.000đ</span>
                        </td>
                        <td>
                            <!-- <span class="num-status stocking">Còn hàng</span> -->
                            <span class="num-status out-of-stock">Hết hàng</span>
                            <a href="" class="btn-del"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><span class="product-code">ATD2020</span></td>
                        <td>
                            <a href="" class="product-thumb">
                                <img src="public/images/buy-3.jpg" alt="" class="img-fluid">
                            </a>
                        </td>
                        <td>
                            <a href="" class="product-title">Vest nano vạt tròn B416</a>
                            <p>Size: <span class="product-size">XL</span></p>
                            <a href="" class="like">Thêm vào giỏ hàng</a>
                        </td>
                        <td>
                            <span class="product-price">450.000đ</span>
                        </td>
                        <td>
                            <span class="num-status stocking">Còn hàng</span>
                            <!-- <span class="num-status out-of-stock">Hết hàng</span> -->
                            <a href="" class="btn-del"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
            <!-- end cart table -->
        </div>
        <p class="num-product-total">Có tất cả <strong><span>3</span></strong> sản phẩm.</p>
        <a href="">Đi tới giỏ hàng</a>
    </div>
</div>
</div>

</div>

<?php
get_footer()
?>

<script src="public/js/cart.js"></script>