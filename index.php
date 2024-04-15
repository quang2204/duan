<?php
session_start();
require_once "model/connact.php";
require_once "model/product.php";
require_once "model/singin.php";
require_once "model/dn.php";
require_once "model/dx.php";
require_once "model/cart.php";
require_once "model/updatecart.php";
require_once "model/danhmuc.php";
require_once "model/binhluan.php";
require_once "admin/model/profile.php";
require_once "model/user.php";
require_once "model/function.php";
require_once "model/pay.php";
require_once "model/magiamgia.php";
require_once "model/ttonline.php";
require_once "model/resetpass.php";
require_once "Controller/product.php";
require_once "Controller/mail.php";

// require_once 'Controller/product.php';
require_once 'Controller/user.php';
$act = !empty($_GET['act']) ? $_GET['act'] : 'index';
$size = size();
$color = color();
$pro = isset($_SESSION['users']['name']) ? getuser() : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$voucher = isset($_SESSION['users']['name']) ? getvoucher() : '';
if ($act === 'index') {
    $data = getAlls(8);

} else if ($act === 'product-detail') {

    $productDetail = getByID($id);
    $img = img($id);
    $id = getidsp($_GET['iddm'], $id);
    $bl = allbl($id);

    $variants = variants($id);
    // $variant = variantcolor();
} else if ($act === 'product') {
    $product = product();
    $link = $product['link'];
    $order = $product['order'];
    $tk = $product['tk'];
    $page = $product['page'];
    $totalPages = $product['product']['totalPages'];
} else if ($act === 'singup') {
    $dk = login();
} else if ($act === 'product-detaill') {
    $variant = variantcolor();
} else if ($act === 'sign-in') {
    $dn = dn();
} else if ($act === 'dx') {
    $dx = dx();
} else if ($act === 'cart') {
    $cart = cart();
} else if ($act === 'xoacart') {
    $xoa = deletecart();
} else if ($act === 'update') {
    $xoa = updatecart();
} else if ($act === 'pay') {
    $pay = check_online();
} else if ($act === 'commen') {
    $bl = addbl();

} else if ($act === 'addcart') {
    $bl = addcarts();

} else if ($act === 'hoadon') {
    $order = order($id);
    $orders = orderid($id);

} else if ($act === 'order') {

    $order = isset($_GET['status']) ? getOrderDetailId() : getOrderDetailsByUserId();
    $orders = isset($_GET['status']) ? orderids() : orderiduser();
} else if ($act === 'profile') {

    $pros = updatepro($id);

} elseif ($act === 'updateorder') {
    $update = statusa();
} elseif ($act === 'pass' || $act === 'email') {
    $update = resset();
} elseif ($act === 'reset_password') {
    $update = updatetoken();
} elseif ($act === 'updatemail') {
    $pro = getuser($id);
} elseif ($act === 'updatepass') {
    $pro = getuser();
    $sua = doimk();
} elseif ($act === 'voucherid') {
    $voucher = magiamgia();
}
require_once 'view/inc/header.php';

$path = "view/{$act}.php";

if (file_exists($path)) {

    require_once $path;
} else {

    require_once "view/404.php";
}

require_once 'view/inc/footer.php';
