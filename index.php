<?php
session_start();
require_once "model/connact.php";
require_once "model/product.php";
require_once "model/singin.php";
require_once "model/dn.php";
require_once 'Controller/product.php';
require_once 'Controller/dk.php';
$baseurl = 'http://php.test/duanmau/';
// print_r($_SESSION['user']['email']);
// echo 'sdf';
// Lấy giá trị của biến 'act' từ tham số GET hoặc mặc định là 'index' nếu không tồn tại
$act = !empty($_GET['act']) ? $_GET['act'] : 'index';
// Nếu $act là 'index', thì gọi hàm proht() để lấy giá trị sản phẩm
if ($act === 'index') {
    $data = getAll();
} else if ($act === 'product-detail') {
    $product = getByID($_GET['id']);
} else if ($act === 'product') {
    $datas = getAll();

    $dm = getAlldm();
} else if ($act === 'singup') {
    $dk = login();
} else if ($act === 'login') {
    $dn = dn();
}


require_once 'view/inc/header.php';

// Xây dựng đường dẫn đến file view dựa trên giá trị của 'act'
$path = "view/{$act}.php";

// Kiểm tra xem file view có tồn tại hay không
if (file_exists($path)) {
    // Nếu tồn tại, thì require file view đó
    require_once $path;
} else {
    // Nếu không tồn tại, require file 404.php
    require_once "view/404.php";
}

require_once 'view/inc/footer.php';
