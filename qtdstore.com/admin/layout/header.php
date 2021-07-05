<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div class="container-fluid">
                <div class="col-lg-5 col-md-4 col-sm-4 col-3">

                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 logo">
                    <a href="?">
                        <img src="public/images/qtd_logo.png" class="img-fluid">
                    </a>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 col-3">
                    <span class="right-header">
                        <span class="account-bar">
                            <img src="public/images/user-1.png" alt="">
                            <h3><?php
                                $user = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$_SESSION['user_login']}'");
                                echo $user['first_name'] . " " . $user['last_name'];
                                ?></h3>
                            <div class="account-action">
                                <ul class="clear action-list">
                                    <li><a href="?mod=users&action=detail">Thông tin cá nhân</a></li>
                                    <li><a href="?mod=users&action=logout">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>