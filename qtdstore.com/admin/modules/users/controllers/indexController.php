<?php

function construct()
{
    load_model('index');
    load('lib', 'validation');
}

function backAction(){
    redirect("?");
}

function indexAction()
{
    if (isset($_POST['btn_del'])) {
        if (!empty($_POST['select'])) {
            foreach ($_POST['select'] as $select) {
                db_delete("tbl_users", "`user_id` = $select");
            }
        }
    }
    if (isset($_GET['btn_search'])) {
        if (!empty($_GET['search'])) {
            $search = $_GET['search'];
            $list_user = get_list_user_by_search($search);
            $data['list_user'] = $list_user;
            load_view('search', $data);
        }
    }

    $list_user = check_pagging();
    $data['list_user'] = $list_user;
    load_view('index', $data);
}

function detailAction()
{
    $id = $_GET['id'];
    $user = get_user_by_id($id);
    $data['user'] = $user;
    load_view('detail', $data);
}

function addAction()
{
    load_view('add');
}

function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    unset($_SESSION['user_name']);
    redirect_to('?mod=users&action=login');
}

function loginAction()
{
    if (isset($_POST['btn_login'])) {
        $error = array();
        if (empty($_POST['username'])) {
            $error['username'] = "<p class='error'>* Không được để trống !</p>";
        } else {
            $username = $_POST['username'];
        }

        if (empty($_POST['password'])) {
            $error['password'] = "<p class='error'>* Không được để trống !</p>";
        } else {
            $password = md5($_POST['password']);
        }

        if (empty($error)) {
            if (check_login($username, $password)) {
                $name = get_name($username);
                $position = check_position($username);
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                $_SESSION['user_name'] = $name;
                if ($position == 'member') {
                    redirect_to('?mod=users&action=logout');
                } else {
                    redirect_to('?');
                }
            } else {
                $error['account'] = "<p class='error'>* Tài khoản hoặc mật khẩu không đúng !</p>";
            }
        }
    }

    load_view('login');
}
