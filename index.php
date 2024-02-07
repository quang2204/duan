<?php
session_start();
require_once "model/connact.php";
require_once "model/product.php";
require_once "model/singin.php";
require_once "model/dn.php";
require_once "model/dx.php";
require_once "model/phantrang.php";
require_once "model/danhmuc.php";
require_once "model/binhluan.php";
require_once "admin/model/profile.php";
require_once "model/user.php";
require_once "model/function.php";
// require_once 'Controller/product.php';
require_once 'Controller/user.php';

$baseurl = 'http://php.test/duanmau/';


$act = !empty($_GET['act']) ? $_GET['act'] : 'index';

$productId = $_GET['id'];
if ($act === 'index') {
    $data = getAll(4);
} else if ($act === 'product-detail') {

    $productDetail = getByID($productId);

    $id = getidsp($_GET['iddm'], $productId);
    $bl = allbl($productId);

    $insertbl = inserbl();

}
if ($act === 'product') {
    $orderBy = null;
    $search = isset($_POST['search']) ? $_POST['search'] : null;
    $productId = isset($productId) ? $productId : null;

    if (isset($_GET['orderBy'])) {
        $orderBy = strtoupper($_GET['orderBy']);
        if ($orderBy !== 'ASC' && $orderBy !== 'DESC') {
            // Mặc định là ASC nếu OrderBy không hợp lệ
            $orderBy = 'ASC';
        }
    }

    $id = getProductData($orderBy, $search, $productId);
    $dm = getAlldm();
} else if ($act === 'singup') {
    $dk = login();
} else if ($act === 'login') {
    $dn = dn();
} else if ($act === 'dx') {
    $dx = dx();
} else if ($act === 'profile') {
    $pro = getuser($productId);
    $pros = user($productId);
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
