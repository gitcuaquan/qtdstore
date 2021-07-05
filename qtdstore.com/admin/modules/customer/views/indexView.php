<?php
get_header()
?>

<head>
    <title>QTD Store - Khách hàng</title>
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-lg-10 content">
                <h1>Danh sách khách hàng</h1>
                <form action="" method="post">
                    <input type="search" name="search" placeholder="Nhập số điện thoại...">
                    <button type="submit" name="btn_search" id="search">Tìm kiếm</button>
                    <button type="submit" name="btn_del" id="del">Xóa</button>
                    <table>
                        <thead>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>STT</td>
                                <td>Số điện thoại</td>
                                <td>Họ và tên</td>
                                <td>Email</td>
                                <td>Giới tính</td>
                                <td>Ngày sinh</td>
                                <td>Địa chỉ</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">0363100093</a></td>
                                <td class="text-left">Nguyễn Đức Thương</td>
                                <td class="text-left">ndtspear@gmail.com</td>
                                <td>Nam</td>
                                <td>05/04/1999</td>
                                <td>Đại Bái - Gia Bình - Bắc Ninh</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">0363100093</a></td>
                                <td class="text-left">Nguyễn Đức Thương</td>
                                <td class="text-left">ndtspear@gmail.com</td>
                                <td>Nam</td>
                                <td>05/04/1999</td>
                                <td>Đại Bái - Gia Bình - Bắc Ninh</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">0363100093</a></td>
                                <td class="text-left">Nguyễn Đức Thương</td>
                                <td class="text-left">ndtspear@gmail.com</td>
                                <td>Nam</td>
                                <td>05/04/1999</td>
                                <td>Đại Bái - Gia Bình - Bắc Ninh</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">0363100093</a></td>
                                <td class="text-left">Nguyễn Đức Thương</td>
                                <td class="text-left">ndtspear@gmail.com</td>
                                <td>Nam</td>
                                <td>05/04/1999</td>
                                <td>Đại Bái - Gia Bình - Bắc Ninh</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">0363100093</a></td>
                                <td class="text-left">Nguyễn Đức Thương</td>
                                <td class="text-left">ndtspear@gmail.com</td>
                                <td>Nam</td>
                                <td>05/04/1999</td>
                                <td>Đại Bái - Gia Bình - Bắc Ninh</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all">
                                </td>
                                <td>1</td>
                                <td><a href="">0363100093</a></td>
                                <td class="text-left">Nguyễn Đức Thương</td>
                                <td class="text-left">ndtspear@gmail.com</td>
                                <td>Nam</td>
                                <td>05/04/1999</td>
                                <td>Đại Bái - Gia Bình - Bắc Ninh</td>
                            </tr>   
                        </tbody>
                    </table>
                    <p>
                        <span class="alert">* Click vào số điện thoại để xem chi tiết</span>
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

