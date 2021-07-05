<?php

function construct()
{
    load_model('index');
}


function indexAction()
{
    if (!isset($_SESSION['user_login'])) {
        redirect_to('?mod=users&action=login');
    } else {
        $username = $_SESSION['user_login'];
        $position = get_position($username);
        if ($position == 'member') {
            redirect('?');
        } else {
            $id = get_id_by_username($username);
            $user = get_user_by_id($id);
            $data['user'] = $user;
            load_view('index', $data);
        }
    }
}
