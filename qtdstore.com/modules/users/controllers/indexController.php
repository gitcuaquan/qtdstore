<?php

function construct()
{
    load_model('index');
    load('lib', 'validation');
    load('lib', 'send-mail');
}


function indexAction()
{
    if (!isset($_SESSION['user_login'])) {
        if (!isset($_COOKIE['user_login'])) {
            redirect_to('?mod=users&action=login');
        } else {
            $user = get_user_by_username($_COOKIE['user_login']);
            $data['user'] = $user;
            load_view('index', $data);
        }
    } else {
        $position = get_position($_SESSION['user_login']);
        if ($position == 'manager' || $position == 'salesman') {
            redirect_to('admin/?');
        }
        if ($position == 'member') {
            if (isset($_POST['btn_submit'])) {
                $username = $_SESSION['user_login'];
                $user = get_user_by_username($username);
                $password = md5($_POST['password']);

                $error = array();

                if (empty($password)) {
                    $error['password'] = "<p class='error'>* Không được để trống !</p>";
                } else {
                    if ($password != $user['password']) {
                        $error['password'] = "<p class='error'>* Mật khẩu không đúng !</p>";
                    }
                }

                $new_password = md5($_POST['new_password']);
                // new password
                if (empty($new_password)) {
                    $error['new_password'] = "<p class='error'>* Không được để trống !</p>";
                } else {
                    if (!is_password($new_password)) {
                        $error['new_password'] = "<p class='error'>* Mật khẩu không đúng định dạng !</p>";
                    }
                }

                // repeat new password
                if (empty($_POST['confirm_new_password'])) {
                    $error['confirm_new_password'] = "<p class='error'>* Không được để trống !</p>";
                } else {
                    if (md5($_POST['confirm_new_password']) != $new_password) {
                        $error['confirm_new_password'] = "<p class='error'>* Mật khẩu không khớp !</p>";
                    }
                }

                if (empty($error)) {
                    $data_update = array(
                        'password' => $new_password
                    );
                    update_users($data_update, $username);

                    echo "<div class='password-alert'><p class='success'>Cập nhật thành công ! </p><span class='ok-close'>Ok</span></div>";
                }
            }

            $user = get_user_by_username($_SESSION['user_login']);
            $data['user'] = $user;
            load_view('index', $data);
        }
    }
}

function update_userAction()
{
    $username = $_SESSION['user_login'];
    // first_name
    $first_name = $_POST['first_name'];
    $error = array();

    // first_name
    if (empty($first_name)) {
        $error['first_name'] = "<p class='error'>* Không được để trống !</p>";
    } else {
        if (!is_first_name($first_name)) {
            $error['first_name'] = "<p class='error'>* Họ không đúng định dạng !</p>";
        }
    }

    // last_name
    $last_name = $_POST['last_name'];
    if (empty($last_name)) {
        $error['last_name'] = "<p class='error'>* Không được để trống !</p>";
    } else {
        if (!is_last_name($last_name)) {
            $error['last_name'] = "<p class='error'>* Tên không đúng định dạng !</p>";
        }
    }

    // phone
    $phone = $_POST['phone'];

    if (empty($phone)) {
        $error['phone'] = "<p class='error'>Không được để trống !</p>";
    } else {
        if (!is_phone($phone)) {
            $error['phone'] = "<p class='error'>Số điện thoại không đúng định dạng !</p>";
        }
    }

    // gender
    $gender = $_POST['gender'];

    // email
    $date_of_birth = $_POST['date_of_birth'];

    // region
    $region = $_POST['region'];

    $address = $_POST['address'];

    if (empty($error)) {
        $data_update = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'gender' => $gender,
            'date_of_birth' => $date_of_birth,
            'region_id' => $region,
            'address' => $address
        );

        update_users($data_update, $username);

        $user = get_user_by_username($username);
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $phone = $user['phone'];
        $gender = $user['gender'];
        $date_of_birth = $user['date_of_birth'];
        $region = $user['region_id'];
        $address = $user['address'];
        $data = array(
            'status' => 'ok',
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'gender' => $gender,
            'date_of_birth' => $date_of_birth,
            'region_id' => $region,
            'address' => $address,
            'success' => "Cập nhật thành công !"
        );
        // show_array($data);
        echo json_encode($data);
    } else {
        $data = array(
            'status' => 'error',
            'error' => $error
        );
        echo json_encode($data);
    }
}

