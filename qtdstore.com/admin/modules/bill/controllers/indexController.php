<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $list_bill = get_list_bill();
    $data['list_bill'] = $list_bill;
    load_view('index', $data);
}

function activeAction()
{
    $list_bill = get_list_active_bill();
    $data['list_bill'] = $list_bill;
    load_view('active', $data);
}

function not_activeAction()
{
    $list_bill = get_list_not_active_bill();
    $data['list_bill'] = $list_bill;
    load_view('not_active', $data);
}

function finishAction()
{
    $list_bill = get_list_finish_bill();
    $data['list_bill'] = $list_bill;
    load_view('finish', $data);
}

function detailAction()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = 1;
    }
    global $error;
    if (isset($_POST['btn_confirm'])) {
        $error = array();
        $status = $_POST['status'];
        $condition = $_POST['condition'];

        $data = array(
            'bill_status' => $status,
            'bill_condition' => $condition
        );
        db_update("tbl_bill", $data, "`bill_id` = $id");
        $error['success'] = "<p class='successful'>Cập nhật thành công !</p>";
    }
    if (isset($_POST['btn_del'])) {
        db_delete("tbl_bill", "`bill_id` = $id");
        redirect_to("?mod=bill");
    }
    $bill = get_bill($id);
    $detail_bill = get_detail_bill($id);
    $data['bill'] = $bill;
    $data['detail_bill'] = $detail_bill;
    load_view('detail', $data);
}
