<?php
get_header()
?>

<head>
    <title>QTD Store - Quản lý tài khoản</title>
    <link rel="stylesheet" href="public/css/form-search.css">
    <link rel="stylesheet" href="public/css/table.css">
</head>

<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 sidebar">
                <?php get_sidebar() ?>
            </div>

            <div class="col-xl-10 content">
                <div class="main-content">
                    <h1>Danh sách tài khoản</h1>
                    <ul class="clear order-list">
                        <li class="active">
                            <a href="">Tất cả (<span class="num"><?php echo count($list_user) ?></span>)</a>
                        </li>
                        <li>
                            <a href="">Chưa xác thực (<span class="num">0</span>)</a>
                        </li>
                    </ul>
                    <form action="" method="get">
                        <input type="hidden" name="mod" value="users">
                        <input type="text" name="search" placeholder="Nhập thông đăng nhập..." id="search-box">
                        <input type="submit" name="btn_search" id="search" value="Tìm kiếm">
                    </form>
                    <form action="" method="post">
                        <button type="submit" name="btn_del" id="del">Xóa</button>
                        <div class="list">
                            <table>
                                <thead>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="select_all" id="select-all">
                                        </td>
                                        <td>STT</td>
                                        <td>Tên đăng nhập</td>
                                        <td>Họ và tên</td>
                                        <td>Email</td>
                                        <td>Chức vụ</td>
                                        <td>Loại</td>
                                        <td>Trạng thái</td>
                                        <td>Ngày đăng ký</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $temp = 0;
                                    foreach ($list_user as $user) {
                                        $temp++;
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="select[]" value="<?php echo $user['user_id'] ?>" id="select">
                                            </td>
                                            <td><?php echo $temp ?></td>
                                            <td><a href="?mod=users&action=detail&id=<?php echo $user['user_id'] ?>"><?php echo $user['username'] ?></a></td>
                                            <td class="text-left"><?php echo $user['first_name'] . " " . $user['last_name'] ?></td>
                                            <td class="text-left"><?php echo $user['email'] ?></td>
                                            <td><?php echo check_position($user['position']) ?></td>
                                            <td>Thường</td>
                                            <td><?php echo check_active($user['is_active']) ?></td>
                                            <td><?php echo $user['reg_date'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="foot-table">
                        <span class="alert">* Click vào tên đăng nhập để xem chi tiết</span>
                        <?php
                        echo get_pagging("?mod=users");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>