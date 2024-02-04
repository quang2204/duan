<?php

session_start();
require_once "../model/connact.php";
require_once './Controller/product.php';
require_once './Controller/dk.php';
require_once './Controller/dm.php';
require_once './model/adproduct.php';
require_once './model/product.php';
require_once './model/danhmuc.php';
require_once './model/user.php';
require_once '../model/singin.php';
require_once '../model/dn.php';
require_once '../model/dx.php';
require_once '../model/function.php';
require_once './model/dk.php';
require_once './model/phantrang.php';
require_once './model/profile.php';
require_once "../model/binhluan.php";

require_once "../model/user.php";



?>

<?php
$act = !empty($_GET['act']) ? $_GET['act'] : 'tongquan';
$path = "view/{$act}.php";
require_once 'view/inc/header.php';
$ad = getAlldm();

if ($act === 'sanpham') {

    $productData = getProductsPerPage($currentPage, $productsPerPage);

} else if ($act === 'adsp') {
    $get = addsp();

} elseif ($act === 'xoa') {
    $xoa = delete($_GET['id']);

} elseif ($act === 'sua') {
    $update = getid($_GET['id']);
    $sua = updatesp($_GET['id']);

} elseif ($act === 'xoadanhmuc') {
    $delete = deletedm($_GET['id']);

} elseif ($act === 'themdm') {
    $add = adddm();

} elseif ($act === 'suadm') {
    $suadm = getiddm($_GET['id']);
    $updatedm = updatedm($_GET['id']);

} else if ($act === 'sign-up') {
    $dk = dkadmin();
} else if ($act === 'sign-in') {
    $dn = dn();
} else if ($act === 'dx') {
    $dx = dx();
} else if ($act === 'user') {
    $user = getAlluser();
} elseif ($act === 'xoauser') {
    $xoa = xoauser($_GET['id']);
} elseif ($act === 'suauser') {
    $sua = getiduser($_GET['id']);
    $suauser = updatepro($_GET['id']);
} elseif ($act === 'comment') {

    $bl = allsbl();

} elseif ($act === 'xoabl') {

    $bl = deletebl($_GET['id']);

} elseif ($act === 'profile') {

    $pro = getuser($_GET['id']);
    $pros = updatepro($_GET['id']);

}

if (file_exists($path)) {
    require_once $path;
} else {
    require_once "view/404.php";
}


require_once 'view/inc/footer.php';

