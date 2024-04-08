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
    header('Location: ?act=order_detail&id=' . $_POST['id']);

}
function statussp($table)
{
    $status = updatestatus($table);
    header('Location: ?act=sanpham');

}
function statusdm($table)
{
    $status = updatestatus($table);
    header('Location: ?act=danhmuc');

}
function statuscolor($table)
{
    $status = updatestatus($table);
    header('Location: ?act=color');

}
function statussize($table)
{
    $status = updatestatus($table);
    header('Location: ?act=size');

}
function statusmgg($table)
{
    $status = updatestatus($table);
    header('Location: ?act=voucher');

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
function deletecolor($id)
{
    $xoa = xoacolor($id);
    header("location: ?act=color");

}
function deletesize($id)
{
    $xoa = xoasize($id);
    header("location: ?act=size");

}