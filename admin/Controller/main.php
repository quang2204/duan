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
function deleteuser($id)
{
    $xoa = xoauser($id);
    header("location: ?act=user");

}
function status()
{
    $status = updateorder();
    header('Location: ?act=order');

}

function deletenxb($id)
{
    $xoa = xoanxb($id);
    header("location: ?act=nhaxuatban");

}
function deletesach($id)
{
    $xoa = xoasach($id);
    header("location: ?act=sach");

}