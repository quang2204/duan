<?php
require_once "./model/product.php";



function delete($id)
{
    $xoa = xoasp($id);
    header("location: ?act=sanpham");
}
?>