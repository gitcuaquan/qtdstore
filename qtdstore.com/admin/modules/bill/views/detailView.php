<?php
get_header()
?>

<head>
    <title>QTD Store - Thông tin chi tiết</title>
    <link rel="stylesheet" href="public/css/table.css">
    <link rel="stylesheet" href="public/css/detail-bill.css">
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <div class="main-content">
                    <h1>Thông tin hóa đơn</h1>
                    <?php echo form_error('success') ?>
                    <a href="?mod=bill" class="view">Xem danh sách</a>
                    <hr>
                    <p class="row-info">Mã hóa đơn: <strong><?php echo $bill['bill_code'] ?></strong></p>
                    <p class="row-info">Ngày tạo: <strong><?php echo $bill['bill_date'] ?></strong></p>
                    <p class="row-info">Phương thức thanh toán: <strong><?php echo select_method($bill['bill_id']) ?></strong></p>
                    <p class="row-info">Số sản phẩm: <strong><?php echo $bill['num_order'] ?></strong></p>
                    <p class="row-info">Phí vận chuyển: <strong><?php echo currency_format(select_delivery($bill['delivery_fee_id'])) ?></strong></p>
                    <p class="row-info">Tổng số tiền: <strong class="price"><?php echo currency_format($bill['total']) ?></strong></p>
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
                            <?php
                            $temp = 0;
                            foreach ($detail_bill as $item) {
                                $temp++;
                            ?>
                                <tr>
                                    <td><?php echo $temp ?></td>
                                    <td><a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>"><?php echo $item['product_code'] ?></a></td>
                                    <td>
                                        <a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>" class="product-thumb">
                                            <img src="<?php echo $item['img_url'] ?>" alt="" class="img-cart">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>"><?php echo $item['product_name'] ?></a>
                                        <p>Size: <span class="product-size"><?php echo $item['size'] ?></span></p>
                                    </td>
                                    <td>
                                        <span class="product-price price"><?php echo currency_format($item['product_price']) ?></span>
                                    </td>
                                    <td>
                                        <input type="number" name="num" value="<?php echo $item['qty'] ?>" disabled="disabled">
                                    </td>
                                    <td>
                                        <span class="product-sub-total price"><?php echo currency_format($item['product_price'] *  $item['qty']) ?></span>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <form action="" method="POST" class="infomation">
                        <label for="status">Trạng thái:</label>
                        <br><select name="status" disabled="disabled" class="can" id="status">
                            <option value="0" <?php if (select_status($bill['bill_id']) == 0) echo "selected='selected'"; ?>>Chưa xác thực</option>
                            <option value="1" <?php if (select_status($bill['bill_id']) == 1) echo "selected='selected'"; ?>>Đã xác thực</option>
                        </select>
                        <br><label for="condition">Tình trạng thanh toán:</label>
                        <br><select name="condition" disabled="disabled" class="can" id="condition">
                            <option value="0" <?php if (select_condition($bill['bill_id']) == 0) echo "selected='selected'"; ?>>Chưa thanh toán</option>
                            <option value="1" <?php if (select_condition($bill['bill_id']) == 1) echo "selected='selected'"; ?>>Đã thanh toán</option>
                        </select>
                        <br><button type="submit" name="btn_del" id="del">Xóa</button>
                        <button type="submit" name="btn_edit" id="edit">Sửa</button>
                        <button type="submit" name="btn_confirm" id="confirm" disabled="disabled">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>

<script src="public/js/detail.js"></script>