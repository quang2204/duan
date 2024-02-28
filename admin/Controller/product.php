<?php
require_once "./model/product.php";
require_once "../model/binhluan.php";
require_once "../model/pay.php";

function delete($id)
{
    $xoa = xoasp($id);
    header("location: ?act=sanpham");
}
function deletebl($id)
{
    $bl = xoabl($id);
    header("location: ?act=xembl&id=" . $_GET['idpro']);

}
function deleteorder($id)
{
    $xoa = xoaorder($id);
    header("location: ?act=order");

}
