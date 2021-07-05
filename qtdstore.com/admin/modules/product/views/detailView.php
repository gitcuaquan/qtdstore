<?php
get_header()
?>

<head>
    <title>QTD Store - Thêm sản phẩm</title>
    <link rel="stylesheet" href="public/css/form.css">
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <div class="main-content">
                    <h1>Thêm sản phẩm</h1>
                    <!-- <?php echo form_error('success') ?> -->

                    <form action="" method="POST" id="infomation" enctype="multipart/form-data">
                        <div class="box-head">
                            <ul class="breadcrumb-add clear">
                                <li idx="1">Thông tin</li>
                                <li idx="2">Danh mục</li>
                                <li idx="3">Nhập kho</li>
                                <li idx="4">Hình ảnh</li>
                            </ul>
                        </div>
                        <div class="box-body">
                            <div class="step" idx="1">
                                <h2>Thông tin</h2>
                                <label for="product-name">Tên sản phẩm</label>
                                <br><input type="text" name="product_name" id="product-name" disabled="disabled" value="<?php echo $detail_product['product_name'] ?>" class="can">
                                 <?php echo form_error('product_name') ?>

                                <br><label for="product-code">Mã sản phẩm</label>
                                <br><input type="text" name="product_code" id="product-code" disabled="disabled" value="<?php echo $detail_product['product_code'] ?>" class="can">
                                <?php echo form_error('product_code') ?>

                                <br><label for="product-thumb-avt">Ảnh hiển thị</label>
                                <div id="uploadFile">
                                    <input type="file" name="file" id="upload-thumb" data-uri="?mod=product&action=upload_img_post" disabled="disabled" class="can">
                                    <input type="hidden" id="thumbnail_url" name="thumbnail_url" value="">
                                    <button type="submit" name="btn_upload_thumb" id="btn-upload-thumb" class="btn-upload">Tải lên</button>
                                    <div class="show_error"></div>
                                    <div id="show_list_file">
                                        <img src="<?php echo get_thumb_url($detail_product['img_id']) ?>">
                                    </div>
                                </div>
                                <?php echo form_error('thumbnail_url') ?>

                                <br><label for="product-price-in">Giá nhập</label>
                                <br><input type="text" name="product_price_in" id="product-price-in" disabled="disabled" value="<?php echo $detail_product['product_price_in'] ?>" class="can">
                                <?php echo form_error('product_price_in') ?>

                                <br><label for="product-price">Giá bán</label>
                                <br><input type="text" name="product_price" id="product-price" disabled="disabled" value="<?php echo $detail_product['product_price'] ?>" class="can">
                                <?php echo form_error('product_price') ?>

                                <br><label for="product-desc">Mô tả ngắn</label>
                                <br><textarea name="product_desc" id="product-desc" disabled="disabled" class="can"><?php echo $detail_product['product_desc'] ?></textarea>
                                <?php echo form_error('product_desc') ?>

                                <br><label for="product-detail">Chi tiết</label>
                                <br><textarea name="product_detail" id="product-detail" class="ckeditor can" disabled="disabled"><?php echo $detail_product['product_detail'] ?></textarea>
                                <?php echo form_error('product_detail') ?>

                                <br><a href="" class="btn-next">Tiếp</a>
                                <div class="clear-both"></div>
                            </div>
                            <?php $category = get_category_list(2); ?>
                            <div class="step" idx="2">
                                <h2>Danh mục</h2>
                                <?php
                                foreach ($category as $item) {
                                ?>
                                    <input type="checkbox" name="product_category[]" value="<?php echo $item['category_id'] ?>" id="category-'<?php echo $item['category_id'] ?>'" <?php echo check($detail_product['product_id'], $item['category_id']) ?>><label for="category-'<?php echo $item['category_id'] ?>'"><?php echo $item['category_title'] ?></label><br>
                                <?php
                                }
                                ?>

                                <?php echo form_error('product_category') ?>

                                <br>
                                <a href="" class="btn-next">Tiếp</a>
                                <a href="" class="btn-back">Quay lại</a>
                                <div class="clear-both"></div>
                            </div>
                            <div class="step" idx="3">
                                <h2>Nhập kho</h2>
                                <table class="product-storage">
                                    <thead>
                                        <tr>
                                            <td><input type="checkbox" name="select_all" id="select-all"></td>
                                            <td>Size</td>
                                            <td>Số lượng</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" name="select_size[]" value="s" id="select-size-s" idx=1 <?php echo check_storage($detail_product['product_id'], 's') ?>></td>
                                            <td>S</td>
                                            <td><input type="number" disabled="disabled" min="0" name="product_amount[]" id="product-amount-s" class="can-2" value="<?php echo check_amount($detail_product['product_id'], 's') ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="select_size[]" value="m" id="select-size-m" idx=2 <?php echo check_storage($detail_product['product_id'], 'm') ?>></td>
                                            <td>M</td>
                                            <td><input type="number" disabled="disabled" min="0" name="product_amount[]" id="product-amount-m" class="can-2" value="<?php echo check_amount($detail_product['product_id'], 'm') ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="select_size[]" value="l" id="select-size-l" idx=3 <?php echo check_storage($detail_product['product_id'], 'l') ?>></td>
                                            <td>L</td>
                                            <td><input type="number" disabled="disabled" min="0" name="product_amount[]" id="product-amount-l" class="can-2" value="<?php echo check_amount($detail_product['product_id'], 'l') ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="select_size[]" value="xl" id="select-size-xl" idx=4 <?php echo check_storage($detail_product['product_id'], 'xl') ?>></td>
                                            <td>XL</td>
                                            <td><input type="number" disabled="disabled" min="0" name="product_amount[]" id="product-amount-xl" class="can-2" value="<?php echo check_amount($detail_product['product_id'], 'xl') ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="select_size[]" value="xxl" id="select-size-xxl" idx=5 <?php echo check_storage($detail_product['product_id'], 'xxl') ?>></td>
                                            <td>XXL</td>
                                            <td><input type="number" disabled="disabled" min="0" name="product_amount[]" id="product-amount-xxl" class="can-2" value="<?php echo check_amount($detail_product['product_id'], 'xxl') ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="select_size[]" value="over" id="select-size-over" idx=6 <?php echo check_storage($detail_product['product_id'], 'over') ?>></td>
                                            <td>Oversize</td>
                                            <td><input type="number" disabled="disabled" min="0" name="product_amount[]" id="product-amount-over" class="can-2" value="<?php echo check_amount($detail_product['product_id'], 'over') ?>"></td>
                                        </tr>
                                        <tr>
                                    </tbody>
                                </table>
                                <?php echo form_error('select_size') ?>
                                <?php echo form_error('product_amount') ?>

                                <a href="" class="btn-next">Tiếp</a>
                                <a href="" class="btn-back">Quay lại</a>
                                <div class="clear-both"></div>
                            </div>
                            <div class="step" idx="4">
                                <h2>Hình ảnh</h2>
                                <input type="file" name="images[]" id="files" multiple="" disabled="disabled" class="can">
                                <button type="submit" id="bt_upload" name="bt_upload" class="btn-upload">Tải lên</button>

                                <div id="result">
                                    <?php
                                    $list_thumb = get_list_thumb($detail_product['product_id']);
                                    foreach ($list_thumb as $thumb) {
                                    ?>
                                        <img src="<?php echo $thumb['img_url'] ?>" alt="">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <p class="alert">* Tỉ lệ ảnh 1:1</p>
                                <?php echo form_error('upload_multi') ?>
                                <br><a href="" class="btn-back">Quay lại</a>
                                <div class="clear-both"></div>
                            </div>
                        </div>
                        <button type="submit" name="btn_del" id="del">Xóa</button>
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
<script src="public/js/plugins/ckeditor/ckeditor.js"></script>
<script src="public/js/tab-form.js"></script>
<script src="public/js/upload.js"></script>