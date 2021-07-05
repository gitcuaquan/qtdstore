<div class="top-product-main">
    <div class="box-wallpaper">
        <img src="public/images/wallpaper.jpg" alt="" class="img-fluid">
        <div class="wallpaper-caption">
            <?php $wallpaper = get_cat_info() ?>
            <h3><i class="fas fa-tshirt"></i> <?php echo $wallpaper['category_title'] ?></h3>
            <p><?php echo $wallpaper['category_description'] ?></p>
        </div>
    </div>
    <div class="category-option">
        <span>Hiện có <span class="product-num"><?php echo get_number_product() ?></span> sản phẩm</span>
        <form action="" method="get">
            <label for="sort"><i class="fas fa-sort-amount-up-alt"></i> Sắp xếp theo: </label>
            <select name="product_sort">
                <option value="">Mặc định</option>
                <option value="1">Tên (A-Z)</option>
                <option value="2">Tên (Z-A)</option>
                <option value="3">Giá (Thấp-Cao)</option>
                <option value="4">Giá (Cao-Thấp)</option>
                <option value="5">Mới nhất</option>
                <option value="6">Cũ nhất</option>
            </select>
        </form>
    </div>
</div>