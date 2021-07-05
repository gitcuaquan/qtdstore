<div class="sidebar-box">
    <div class="sidebar-box-head">
        <h3>DANH MỤC SẢN PHẨM</h3>
    </div>
    <div class="sidebar-box-body">
        <ul class="clear cate-list">
            <?php
            $list_category = check_parent(1, 4);
            foreach ($list_category as $item) {
            ?>
                <li>
                    <?php $children = check_parent(2, $item['category_id']) ?>
                    <ul class="clear sub-cate">
                        <?php
                        foreach ($children as $ch1) {
                        ?>
                            <li>
                                <?php $children_2 = check_parent(2, $ch1['category_id']) ?>
                                <a href="?mod=product&cat_id=<?php echo $ch1['category_id'] ?>"><?php echo $ch1['category_title'] ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <a href="?mod=product&cat_id=<?php echo $item['category_id'] ?>"><?php echo $item['category_title'] ?></a>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>
</div>
<!-- end category -->

<!-- sidebar-featured -->
<div class="sidebar-box">
    <div class="sidebar-box-head">
        <h3>SẢN PHẨM NỔI BẬT</h3>
    </div>
    <div class="sidebar-box-body">
        <?php $list_feature = get_feature_product() ?>
        <ul class="clear featured-list">
            <?php
            foreach ($list_feature as $item) {
            ?>
                <li>
                    <div class="featured-item-thumb">
                        <a href="?mod=product&action=detail&id=<?php echo $item['product_id'] ?>"><img src="admin/<?php echo get_img_url($item['product_id']) ?>" alt="" class="img-fluid"></a>
                    </div>
                    <div class="feature-item-info">
                        <a href="" class="item-title"><?php echo $item['product_name'] ?></a>
                        <p><span class="sidebar-new-price"><?php echo $item['product_price'] ?></span></p>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
<!-- end sidebar-featured -->
<div class="sidebar-bottom">
    <a href=""><img src="public/images/banner_qc.png" alt="" class="img-fluid"></a>
    <h4>ĐÓN CHÀO MÙA ĐÔNG CÙNG QTD STORE</h4>
    <h5>GIẢM NGAY 20% <br> KHI MUA THEO BỘ NAM NỮ</h5>
    <img src="public/images/HOT.gif" alt="" class="hot">
    <a href="" class="btn-view-detail">Khám phá ngay &#10132;</a>
</div>
<!-- end ads -->