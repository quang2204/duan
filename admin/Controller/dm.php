<?php
require_once "./model/danhmuc.php";

function deletedm($id)
{
    $xoa = xoadm($id);
    
    header("location: ?act=danhmuc");
}