<?php

function construct()
{
    load_model('index');
    load('lib', 'validation');
}

function indexAction()
{
    if (isset($_POST['btn_del'])) {
        if (!empty($_POST['select'])) {
            foreach ($_POST['select'] as $select) {
                db_delete("tbl_product", "`product_id` = $select");
            }
        }
    }
    if (isset($_GET['btn_search'])) {
        if (!empty($_GET['search'])) {
            $search = $_GET['search'];
            $list_product = get_list_product_by_search($search);
            $data['list_product'] = $list_product;
            load_view('search', $data);
        }
    }

    $product_list = check_pagging();
    $data['product_list'] = $product_list;
    load_view('index', $data);
}

function detailAction()
{
    if (isset($_POST['btn_del'])) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            db_delete("tbl_product", "`product_id` = {$id}");
            db_delete("tbl_product_img", "`product_id` = {$id}");
            db_delete("tbl_product_storage", "`product_id` = {$id}");
            db_delete("tbl_product_category", "`product_id` = {$id}");
        }
    }

    global $error;
    if (isset($_POST['btn_confirm'])) {
        if (isset($_GET['id'])) {
            $error = array();
            $id = $_GET['id'];

            // Tên sản phẩm
            if (empty($_POST['product_name'])) {
                $error['product_name'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                $product_name = $_POST['product_name'];
            }

            // Mã sản phẩm
            if (empty($_POST['product_code'])) {
                $error['product_code'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                $product_code = $_POST['product_code'];
            }

            // Ảnh hiển thị
            if (empty($_POST['thumbnail_url'])) {
                $error['thumbnail_url'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                $thumbnail_url = $_POST['thumbnail_url'];
            }

            // Giá nhập
            if (empty($_POST['product_price_in'])) {
                $error['product_price_in'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                if (!is_number($_POST['product_price_in'])) {
                    $error['product_price_in'] = "<p class='error-left'>* Không đúng định dạng !</p>";
                } else {
                    $product_price_in = $_POST['product_price_in'];
                }
            }

            // Giá bán
            if (empty($_POST['product_price'])) {
                $error['product_price'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                if (!is_number($_POST['product_price'])) {
                    $error['product_price'] = "<p class='error-left'>* Không đúng định dạng !</p>";
                } else {
                    $product_price = $_POST['product_price'];
                }
            }

            // Mô tả ngắn
            if (empty($_POST['product_desc'])) {
                $error['product_desc'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                $product_desc = $_POST['product_desc'];
            }

            // Mô tả chi tiết
            if (empty($_POST['product_detail'])) {
                $error['product_detail'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                $product_detail = $_POST['product_detail'];
            }

            // Danh mục sản phẩm
            $product_category = array();
            if (empty($_POST['product_category'])) {
                $error['product_category'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                $product_category = $_POST['product_category'];
            }

            // Size sản phẩm
            $product_size = array();
            if (empty($_POST['select_size'])) {
                $error['select_size'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                $product_size = $_POST['select_size'];
            }

            // Số lượng sản phẩm
            $product_amount = array();
            if (empty($_POST['product_amount'])) {
                $error['product_amount'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                $product_amount = $_POST['product_amount'];
            }

            $list_url = array();
            // Ảnh mô tả
            if (empty($_POST['upload_multi'])) {
                $error['upload_multi'] = "<p class='error-left'>* Không được để trống !</p>";
            } else {
                $list_url = $_POST['upload_multi'];
            }

            if (empty($error)) {
                $product_thumb = array(
                    'img_url' => $thumbnail_url
                );

                db_insert("tbl_img", $product_thumb);

                // done

                $url = $product_thumb['img_url'];
                $img_id = get_img_id_by_path($url);

                $info = array(
                    'product_code' => '',
                    'product_name' => $product_name,
                    'product_desc' => $product_desc,
                    'product_detail' => $product_detail,
                    'product_price_in' => $product_price_in,
                    'product_price' => $product_price,
                    'img_id' => $img_id
                );

                db_update("tbl_product", $info, "`product_id` = {$id}");
                // done

                $product_code_update = array(
                    'product_code' => $product_code
                );

                db_update("tbl_product", $product_code_update, "`product_id` = {$id}");
                // done


                foreach ($product_category as $cat_id) {
                    $product_cat = array(
                        'category_id' => $cat_id
                    );

                    db_update("tbl_product_category", $product_cat, "`product_id` = {$id}");
                }
                // done

                $num =  count($product_size);

                for ($i = 0; $i < $num; $i++) {
                    $size_num = array(
                        'product_size' => $product_size[$i],
                        'product_amount' => $product_amount[$i]
                    );

                    db_update("tbl_product_storage", $size_num, "`product_id` = {$id}");
                }
                // done

                foreach ($list_url as $image) {
                    $list_thumb = array(
                        'img_url' => $image
                    );

                    db_insert("tbl_img", $list_thumb);

                    $get_img_id = get_id_img($image);

                    $list_product_thumb = array(
                        'img_id' => $get_img_id
                    );

                    db_update("tbl_product_img", $list_product_thumb, "`product_id` = {$id}");
                }
                // done

                $error['success'] = "<p class='success-left'>Cập nhật sản phẩm thành công !</p>";
            }
            $data['error'] = $error;
            load_view('detail', $data);
        }
    }
    $detail_product = get_detail_product($_GET['id']);
    $data['detail_product'] = $detail_product;
    load_view('detail', $data);
}

function addAction()
{
    global $error;
    if (isset($_POST['btn_add'])) {
        $error = array();

        // Tên sản phẩm
        if (empty($_POST['product_name'])) {
            $error['product_name'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            $product_name = $_POST['product_name'];
        }

        // Mã sản phẩm
        if (empty($_POST['product_code'])) {
            $error['product_code'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            $product_code = $_POST['product_code'];
        }

        // Ảnh hiển thị
        if (empty($_POST['thumbnail_url'])) {
            $error['thumbnail_url'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            $thumbnail_url = $_POST['thumbnail_url'];
        }

        // Giá nhập
        if (empty($_POST['product_price_in'])) {
            $error['product_price_in'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            if (!is_number($_POST['product_price_in'])) {
                $error['product_price_in'] = "<p class='error-left'>* Không đúng định dạng !</p>";
            } else {
                $product_price_in = $_POST['product_price_in'];
            }
        }

        // Giá bán
        if (empty($_POST['product_price'])) {
            $error['product_price'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            if (!is_number($_POST['product_price'])) {
                $error['product_price'] = "<p class='error-left'>* Không đúng định dạng !</p>";
            } else {
                $product_price = $_POST['product_price'];
            }
        }

        // Mô tả ngắn
        if (empty($_POST['product_desc'])) {
            $error['product_desc'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            $product_desc = $_POST['product_desc'];
        }

        // Mô tả chi tiết
        if (empty($_POST['product_detail'])) {
            $error['product_detail'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            $product_detail = $_POST['product_detail'];
        }

        // Danh mục sản phẩm
        $product_category = array();
        if (empty($_POST['product_category'])) {
            $error['product_category'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            $product_category = $_POST['product_category'];
        }

        // Size sản phẩm
        $product_size = array();
        if (empty($_POST['select_size'])) {
            $error['select_size'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            $product_size = $_POST['select_size'];
        }

        // Số lượng sản phẩm
        $product_amount = array();
        if (empty($_POST['product_amount'])) {
            $error['product_amount'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            $product_amount = $_POST['product_amount'];
        }

        $list_url = array();
        // Ảnh mô tả
        if (empty($_POST['upload_multi'])) {
            $error['upload_multi'] = "<p class='error-left'>* Không được để trống !</p>";
        } else {
            $list_url = $_POST['upload_multi'];
        }

        if (empty($error)) {
            $product_thumb = array(
                'img_url' => $thumbnail_url
            );

            db_insert("tbl_img", $product_thumb);

            // done

            $url = $product_thumb['img_url'];
            $img_id = get_img_id_by_path($url);

            $info = array(
                'product_code' => '',
                'product_name' => $product_name,
                'product_desc' => $product_desc,
                'product_detail' => $product_detail,
                'product_price_in' => $product_price_in,
                'product_price' => $product_price,
                'img_id' => $img_id
            );

            db_insert("tbl_product", $info);
            // done

            $product_id = get_product_id_by_img_id($img_id);

            $product_code_update = array(
                'product_code' => $product_code . $product_id
            );

            db_update("tbl_product", $product_code_update, "`product_id` = {$product_id}");
            // done


            foreach ($product_category as $cat_id) {
                $product_cat = array(
                    'product_id' => $product_id,
                    'category_id' => $cat_id
                );

                db_insert("tbl_product_category", $product_cat);
            }
            // done

            $num =  count($product_size);

            for ($i = 0; $i < $num; $i++) {
                $size_num = array(
                    'product_id' => $product_id,
                    'product_size' => $product_size[$i],
                    'product_amount' => $product_amount[$i]
                );

                db_insert("tbl_product_storage", $size_num);
            }
            // done

            foreach ($list_url as $image) {
                $list_thumb = array(
                    'img_url' => $image
                );

                db_insert("tbl_img", $list_thumb);

                $get_img_id = get_id_img($image);

                $list_product_thumb = array(
                    'product_id' => $product_id,
                    'img_id' => $get_img_id
                );

                db_insert("tbl_product_img", $list_product_thumb);
            }
            // done

            $error['success'] = "<p class='success-left'>Thêm sản phẩm thành công !</p>";
        } else {
            show_array($error);
        }
    }

    $data['error'] = $error;
    load_view('add', $data);
}

function upload_img_postAction()
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
            $target_dir  = "public/uploads/product/";
            $target_file = $target_dir . basename($_FILES['file']['name']);
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
            // upload when not error
            if (empty($error)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                    $flag = true;
                    $data = array(
                        "status" => "ok",
                        "file_path" => $target_file
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

function upload_multi_imgAction()
{
    $result = "";
    $hidden = "";
    // Số lượng ảnh upload 
    $num_images = count($_FILES['file']['name']);
    $target_dir = "public/uploads/product/";
    // Duyệt từng ảnh để upload lên server 
    for ($i = 0; $i < $num_images; $i++) {
        $target_file = $target_dir . basename($_FILES['file']['name'][$i]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
            // Tạo html hiển thị hình ảnh đã upload 
            $result .= "<img src=\"{$target_file}\" >";
            $hidden .= "<input type='hidden' name='upload_multi[]' value='{$target_file}'>";
            //    echo "Upload {$i} ok";
        }
    }
    echo $result . $hidden;
}
