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
require_once "Controller/product.php";
// require_once 'Controller/product.php';
require_once 'Controller/user.php';

$baseurl = 'http://php.test/duanmau/';


$act = !empty($_GET['act']) ? $_GET['act'] : 'index';
$size = size();
$color = color();
$productId = isset($_GET['id']) ? $_GET['id'] : '';
if ($act === 'index') {
    $data = getAll(4);
    $view = getview(4);
} else if ($act === 'product-detail') {

    $productDetail = getByID($productId);

    $id = getidsp($_GET['iddm'], $productId);
    $bl = allbl($productId);

} else if ($act === 'product') {
    $product = product();
    $link = $product['link'];
    $order = $product['order'];
    $tk = $product['tk'];
    $page = $product['page'];
    $totalPages = $product['product']['totalPages'];
} else if ($act === 'singup') {
    $dk = login();
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
    $pay = pay();
} else if ($act === 'hoadon') {
    $order = order($productId);
    $orders = orderid($productId);

} else if ($act === 'order') {
    $pro = getuser($productId);
    $order = getOrderDetailsByUserId($productId);
} else if ($act === 'profile') {
    $pro = getuser($productId);
    $pros = updatepro($_GET['id']);

}


require_once 'view/inc/header.php';

$path = "view/{$act}.php";

if (file_exists($path)) {

    require_once $path;
} else {

    require_once "view/404.php";
}

require_once 'view/inc/footer.php';