function uploadAction()
{
    if ($_SERVER['REQUEST_METHOD']) {
        if (!isset($_FILES['file'])) {
            $error['file'] = "Bạn chưa chọn bấc kỳ file ảnh nào";
            $data = array(
                "status" => "error",
                "error" => $error
            );
            echo json_encode($data);
        } else {
            $error = array();
            $target_dir  = "admin/public/uploads/users/";
            $file_name = basename($_FILES['file']['name']);
            $target_file = $target_dir . $file_name;
            // check type file img valid
            $type_file = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $error['file'] = "Hệ thống không hỗ trợ file này, vui lòng chọn một file ảnh hợp lệ";
            } else {
                $file_size = $_FILES['file']['size'];
                if ($file_size > 5242880) {
                    $error['file'] = "File bạn chọn không được vược quá 5MB";
                } else {
                    if (file_exists($target_file)) {
                        $get_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                        $name_new = $get_name . " - Copy.";
                        $path_file_new = $target_dir . $name_new . $type_file;
                        $k = 1;
                        while (file_exists($path_file_new)) {
                            $get_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                            $name_new = $get_name . " - Copy({$k}).";
                            $path_file_new = $target_dir . $name_new . $type_file;
                            $k++;
                        }
                        $target_file = $path_file_new;
                    }
                }
            }
            $username = $_SESSION['user_login'];
            // upload when not error
            if (empty($error)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                    $flag = true;
                    $img = array(
                        'img_id' => '',
                        'img_url' => $target_file
                    );
                    db_insert("tbl_img",  $img);

                    $img_id = get_img_id_by_path($img['img_url']);
                    $avatar = array(
                        'img_id' => $img_id
                    );
                    db_update("tbl_users", $avatar, "`username` = '{$username}'");

                    $url = get_img_url_by_username($username);
                    $data = array(
                        "status" => "ok",
                        "file_path" => $url
                    );
                } else {
                    $error['file'] = "Upload không thành công";
                    $data = array(
                        "status" => "error",
                        "error" => $error
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "error" => $error
                );
            }
            echo json_encode($data);
        }
    }
}


