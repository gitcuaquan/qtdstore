<?php

// hàm is_login
function is_login()
{
    if (isset($_SESSION['is_login'])) {
        return true;
    } else {
        return false;
    }
}

// hàm trả về username của user khi login
function user_login()
{
    if (!empty($_SESSION['user_login'])) {
        return $_SESSION['user_login'];
    } else {
        return false;
    }
}

