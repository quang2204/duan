<?php

require_once "./model/product.php";


function productXemChiTietSanPham($id)
{
    $product = getByID($id);

    if (empty($product)) {
        require_once "view/404.php";

        exit();
    }

    require_once 'view/product-detail.php';
}