function loginAction()
{
    global $username, $password, $error, $position, $last_name;
    if (!isset($_COOKIE['user_login'])) {
        if (isset($_POST['btn_login'])) {
            $error = array();

            // Username
            if (empty($_POST['username'])) {
                $error['username'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                $username = $_POST['username'];
            }

            // Password
            if (empty($_POST['password'])) {
                $error['password'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                $password = md5($_POST['password']);
            }

            if (empty($error)) {
                if (check_login($username, $password)) {
                    $last_name = get_name($username);
                    $_SESSION['is_login'] = true;
                    $_SESSION['user_login'] = $username;
                    $_SESSION['user_name'] = $last_name;
                    if (isset($_POST['remember'])) {
                        setcookie('is_login', true, time() + 86400);
                        setcookie('user_login', $username, time() + 86400);
                        setcookie('user_name', $last_name, time() + 86400);
                    }
                    $position = check_position($username);
                    if ($position == 'member') {
                        redirect_to('?');
                    } else {
                        redirect_to('admin/');
                    }
                } else {
                    $error['account'] = "<p class='error'>* Tài khoản hoặc mật khẩu không đúng !</p>";
                }
            }
        }
        load_view('login');
    } else {
        redirect_to("?mod=users");
    }
}

function logoutAction()
{
    $username = $_SESSION['user_login'];
    $last_name = $_SESSION['user_name'];
    setcookie('is_login', true, time() - 86400);
    setcookie('user_login', $username, time() - 86400);
    setcookie('user_name', $last_name, time() - 86400);

    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    unset($_SESSION['user_name']);
    redirect_to('?mod=users&action=login');
}

function regAction()
{
    if (!isset($_SESSION['user_login'])) {
        global $error, $username, $password, $email, $first_name, $phone, $gender, $last_name;
        if (isset($_POST['btn_reg'])) {
            $error = array();
            // username
            if (empty($_POST['username'])) {
                $error['username'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                if (!is_username($_POST['username'])) {
                    $error['username'] = "<p class='error'>* Tên đăng nhập không đúng định dạng !</p>";
                } else {
                    $username = $_POST['username'];
                }
            }

            // first_name
            if (empty($_POST['first_name'])) {
                $error['first_name'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                if (!is_first_name($_POST['first_name'])) {
                    $error['first_name'] = "<p class='error'>* Họ không đúng định dạng !</p>";
                } else {
                    $first_name = $_POST['first_name'];
                }
            }

            // last_name
            if (empty($_POST['last_name'])) {
                $error['last_name'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                if (!is_last_name($_POST['first_name'])) {
                    $error['last_name'] = "<p class='error'>* Tên không đúng định dạng !</p>";
                } else {
                    $last_name = $_POST['last_name'];
                }
            }

            // phone
            if (empty($_POST['phone'])) {
                $error['phone'] = "<p class='error'>Không được để trống !</p>";
            } else {
                if (!is_phone($_POST['phone'])) {
                    $error['phone'] = "<p class='error'>Số điện thoại không đúng định dạng !</p>";
                } else {
                    $phone = $_POST['phone'];
                }
            }

            // gender
            if (empty($_POST['gender'])) {
                $error['gender'] = "<p class='error'>* Bạn cần phải chọn giới tính !</p>";
            } else {
                $gender = $_POST['gender'];
            }

            // email
            if (empty($_POST['email'])) {
                $error['email'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                if (!is_email($_POST['email'])) {
                    $error['email'] = "<p class='error'>* Email không đúng định dạng !</p>";
                } else {
                    $email = $_POST['email'];
                }
            }

            // password
            if (empty($_POST['password'])) {
                $error['password'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = "<p class='error'>* Mật khẩu không đúng định dạng !</p>";
                } else {
                    $password = md5($_POST['password']);
                }
            }

            // reepeat password
            if (empty($_POST['repeat_password'])) {
                $error['repeat_password'] = "<p class='error'>* Không được để trống !</p>";
            } else {
                if ($_POST['repeat_password'] != $_POST['password']) {
                    $error['repeat_password'] = "<p class='error'>* Mật khẩu không khớp !</p>";
                }
            }

            // kết luận
            if (empty($error)) {
                if (!user_exists($username, $email)) {
                    $active_token = md5($username . time());
                    $data = array(
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'username' => $username,
                        'password' => $password,
                        'phone' => $phone,
                        'gender' => $gender,
                        'active_token' => $active_token,
                        'reg_date' => date('d/m/y')
                    );
                    db_insert("tbl_users", $data);
                    $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                    $content = "<p>Chào bạn A, bạn vui lòng click vào link này để kích hoạt tài khoản: <a href='{$link_active}'>Kích hoạt</a></p>
                    <p>Nếu không phải bạn đăng ký tài khoản thì hãy bỏ qua email này</p>
                    <p>Team support</p>";

                    send_mail($email, $first_name . " " . $last_name, 'Kích hoạt tài khoản', $content);
                    // redirect_to("?mod=users&action=login");
                    $error['account'] = "<p class='success'>Đăng ký thành công, vui lòng kiểm tra email để kích hoạt tài khoản !</p>";
                } else {
                    $error['account'] = "<p class='error'>* Tài khoản hoặc email đã tồn tại trên hệ thống !</p>";
                }
            }
        }
        load_view('reg');
    } else {
        redirect_to('?mod=users');
    }
}

function activeAction()
{
    $active_token = $_GET['active_token'];
    $link_login = base_url("?mod=users&action=login");
    if (check_active_token($active_token)) {
        active_user($active_token);
        redirect_to($link_login);
    } else {
        echo "<p class='error'>* Kích hoạt không thành công ! Có thể tài khoản của bạn đã được kích hoạt trước đó, vui lòng click vào <a href='{$link_login}'>đây</a> để đăng nhập !</p>";
    }
}

function resetAction()
{
    if (!isset($_SESSION['user_login'])) {
        global $error, $email;
        if (!isset($_GET['reset_token'])) {
            if (isset($_POST['btn_reset'])) {
                $error = array();

                // email
                if (empty($_POST['email'])) {
                    $error['email'] = "<p class='error'>* Không được để trống !</p>";
                } else {
                    if (!is_email($_POST['email'])) {
                        $error['email'] = "<p class='error'>* Email không đúng định dạng !</p>";
                    } else {
                        $email = $_POST['email'];
                    }
                }

                // kết luận
                if (empty($error)) {
                    if (check_email($email)) {
                        $reset_token = md5($email . time());
                        $data = array(
                            'reset_token' => $reset_token
                        );
                        // Cập nhật mã
                        update_reset_token($data, $email);
                        // Gửi link khôi phục qua mail
                        $link_reset = base_url("?mod=users&action=reset&reset_token={$reset_token}");
                        $content = "<p>Chào bạn A, bạn vui lòng click vào link này để thiết lập lại mật khẩu: $link_reset</p>
                    <p>Nếu không phải bạn yêu cầu lấy lại mật khẩu thì hãy bỏ qua email này</p>
                    <p>CSKH QTD Store</p><br>
                    <p>Hotline: 0363100093</p>";
                        send_mail($email, '', "Khôi phục mật khẩu", $content);
                        $error['confirm'] = "<p class='success'>Xác thực thành công, vui lòng check email để đổi mật khẩu mới !</p>";
                    } else {
                        $error['confirm'] = "<p class='error'>Địa chỉ email không tồn tại trên hệ thống !</p>";
                    }
                }
            }
            load_view('reset');
        } else {
            $reset_token = $_GET['reset_token'];
            if (check_reset_token($reset_token)) {
                // hiển thị form
                if (isset($_POST['btn_save'])) {
                    $error = array();

                    // password
                    if (empty($_POST['password'])) {
                        $error['password'] = "<p class='error'>* Không được để trống !</p>";
                    } else {
                        if (!is_password($_POST['password'])) {
                            $error['password'] = "<p class='error'>* Mật khẩu không đúng định dạng !</p>";
                        } else {
                            $password = md5($_POST['password']);
                        }
                    }

                    // reepeat password
                    if (empty($_POST['repeat_password'])) {
                        $error['repeat_password'] = "<p class='error'>* Không được để trống !</p>";
                    } else {
                        if ($_POST['repeat_password'] != $_POST['password']) {
                            $error['repeat_password'] = "<p class='error'>* Mật khẩu không khớp !</p>";
                        }
                    }

                    // kết luận
                    if (empty($error)) {
                        $data = array(
                            'password' => $password
                        );
                        update_password($data, $reset_token);
                        $error['finish'] = "<p class='success'>Cập nhật thành công ! <a href='?mod=users&action=login'>Đăng nhập</a></p>";
                    }
                }
                load_view('newPass');
            } else {
                echo "Không hợp lệ";
            }
        }
    } else {
        redirect_to('?mod=users');
    }
}

function resetOKAction()
{
    load_view('resetOK');
}

function newPassAction()
{
    if (!isset($_SESSION['user_login'])) {
        load_view('newPass');
    } else {
        redirect_to('?mod=users');
    }
}
