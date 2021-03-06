<?php

if (!isset($_SESSION['cart'])) {
    $limit = get_num_product();

    for ($i = 1; $i <= $limit; $i++) {
        if (isset($_COOKIE['product_id_' . $i])) {
            $_SESSION['cart']['buy'][$i]['product_id'] = $_COOKIE['product_id_' . $i];
        }
        if (isset($_COOKIE['product_name_' . $i])) {
            $_SESSION['cart']['buy'][$i]['product_name'] = $_COOKIE['product_name_' . $i];
        }
        if (isset($_COOKIE['product_price_' . $i])) {
            $_SESSION['cart']['buy'][$i]['product_price'] = $_COOKIE['product_price_' . $i];
        }
        if (isset($_COOKIE['product_size_' . $i])) {
            $_SESSION['cart']['buy'][$i]['product_size'] = $_COOKIE['product_size_' . $i];
        }
        if (isset($_COOKIE['qty_' . $i])) {
            $_SESSION['cart']['buy'][$i]['qty'] = $_COOKIE['qty_' . $i];
        }
        if (isset($_COOKIE['sub_total_' . $i])) {
            $_SESSION['cart']['buy'][$i]['sub_total'] = $_COOKIE['sub_total_' . $i];
        }
    }
    if (isset($_COOKIE['num_order'])) {
        $_SESSION['cart']['info']['num_order'] = $_COOKIE['num_order'];
    }
    if (isset($_COOKIE['total'])) {
        $_SESSION['cart']['info']['total'] = $_COOKIE['total'];
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/all.css">
    <link rel="stylesheet" href="public/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="public/css/global.css">
    <link rel="stylesheet" href="public/css/main.css">

</head>

<body>
    <div id="site" class="">
        <!-- responsive -->
        <div class="res-menu-box">
            <div class="res-menu-box-head">
                <form action="" method="post" id="form-search-res">
                    <input type="search" name="" placeholder="T??m ki???m..." id="">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="res-menu-box-body">
                <ul class="clear res-menu">
                    <li>
                        <div class="menu-item">
                            <a href="">T??i kho???n</a>
                        </div>
                    </li>
                    <li>
                        <div class="menu-item">
                            <a href="">Trang ch???</a>
                        </div>
                    </li>
                    <li>
                        <div class="menu-item">
                            <a href="">N???i b???t</a>
                        </div>
                    </li>
                    <li>
                        <div class="menu-item">
                            <a href="">M???i</a>
                        </div>
                    </li>
                    <li>
                        <div class="menu-item have-child">
                            <a href="">S???n ph???m</a>
                            <a href="" class="plus">&#10095;</a>
                        </div>
                        <ul class="clear res-sub-menu">
                            <li><a href="">Th???i trang nam</a></li>
                            <li><a href="">Th???i trang n???</a></li>
                            <li><a href="">Th???i trang unisex</a></li>
                            <li><a href="">Qu???n</a></li>
                            <li><a href="">??o</a></li>
                            <li><a href="">V??y</a></li>
                            <li><a href="">Th???i trang xu??n h??</a></li>
                            <li><a href="">Th???i trang thu ????ng</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="menu-item">
                            <a href="">Gi???i thi???u</a>
                        </div>
                    </li>
                    <li>
                        <div class="menu-item">
                            <a href="">Li??n h???</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end responsive -->

        <!-- wrapper -->
        <div id="wrapper">
            <!-- header -->
            <div id="header">
                <!-- Top header -->
                <div id="top-header">
                    <div class="container">
                        <div class="row">
                            <!-- time online -->
                            <div class="col-lg-6 col-md-5">
                                <i class="far fa-clock"></i>
                                <span> Online: 8:00 a.m - 10:00 p.m</span>
                            </div>
                            <!-- end time online -->

                            <!-- hotline -->
                            <div class="col-lg-6 col-md-7 text-right" id="hotline">
                                <i class="fas fa-phone"></i> Hotline:
                                <a href="" class="top-hotline">036.3100.093</a> |
                                <a href="" class="top-about">Gi???i thi???u</a> |
                                <a href="" class="top-contact">Li??n h???</a> |
                                <a href="" class="top-tutorial">H?????ng d???n</a>
                            </div>
                            <!-- end hotline -->
                        </div>
                    </div>
                </div>
                <!-- end top header -->

                <!-- main header -->
                <div id="main-header">
                    <div class="container">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-xl-2 col-lg-2 col-md-2">
                                <a href="?" class="top-logo">
                                    <img src="public/images/logo.png" class="img-fluid">
                                </a>
                            </div>
                            <!-- end logo -->

                            <!-- search -->
                            <div class="col-xl-6 col-lg-5 col-md-8">
                                <div class="box-search">
                                    <form action="" method="post">
                                        <select name="product_cat" class="product-cat-search">
                                            <option value="">-- Danh m???c --</option>
                                            <option value="1">Th???i trang</option>
                                            <option value="2">Ph??? ki???n</option>
                                            <option value="3">Qu???n ??o nam</option>
                                            <option value="4">Qu???n ??o n???</option>
                                            <option value="5">Qu???n ??o unisex</option>
                                            <option value="6">Th???i trang xu??n h??</option>
                                            <option value="7">Th???i trang thu ????ng</option>
                                        </select>
                                        <input type="search" name="search" id="search" placeholder="T??m ki???m s???n ph???m?">
                                        <input type="submit" value="T??m ki???m" name="btn_search" class="btn-search">
                                    </form>
                                </div>
                            </div>
                            <!-- end search -->

                            <!-- right header -->
                            <div class="col-xl-4 col-lg-5 col-md-2" id="right-header">
                                <ul class="clear right-header">
                                    <li>
                                        <span class="right-header-icon"><i class="fas fa-user"></i></span>
                                        <a href="<?php if (isset($_SESSION['user_login'])) {
                                                        echo check_position_redirect($_SESSION['user_login']);
                                                    } else {
                                                        echo "?mod=users&action=login";
                                                    }
                                                    ?>" class="right-header-link">T??i kho???n<br></bt>
                                            <p>
                                                <?php
                                                if (isset($_COOKIE['user_name'])) {
                                                    if (isset($_SESSION['user_name'])) {
                                                        echo "Ch??o <strong>{$_SESSION['user_name']}</strong>";
                                                    } else {
                                                        echo "Ch??o <strong>{$_COOKIE['user_name']}</strong>";
                                                    }
                                                } else {
                                                    if (isset($_SESSION['user_name'])) {
                                                        echo "Ch??o <strong>{$_SESSION['user_name']}</strong>";
                                                    } else {
                                                        echo "Login/Register";
                                                    }
                                                }
                                                ?>
                                            </p>
                                        </a>
                                        <div class="clear-both"></div>
                                    </li>
                                    <li>
                                        <span class="right-header-icon"><i class="fas fa-heart"></i></span>
                                        <a href="" class="right-header-link">Y??u th??ch<br>
                                            <p>3 s???n ph???m</p>
                                        </a>
                                        <div class="clear-both"></div>
                                    </li>
                                    <li>
                                        <span class="right-header-icon"><i class="fas fa-truck"></i></span>
                                        <a href="https://viettelpost.com.vn/tra-cuu-hanh-trinh-don/" target="_blank" class="right-header-link">Ki???m tra<br>
                                            <p>h??nh tr??nh</p>
                                        </a>
                                        <div class="clear-both"></div>
                                    </li>
                                </ul>
                            </div>
                            <!-- end right header -->
                        </div>
                    </div>
                </div>
                <!-- end main header -->
            </div>
            <!-- end header -->

            <!-- navigation menu -->
            <nav>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11 col-md-10 col-sm-4 col-4">
                            <?php $list_cateogry = get_category_list(0) ?>
                            <ul class="clear main-menu">
                                <li><a href="?">Trang ch???</a></li>
                                <?php
                                foreach ($list_cateogry as $item) {
                                ?>
                                    <li>
                                        <a href="?mod=<?php echo check_cat($item['category_id']) ?>"><?php echo $item['category_title'] ?></a>
                                        <?php $children = check_parent(1, $item['category_id']) ?>
                                        <ul class="clear sub-menu-1">
                                            <?php
                                            foreach ($children as $ch1) {
                                            ?>
                                                <li>
                                                    <?php $children_2 = check_parent(2, $ch1['category_id']) ?>
                                                    <ul class="clear sub-menu-2">
                                                        <?php
                                                        foreach ($children_2 as $ch2) {
                                                        ?>
                                                            <li><a href="?mod=<?php echo check_cat($item['category_id']) ?>&cat_id=<?php echo $ch2['category_id'] ?>"><?php echo $ch2['category_title'] ?></a></li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                    <a href="?mod=<?php echo check_cat($item['category_id']) ?>&cat_id=<?php echo $ch1['category_id'] ?>"><?php echo $ch1['category_title'] ?></a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <span class="menu-bar-icon">&#9776;</span>
                        </div>
                        <div class="col-sm-4 col-4" id="logo-res">
                            <a href="" class="logo-res">
                                <img src="public/images/logo.png" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-4 col-4 text-right p-relative">
                            <a href="?mod=cart" class="cart-icon" title="Click ????? xem gi??? h??ng"><i class="fas fa-shopping-cart"></i></a>
                            <span class="cart-qty"><?php echo get_num_order() ?></span>
                            <!-- <div class="cart">
                                <div class="cart-head">
                                    <p>Hi???n c?? <span class="cart-product-qty"><?php echo get_num_order() ?></span> s???n ph???m trong gi??? h??ng.</p>
                                </div>
                                <div class="cart-body">
                                    <ul class="clear cart-list-item">
                                        <li class="cart-item">
                                            <div class="cart-item-thumb">
                                                <a href=""><img src="public/images/buy-1.jpg" alt="" class="img-fluid"></a>
                                            </div>
                                            <div class="cart-item-info">
                                                <a href="" class="cart-item-title">Vest nano v???t tr??n B416</a>
                                                <span class="cart-item-price">450.000??</span>
                                                <p>- Size: <span class="cart-item-size">XL</span></p>
                                                <p>- S??? l?????ng: <span class="cart-item-qty">1</span></p>
                                                <a href="" class="cart-item-del"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                    <div class="cart-total">
                                        <span>T???ng:</span>
                                        <span class="price">1.800.000??</span>
                                    </div>
                                </div>
                                <div class="cart-footer">
                                    <a href="" class="view-more-cart">Xem chi ti???t</a>
                                    <a href="" class="btn-checkout">&#10004; Thanh to??n</a>
                                </div>
                            </div>
                            <div class="cart-notify fade-out">
                                <p>
                                    ???? th??m th??nh c??ng !<br>
                                    B???m v??o <a href="">????y</a> ????? xem gi??? h??ng...
                                    <span class="icon-x">&#10006;</span>
                                </p>
                            </div>
                            <div class="cart-like-notify fade-out">
                                <p>
                                    ???? th??m th??nh c??ng !<br>
                                    B???m v??o <a href="">????y</a> ????? xem danh s??ch y??u th??ch...
                                    <span class="icon-x">&#10006;</span>
                                </p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end menu -->