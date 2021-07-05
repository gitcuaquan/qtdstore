<?php
get_header()
?>

<head>
    <title>QTD Store - Thanh toán</title>
    <link rel="stylesheet" href="public/css/cart.css">
</head>

<div id="wp-content">
    <?php get_breadcrumb() ?>

    <div class="container">
        <h1>Giỏ hàng của tôi</h1>
        <p class="error">Lưu ý: Giỏ hàng sẽ tự động biến mất sau 7 ngày kể từ ngày tạo nếu không thanh toán !</p>
        <!-- <form action="?mod=cart&action=next" method="POST"> -->
            <div class="row">
                <div class="col-lg-9">
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
                                    <td>Số lượng</td>
                                    <td>Thành tiền</td>
                                </tr>
                            </thead>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $cart_buy = $_SESSION['cart']['buy'];
                                $cart_info = $_SESSION['cart']['info'];
                            } else {
                                $cart_buy = array();
                            }

                            ?>
                            <tbody>
                                <?php
                                $temp = 0;

                                if (!empty($_SESSION['cart'])) {
                                    foreach ($cart_buy as $cart) {
                                        $temp++;
                                ?>
                                        <tr>
                                            <td><?php echo $temp ?></td>
                                            <td><span class="product-code"><?php echo get_product_code_by_id($cart['product_id']) ?></span></td>
                                            <td>
                                                <a href="?mod=product&action=detail&id=<?php echo ($cart['product_id']) ?>" class="product-thumb">
                                                    <img src="admin/<?php $id = ($cart['product_id']);
                                                                    echo get_url_img_by_id($id); ?>" alt="" class="img-fluid">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?mod=product&action=detail&id=<?php echo $cart['product_id'] ?>" class="product-title"><?php echo ($cart['product_name']) ?></a>
                                                <?php
                                                $id = ($cart['product_id']);
                                                $list_size = get_size($id)
                                                ?>
                                                <form action="?mod=cart&action=update_size&id=<?php echo $cart['product_id'] ?>" method="post">
                                                    <p><select name="product_size[]" class="select" data-id="<?php echo $cart['product_id'] ?>" id="size-<?php echo $cart['product_id'] ?>">
                                                            <?php
                                                            foreach ($list_size as $size) {
                                                            ?>
                                                                <option value="<?php echo $size['product_size'] ?>" <?php echo check_size($cart['product_id'], $size['product_size']); ?>><?php echo get_name_size($size['product_size'], $size['product_amount']) ?></option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                        <button type="submit" name="btn_choose_size" class="btn-choose-size">Chọn size</button>
                                                    </p>
                                                </form>

                                                <a href="" class="like">Để dành mua sau</a>
                                            </td>
                                            <td>
                                                <span class="product-price"><?php echo currency_format(($cart['product_price'])) ?></span>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <input type="number" name="qty[]" class="qty" value="<?php echo ($cart['qty']) ?>" id="qty-<?php echo $cart['product_id'] ?>" min="1" max="<?php echo get_amount_by_size_id($cart['product_id'], $size['product_size']) ?>" data-id="<?php echo $cart['product_id'] ?>">
                                                </form>
                                            </td>
                                            <td>
                                                <span class="product-sub-total" id="sub-total-<?php echo $cart['product_id'] ?>"><?php echo currency_format($cart['sub_total']) ?></span>
                                                <a href="?mod=cart&action=del&id=<?php echo ($cart['product_id']) ?>" class="btn-del"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- end cart table -->

                    </div>
                    <?php if (empty($_SESSION['cart']['buy'])) {
                    ?>
                        <p class="alert">
                            <?php echo "Giỏ hàng đang trống ! Mời quý khách mua sắm tại <a href='?mod=product'>đây</a> !" ?>
                        </p>
                    <?php
                    } ?>

                    <p class="error">* Giỏ hàng chỉ lưu trữ được tối đa 10 loại sản phẩm !</p>
                    <p class="num-product-total">Có tất cả <strong><span class="num_order"><?php echo get_num_order() ?></span></strong> sản phẩm.</p>

                </div>

                <div class="col-lg-3 cart-checkout">
                    <!-- total -->
                    <div class="discount">
                        <p><span>Mã giảm giá:</span><span>(nếu có)</span></p>
                        <form action="" method="post">
                            <select name="discount_code" id="discount_code">
                                <option value="">-- Chọn mã giảm giá --</option>
                            </select>
                        </form>
                        <?php
                        if (!isset($_SESSION['user_login'])) {
                            echo "<p class='suggest'>* Hãy <a href='?mod=users&action=reg'>Đăng ký</a> hoặc <a href='?mod=users&action=login'>Đăng nhập</a> để có thể sử dụng mã giảm giá !</p>";
                        }
                        ?>
                    </div>
                    <table class="cart-total-table">
                        <tr>
                            <td>Giảm giá:</td>
                            <td><span class="product-discount-value">0%</span></td>
                        </tr>
                        <tr>
                            <td>Số SP:</td>
                            <td><span class="product-discount-value num_order"><?php echo get_num_order() ?></span></td>
                        </tr>
                        <tr>
                            <td>Tạm tính:</td>
                            <td><span class="product-total"><?php echo currency_format(get_total_cart()) ?></span></td>
                        </tr>
                    </table>
                    <a href="?mod=cart&action=checkout" class="btn-checkout-process">Tiến hành đặt hàng</a>
                    <!-- end total -->
                </div>
            </div>
        <!-- </form> -->
    </div>

</div>

<?php
get_footer()
?>

<script src="public/js/cart.js"></script>