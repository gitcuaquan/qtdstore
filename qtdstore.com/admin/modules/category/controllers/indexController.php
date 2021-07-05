<?php

function construct()
{
    load_model('index');
    load('lib', 'validation');
    load('lib', 'send-mail');
}


function indexAction()
{
    load_view('index');
}

function detailAction()
{
    load_view('detail');
}

function addAction()
{
    global $error;
    if (isset($_POST['btn_add'])) {
        $error = array();

        if (empty($_POST['category_name'])) {
            $error['category_name'] = "<p class='error'>* Không được để trống !</p>";
        } else {
            $category_name = $_POST['category_name'];
        }

        $level = $_POST['level'];

        $parent_code = $_POST['parent_code'];

        $description = $_POST['description'];

        if (empty($error)) {
            $data = array(
                'category_title' => $category_name,
                'category_level' => $level,
                'category_parent_id' => $parent_code,
                'category_description' => $description,
            );
            db_insert("tbl_category", $data);
            $error['success'] = "<p class='success'>Thêm danh mục thành công !</p>";
        }
    }
    load_view('add');
}
