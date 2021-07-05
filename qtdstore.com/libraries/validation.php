<?php
function is_username($username)
{
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($pattern, $username, $matcha)) {
        return false;
    } else {
        return true;
    }
}

function is_password($password)
{
    $pattern = "/^([\w_\.!@#$%^&*()]+){6,32}$/";
    if (!preg_match($pattern, $password, $matcha)) {
        return false;
    } else {
        return true;
    }
}

function is_first_name($first_name){
    $pattern = "/[^0-9]$/";
    if(!preg_match($pattern, $first_name, $matcha)){
        return false;
    } else {
        return true;
    }
}

function is_last_name($last_name){
    $pattern = "/[^0-9]$/";
    if(!preg_match($pattern, $last_name, $matcha)){
        return false;
    } else {
        return true;
    }
}

function is_email($email)
{
    $pattern = "/^[A-Za-z0-9_\.]{2,32}@([A-Za-z0-9]{2,12})(.[A-Za-z0-9]{2,12})+$/";
    if (!preg_match($pattern, $email, $matcha)) {
        return false;
    } else {
        return true;
    }
}

function is_phone($phone){
    $pattern = "/^[0]{1}[0-9]{9,10}$/";
    if(!preg_match($pattern, $phone, $matcha)){
        return false;
    } else {
        return true;
    }
}

function form_error($label_field){
    global $error;
    if (!empty($error[$label_field])) return $error[$label_field];
}

function set_value($label_field){
    global $$label_field;
    if (!empty($$label_field)) return $$label_field;
}
