<?php

session_start();
require_once "../model/connact.php";
require_once './Controller/main.php';
require_once './Controller/mail.php';
require_once "../model/pay.php";
require_once './Controller/dm.php';
require_once './model/adproduct.php';
require_once './model/product.php';
require_once './model/danhmuc.php';
require_once './model/order.php';
require_once './model/mail.php';
require_once './model/singin.php';
require_once './model/user.php';
require_once '../model/singin.php';
require_once '../model/danhmuc.php';
require_once '../model/product.php';
require_once '../model/dn.php';
require_once '../model/dx.php';
require_once '../model/magiamgia.php';
require_once '../model/function.php';
require_once './model/profile.php';
require_once "../model/binhluan.php";
require_once "../model/user.php";
require_once "../model/pay.php";
require_once "../model/resetpass.php";

?>
<?php
$act = !empty($_GET['act']) ? $_GET['act'] : 'tongquan';
$path = "view/{$act}.php";
require_once 'view/inc/header.php';

$page = isset($_GET['trang']) ? $_GET['trang'] : 1;
$countsp = counttb('sanpham');
$users = counttb('taikhoan');
$bls = counttb('orders');
$orders = counttotal();
$ad = getAlldm();
$size = size();
$color = color();

$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($act === 'sanpham') {
    $perPage = 6;
    $keyword = isset($_GET['search']) ? $_GET['search'] : '';
    $totalItems = countAll('sanpham');
    $totalPages = ceil($totalItems / $perPage);
    $productData = getAll($keyword, $page, $perPage);
} else if ($act === 'adsp') {
    $get = addsp();
} elseif ($act === 'xoa') {
    $xoa = delete($id);

} elseif ($act === 'sua' || $act === 'attribute') {
    $update = getByID($id);
    $sua = updatesp($id);
    $ad = getdm();
    $variants = variants($id);
    $img = img($id);

} elseif ($act === 'xoadanhmuc') {
    $delete = deletedm($id);

} elseif ($act === 'statusv') {
    $status = updatestatus('product_variants');

} elseif ($act === 'statsp') {
    $status = statussp('sanpham');

} elseif ($act === 'addattribute') {
    $add = addattribute();

} elseif ($act === 'updateattribute') {
    $variants = variant();
    $update = updatebt();

} elseif ($act === 'danhmuc') {
    $perPage = 10;
    $keyword = isset($_GET['search']) ? $_GET['search'] : '';

    $totalItems = countAll('danhmuc');
    $totalPages = ceil($totalItems / $perPage);
    $ad = getAlldms($keyword, $page, $perPage);


} elseif ($act === 'statusdm') {
    $status = statusdm('danhmuc');

} elseif ($act === 'statcolor') {
    $status = statuscolor('product_color');

} elseif ($act === 'statsize') {
    $status = statussize('product_size');

} elseif ($act === 'statusmgg') {
    $status = statusmgg('magiamgia');

} elseif ($act === 'themdm') {
    $add = adddm();

} elseif ($act === 'suadm') {
    $suadm = getiddm($id);
    $updatedm = updatedm($id);

} else if ($act === 'sign-up') {
    $dk = dk();
} else if ($act === 'sign-in') {
    $dn = dn();
} else if ($act === 'dx') {
    $dx = dx();
} else if ($act === 'order_detail') {
    $detail = ordersid($id);
    $orders = orderid($id);
} else if ($act === 'xoaorder') {
    $detail = deleteorder($id);
} else if ($act === 'user') {
    $perPage = 10;
    $keyword = isset($_GET['search']) ? $_GET['search'] : '';

    $totalItems = countAll('taikhoan');
    $totalPages = ceil($totalItems / $perPage);
    $user = getAlluser($keyword, $page, $perPage);
} elseif ($act === 'xoauser') {
    $xoa = deleteuser($id);
} elseif ($act === 'suauser') {
    $sua = getiduser($id);
    $suauser = updatepro($id);
} elseif ($act === 'comment') {

    $page = isset($_GET['trang']) ? ($_GET['trang']) : 1;
    $perPage = 10;
    $keyword = isset($_GET['search']) ? $_GET['search'] : '';

    $totalPages = ceil(countAll('sanpham') / $perPage);

    $bl = allsbl($keyword, $page, $perPage);

} elseif ($act === 'xembl') {
    $bls = allbl($id);


} elseif ($act === 'xoabl') {

    $bl = deletebl($id);

} elseif ($act === 'profile') {

    $pro = getuser($id);
} elseif ($act === 'suapro') {
    $pro = getuser($id);
    $pros = updatepro($id);
} elseif ($act === 'tongquan') {
    $tk = thongke();
} elseif ($act === 'updateorder') {
    $update = status();

} elseif ($act === 'xoaimg') {
    $update = xoaimg();
} elseif ($act === 'order') {

    $page = isset($_GET['trang']) ? ($_GET['trang']) : 1;
    $perPage = 15;
    $totalPages = ceil(countAll('orders') / $perPage);
    $keyword = isset($_GET['search']) ? $_GET['search'] : '';

    $order = orderall($keyword, $page, $perPage);
} elseif ($act == 'themcolor') {
    $addcolor = addcolor();
} elseif ($act == 'color') {

    $page = isset($_GET['trang']) ? ($_GET['trang']) : 1;
    $perPage = 10;
    $totalPages = ceil(countAll('product_color') / $perPage);
    $keyword = isset($_GET['search']) ? $_GET['search'] : '';

    $colors = getAllcolor($keyword, $page, $perPage);
} elseif ($act == 'size') {

    $page = isset($_GET['trang']) ? ($_GET['trang']) : 1;
    $perPage = 10;
    $totalPages = ceil(countAll('product_size') / $perPage);
    $keyword = isset($_GET['search']) ? $_GET['search'] : '';

    $sizes = getAllsize($keyword, $page, $perPage);
} elseif ($act == 'suacolor') {
    $color = getidcolor($id);
    $updatecolor = updatecolor();
} elseif ($act == 'xoacolor') {
    $color = deletecolor($id);

} elseif ($act == 'themsize') {
    $size = addsize();

} elseif ($act == 'suasize') {
    $size = updatesize();
    $idsize = getidsize($id);

} elseif ($act == 'xoasize') {
    $size = deletesize($id);

} elseif ($act == 'updatetk') {
    $tk = updatetk();

} elseif ($act == 'voucher') {
    $page = isset($_GET['trang']) ? ($_GET['trang']) : 1;
    $perPage = 10;
    $totalPages = ceil(countAll('product_size') / $perPage);
    $keyword = isset($_GET['search']) ? $_GET['search'] : '';

    $voucher = getAllgg($keyword, $page, $perPage);


} elseif ($act == 'themvoucher') {
    $add = addvoucher();

} elseif ($act == 'suavoucher') {
    $updateid = voucherid($id);
    $update = updategg();

} elseif ($act == 'xoavoucher') {
    $xoa = xoagg($id);

} elseif ($act == 'doimk') {
    $mk = doimk();

} elseif ($act == 'resetpass') {
    $mk = ressets();

} elseif ($act == 'role') {
    $role = role();

}

// $total = counttotal();

if (file_exists($path)) {
    require_once $path;
} else {
    require_once "view/404.php";
}


require_once 'view/inc/footer.php';

