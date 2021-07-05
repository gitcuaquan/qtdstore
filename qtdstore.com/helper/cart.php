<?php

function get_num_order()
{
    if (isset($_SESSION['cart']['info'])) {
        return $_SESSION['cart']['info']['num_order'];
    } else {
        return 0;
    }
}
