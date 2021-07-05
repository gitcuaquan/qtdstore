<?php
get_header()
?>

<head>
    <title>QTD Store - Giỏ hàng</title>
    <link rel="stylesheet" href="public/css/checkout.css">
</head>

<div id="wp-content">
    <?php get_breadcrumb() ?>

    <div class="container">
        <h1>Thanh toán</h1>
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box-infomation">
                        <div class="box-title">
                            <i class="fas fa-user-edit"></i>
                            <h3>Thông tin khách hàng</h3>
                        </div>
                        <div class="box-content">
                            <span class="alert">*</span><label for="fullname">Tên</label><br>
                            <input type="text" name="fullname" id="fullname" value="<?php echo check_fullname() ?>" placeholder="Họ và tên">
                            <?php echo form_error('fullname') ?>
                            <br><label for="email">Email</label><br>
                            <input type="text" name="email" id="email" value="<?php echo check_info('email') ?>" placeholder="Email">
                            <br><span class="alert">*</span><label for="phone">Số điện thoại</label><br>
                            <input type="text" name="phone" id="phone" value="<?php echo check_info('phone') ?>" placeholder="Số điện thoại">
                            <?php echo form_error('phone') ?>
                            <br><span class="alert">*</span><label for="address">Địa chỉ</label><br>
                            <input type="text" name="address" id="address" value="<?php echo check_info('address') ?>" placeholder="Địa chỉ">
                            <?php echo form_error('address') ?>
                            <br><span class="alert">*</span><label for="city">Khu vực</label><br>
                            <select name="region" id="city">
                                <option value="">-- Chọn --</option>
                                <option value="1" <?php if (check_region() == 1) echo "selected='selected'" ?>>Miền Bắc</option>
                                <option value="2" <?php if (check_region() == 2) echo "selected='selected'" ?>>Miền Trung</option>
                                <option value="3" <?php if (check_region() == 3) echo "selected='selected'" ?>>Miền Nam</option>
                            </select>
                            <?php echo form_error('region') ?>
                            <br><span class="alert">* Bắt buộc</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box-infomation">
                        <div class="box-title">
                            <i class="fas fa-truck"></i>
                            <h3>Phương thức giao hàng</h3>
                        </div>
                        <div class="box-content">
                            <input name="delivery" type="radio" value=1 id="normal" checked="checked" /><label for="normal">Giao hàng thường</label>
                            <br><input name="delivery" type="radio" value=2 id="express" /><label for="express">Giao hàng nhanh</label>
                        </div>
                    </div>

                    <div class="box-infomation">
                        <div class="box-title">
                            <i class="far fa-credit-card"></i>
                            <h3>Phương thức thanh toán</h3>
                        </div>
                        <div class="box-content">
                            <input name="method" type="radio" value="0" checked="checked" id="cod" /><label for="cod">Thanh toán khi nhận hàng</label>
                            <br><input name="method" type="radio" value="1" id="banking" /><label for="banking">Chuyển khoản ngân hàng</label>
                            <div class="alert-box">
                                <span class="alert">Chú ý: Quý khách vui lòng đợi hệ thống xác nhận đơn hàng và thông báo chuyển khoản qua tin nhắn điện thoại hoặc email thì mới thanh toán tiền cho đơn hàng !</span>
                            </div>
                            <div class="transfer-info">
                                <h4>Thông tin ngân hàng:</h4>
                                <ol class="list-banking" type="1">
                                    <li>
                                        Ngân hàng: <span class="bank-name">Viettinbank...</span><br>
                                        Tên người nhận: <span class="bank-user">ABC</span><br>
                                        Số tài khoản: <span class="bank-account">4154545454545</span><br>
                                    </li>
                                    <li>
                                        Ngân hàng: <span class="bank-name">Viettinbank...</span><br>
                                        Tên người nhận: <span class="bank-user">ABC</span><br>
                                        Số tài khoản: <span class="bank-account">4154545454545</span><br>
                                    </li>
                                    <li>
                                        Ngân hàng: <span class="bank-name">Viettinbank...</span><br>
                                        Tên người nhận: <span class="bank-user">ABC</span><br>
                                        Số tài khoản: <span class="bank-account">4154545454545</span><br>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 sidebar-total">
                    <!-- total -->
                    <div class="box-infomation">
                        <div class="box-title">
                            <i class="fas fa-wallet"></i>
                            <h3>Tổng hóa đơn</h3>
                        </div>
                        <div class="box-content cart-total-table">
                            <table>
                                <tr>
                                    <td>Tạm tính:</td>
                                    <td><span class="product-sub-total"><?php echo currency_format($_SESSION['cart']['info']['total']) ?></span></td>
                                </tr>
                                <tr>
                                    <td>Giảm giá:</td>
                                    <td><span class="product-discount-value">0%</span></td>
                                </tr>
                                <tr>
                                    <td>Phí vận chuyển:</td>
                                    <td><span class="shipping-fee">
                                            <?php
                                            if ($_SESSION['cart']['info']['total'] >= 2000000) {
                                                echo currency_format(0);
                                            } else {
                                                echo currency_format(get_delivery_fee());
                                            }
                                            ?>
                                        </span></td>
                                </tr>
                                <tr>
                                    <td>Tổng hóa đơn:</td>
                                    <td>
                                        <span class="product-total">
                                            <?php if ($_SESSION['cart']['info']['total'] >= 2000000) {
                                                echo currency_format($_SESSION['cart']['info']['total']);
                                            } else {
                                                echo currency_format($_SESSION['cart']['info']['total'] + get_delivery_fee());
                                            } ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <button type="submit" name="btn_book">Đặt hàng</button>
                    <?php echo form_error('qty') ?>
                    <!-- end total -->
                </div>
            </div>
        </form>
    </div>

</div>

<?php
get_footer()
?>

<script src="public/js/checkout.js"></script>