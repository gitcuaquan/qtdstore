<?php
function is_username($username)
{
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($pattern, $_POST['username'], $matcha)) {
        return false;
    } else {
        return true;
    }
}

function is_password($password)
{
    $pattern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (!preg_match($pattern, $_POST['password'], $matcha)) {
        return false;
    } else {
        return true;
    }
}

function is_fullname($fullname){
    $pattern = "/[^0-9]$/";
    if(!preg_match($pattern, $_POST['fullname'], $matcha)){
        return false;
    } else {
        return true;
    }
}

function is_email($email){
    $pattern = "/^[A-Za-z0-9_\.]{2,32}@([A-Za-z0-9]{2,12})(.[A-Za-z0-9]{2,12})+$/";
    if(!preg_match($pattern, $_POST['email'], $matcha)){
        return false;
    } else {
        return true;
    }
}

function is_number($number){
    $pattern = "/^[0]{1}[0-9]{3,10}$/";
    if(preg_match($pattern, $number, $matcha)){
        return false;
    } else {
        return true;
    }
}

function form_error($label_field){
    global $error;
    if (!empty($error[$label_field])) return $error[$label_field];
}

function form_success($label_field){
    global $error;
    if (empty($error[$label_field])) return "Đã đăng ký thành công !";
}

function set_value($label_field){
    global $$label_field;
    if (!empty($$label_field)) return $$label_field;
}
