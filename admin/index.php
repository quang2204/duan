<?php

session_start();
require_once "../model/connact.php";
require_once './Controller/main.php';
require_once "../model/pay.php";
require_once './Controller/dm.php';
require_once './model/adproduct.php';
require_once './model/product.php';
require_once './model/danhmuc.php';
require_once './model/user.php';
require_once '../model/singin.php';
require_once '../model/danhmuc.php';
require_once '../model/product.php';
require_once '../model/dn.php';
require_once '../model/dx.php';
require_once '../model/function.php';
require_once './model/profile.php';
require_once "../model/binhluan.php";
require_once "../model/user.php";
require_once "../model/pay.php";

?>
<?php
$act = !empty($_GET['act']) ? $_GET['act'] : 'tongquan';
$path = "view/{$act}.php";
require_once 'view/inc/header.php';
$perPage = 6;
$page = isset($_GET['trang']) ? $_GET['trang'] : 1;
$order = orderall();
$countsp = counttb('sanpham');
$users = counttb('taikhoan');
$bls = counttb('orders');
$orders = counttotal();
$ad = getAlldm();
$size = size();
$color = color();
if ($act === 'sanpham') {
    $totalItems = countAll('sanpham');
    $totalPages = ceil($totalItems / $perPage);
    $productData = getAll($page, $perPage);
} else if ($act === 'adsp') {
    $get = addsp();

} elseif ($act === 'xoa') {
    $xoa = delete($_GET['id']);

} elseif ($act === 'sua') {
    $update = getByID($_GET['id']);
    $sua = updatesp($_GET['id']);
    $ad = getdm();
    $variants = variants($_GET['id']);

} elseif ($act === 'xoadanhmuc') {
    $delete = deletedm($_GET['id']);

} elseif ($act === 'danhmuc') {

    $totalItems = countAll('danhmuc');
    $totalPages = ceil($totalItems / $perPage);
    $ad = getAlldms($page, $perPage);
} elseif ($act === 'themdm') {
    $add = adddm();

} elseif ($act === 'suadm') {
    $suadm = getiddm($_GET['id']);
    $updatedm = updatedm($_GET['id']);

} else if ($act === 'sign-up') {
    $dk = login();
} else if ($act === 'sign-in') {
    $dn = dn();
} else if ($act === 'dx') {
    $dx = dx();
} else if ($act === 'order_detail') {
    $detail = ordersid($_GET['id']);
} else if ($act === 'xoaorder') {
    $detail = deleteorder($_GET['id']);
} else if ($act === 'user') {


    $totalItems = countAll('taikhoan');
    $totalPages = ceil($totalItems / $perPage);
    $user = getAlluser($page, $perPage);
} elseif ($act === 'xoauser') {
    $xoa = deleteuser($_GET['id']);
} elseif ($act === 'suauser') {
    $sua = getiduser($_GET['id']);
    $suauser = updatepro($_GET['id']);
} elseif ($act === 'comment') {

    $page = isset($_GET['trang']) ? ($_GET['trang']) : 1;
    $perPage = 6;
    $totalPages = ceil(countAll('sanpham') / $perPage);
    $bl = allsbl(1, 6);

} elseif ($act === 'xembl') {
    $bls = allbl($_GET['id']);


} elseif ($act === 'xoabl') {

    $bl = deletebl($_GET['id']);

} elseif ($act === 'profile') {

    $pro = getuser($_GET['id']);
} elseif ($act === 'suapro') {
    $pro = getuser($_GET['id']);
    $pros = updatepro($_GET['id']);
} elseif ($act === 'tongquan') {
    $tk = thongke();
} elseif ($act === 'updateorder') {
    $update = status();
}

if (file_exists($path)) {
    require_once $path;
} else {
    require_once "view/404.php";
}


require_once 'view/inc/footer.php';

