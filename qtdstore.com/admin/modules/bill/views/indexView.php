<?php
get_header()
?>

<head>
    <title>QTD Store - Quản lý đơn hàng</title>
    <link rel="stylesheet" href="public/css/form-search.css">
    <link rel="stylesheet" href="public/css/table.css">
    <link rel="stylesheet" href="public/css/bill.css">
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <div class="main-content">
                    <h1>Danh sách đơn hàng</h1>
                    <ul class="clear order-list">
                        <li class="active">
                            <a href="">Tất cả (<span class="num">20</span>)</a>
                        </li>
                        <li>
                            <a href="">Đã xác thực (<span class="num">20</span>)</a>
                        </li>
                        <li>
                            <a href="">Chưa xác thực (<span class="num">0</span>)</a>
                        </li>
                        <li>
                            <a href="">Đã thanh toán (<span class="num">20</span>)</a>
                        </li>
                    </ul>
                    <form action="" method="get">
                        <input type="hidden" name="mod" value="product">
                        <input type="text" name="search" placeholder="Nhập thông tin đơn hàng..." id="search-box">
                        <input type="submit" name="btn_search" id="search" value="Tìm kiếm">
                    </form>
                    <form action="" method="post">
                        <button type="submit" name="btn_del" id="del">Xóa</button>
                        <table>
                            <thead>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="select_all" id="select-all">
                                    </td>
                                    <td>STT</td>
                                    <td>Mã đơn hàng</td>
                                    <td>Mã khách hàng</td>
                                    <td>Tổng hóa đơn</td>
                                    <td>Trạng thái</td>
                                    <td>Tình trạng</td>
                                    <td>Ngày xuất</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($list_bill as $bill) {
                                    $temp++;
                                ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="select[]" id="select-<?php echo $bill['bill_id'] ?>">
                                        </td>
                                        <td><?php echo $temp ?></td>
                                        <td><a href="?mod=bill&action=detail&id=<?php echo $bill['bill_id'] ?>"><?php echo $bill['bill_code'] ?></a></td>
                                        <td><a href="?mod=customer&action=detail&id=<?php echo $bill['customer_id'] ?>">KH-<?php echo $bill['customer_id'] ?></a></td>
                                        <td><span class="price"><?php echo currency_format($bill['total']) ?></span></td>
                                        <td><?php echo check_status($bill['bill_id']) ?></td>
                                        <td><?php echo check_condition($bill['bill_id']) ?></td>
                                        <td><?php echo $bill['bill_date'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </form>
                    <p>
                        <span class="alert">* Click vào mã đơn hàng để xem chi tiết</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>