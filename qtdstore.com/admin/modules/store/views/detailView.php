<?php
get_header()
?>

<head>
    <title>QTD Store - Thông tin chi tiết</title>
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <h1>Thông tin hóa đơn</h1>
                <form action="" method="GET" class="infomation">
                    <br><label for="bill_code">Mã hóa đơn: </label>
                    <input type="text" name="bill_code" id="bill-code" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="username_staff">Mã nhân viên: </label>
                    <input type="text" name="username_staff" id="username-staff" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="username">Mã khách hàng: </label>
                    <input type="text" name="username" id="username" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="username">Họ và tên: </label>
                    <input type="text" name="fullname" id="fullname" value="Nguyễn Đức Thương" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="phone">Số điện thoại: </label>
                    <input type="text" name="phone" id="phone" value="036311555" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="address">Địa chỉ: </label>
                    <input type="text" name="address" id="address" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="date">Ngày tạo: </label>
                    <input type="text" name="date" id="date" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="status">Trạng thái: </label>
                    <input type="text" name="status" id="status" disabled="disabled">
                    <div class="clear-both"></div>
                    <div class="text-right">
                        <label for="shipping">Phương thức vận chuyển: </label>
                        <select name="shipping" id="shipping" disabled="disabled">
                            <option value="normal">Thường</option>
                            <option value="express">Nhanh</option>
                        </select>
                        <br><label for="checkout">Phương thức thanh toán: </label>
                        <select name="checkout" id="checkout" disabled="disabled">
                            <option value="cod">COD</option>
                            <option value="banking">Banking</option>
                            <option value="momo">Momo</option>
                        </select>
                    </div>
                    <br><label for="discount_code">Mã giảm giá: </label>
                    <input type="text" name="discount_code" id="discount-code" disabled="disabled">
                    <div class="clear-both"></div>
                    <br><label for="total">Tổng số tiền: </label>
                    <input type="text" name="total" id="total" disabled="disabled">
                    <div class="clear-both"></div>
                </form>
                <h3 class="product-list">Danh sách sản phẩm</h3>
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
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="">ATD2020</a></td>
                            <td>
                                <a href="" class="product-thumb">
                                    <img src="public/images/user-1.png" alt="" class="img-cart">
                                </a>
                            </td>
                            <td>
                                <a href="">Vest nano vạt tròn B416</a>
                                <p>Size: <span class="product-size">XL</span></p>
                            </td>
                            <td>
                                <span class="product-price">450.000đ</span>
                            </td>
                            <td>
                                <input type="number" name="num" value="1">
                            </td>
                            <td>
                                <span class="product-sub-total">450.000đ</span>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="">ATD2020</a></td>
                            <td>
                                <a href="" class="product-thumb">
                                    <img src="public/images/user-1.png" alt="" class="img-cart">
                                </a>
                            </td>
                            <td>
                                <a href="">Vest nano vạt tròn B416</a>
                                <p>Size: <span class="product-size">XL</span></p>
                            </td>
                            <td>
                                <span class="product-price">450.000đ</span>
                            </td>
                            <td>
                                <input type="number" name="num" value="1">
                            </td>
                            <td>
                                <span class="product-sub-total">450.000đ</span>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="">ATD2020</a></td>
                            <td>
                                <a href="" class="product-thumb">
                                    <img src="public/images/user-1.png" alt="" class="img-cart">
                                </a>
                            </td>
                            <td>
                                <a href="">Vest nano vạt tròn B416</a>
                                <p>Size: <span class="product-size">XL</span></p>
                            </td>
                            <td>
                                <span class="product-price">450.000đ</span>
                            </td>
                            <td>
                                <input type="number" name="num" value="1">
                            </td>
                            <td>
                                <span class="product-sub-total">450.000đ</span>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="">ATD2020</a></td>
                            <td>
                                <a href="" class="product-thumb">
                                    <img src="public/images/user-1.png" alt="" class="img-cart">
                                </a>
                            </td>
                            <td>
                                <a href="">Vest nano vạt tròn B416</a>
                                <p>Size: <span class="product-size">XL</span></p>
                            </td>
                            <td>
                                <span class="product-price">450.000đ</span>
                            </td>
                            <td>
                                <input type="number" name="num" value="1">
                            </td>
                            <td>
                                <span class="product-sub-total">450.000đ</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <form action="" method="POST" id="infomation">
                    <button type="submit" name="btn_confirm" class="enabled">Xác thực</button>
                    <button type="submit" name="btn_finish" class="enabled">Đã thanh toán</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>