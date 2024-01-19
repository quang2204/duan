<?php
require_once "./model/product.php";


function proht()
{
    $product = getall();


    require_once './sanpham.php';
}
function delete($id)
{
    $xoa = xoasp($id);
    header("location: ?act=sanpham");
}
?>