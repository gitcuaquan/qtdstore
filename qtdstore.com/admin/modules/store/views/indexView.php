<?php
get_header()
?>

<head>
    <title>QTD Store - Quản lý mã giảm giá</title>
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <h1>Danh sách mã giảm giá</h1>
                <a href="" class="btn-add-new">Thêm mới</a>
                <form action="" method="post">
                    <input type="search" name="search" placeholder="Nhập tên đăng nhập...">
                    <button type="submit" name="btn_search" id="search">Tìm kiếm</button>
                    <button type="submit" name="btn_del" id="del">Xóa</button>
                    <table>
                        <thead>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>STT</td>
                                <td>Mã giảm giá</td>
                                <td>Giá trị giảm</td>
                                <td>Bắt đầu</td>
                                <td>HSD</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">GGTD3434</a></td>
                                <td>10%</td>
                                <td>22/10/2020</td>
                                <td>30/10/2020</td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">GGTD3434</a></td>
                                <td>10%</td>
                                <td>22/10/2020</td>
                                <td>30/10/2020</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">GGTD3434</a></td>
                                <td>10%</td>
                                <td>22/10/2020</td>
                                <td>30/10/2020</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">GGTD3434</a></td>
                                <td>10%</td>
                                <td>22/10/2020</td>
                                <td>30/10/2020</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        <span class="pagging">
                            <a href="" class="prev"><i class="fas fa-angle-double-left"></i></a>
                            <a href="" class="">1</a>
                            <a href="" class="">2</a>
                            <a href="" class="">3</a>
                            <a href="" class="next"><i class="fas fa-angle-double-right"></i></a>
                        </span>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>