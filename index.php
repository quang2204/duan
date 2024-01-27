<?php
session_start();
require_once "model/connact.php";
require_once "model/product.php";
require_once "model/singin.php";
require_once "model/dn.php";
require_once "model/dx.php";
require_once "model/phantrang.php";
require_once "model/danhmuc.php";
// require_once "model/page.php";
require_once "model/function.php";
require_once 'Controller/product.php';
// require_once 'Controller/dk.php';

$baseurl = 'http://php.test/duanmau/';




$act = !empty($_GET['act']) ? $_GET['act'] : 'index';
// Nếu $act là 'index', thì gọi hàm proht() để lấy giá trị sản phẩm
if ($act === 'index') {
    $data = getAll(4);
} else if ($act === 'product-detail') {

    $productId = $_GET['id'];
    $productDetail = getByID($productId);


    $id = getidsp($_GET['iddm'], $productId);

} else if ($act === 'product') {
    if (isset($_GET['id'])) {
        $id = getidm($_GET['id']);
    } else if (isset($_GET['desc']) && $_GET['desc'] === 'price') {
        $id = desc();
    } else if (isset($_GET['acs']) && $_GET['acs'] === 'price') {
        $id = acs();
    } else {
        $id = getAlls();

    }
    $dm = getAlldm();
} else if ($act === 'singup') {
    $dk = login();
} else if ($act === 'login') {
    $dn = dn();
} else if ($act === 'dx') {
    $dx = dx();
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
