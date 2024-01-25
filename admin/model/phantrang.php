<?php
function getProductsPerPage($page, $perPage)
{
    try {
        $start = ($page - 1) * $perPage;

        // Lấy tổng số sản phẩm
        $countQuery = "SELECT COUNT(*) as total FROM sanpham";
        $countStatement = $GLOBALS['conn']->prepare($countQuery);
        $countStatement->execute();
        $totalProducts = $countStatement->fetch(PDO::FETCH_ASSOC)['total'];

        // Tính tổng số trang
        $totalPages = ceil($totalProducts / $perPage);

        // Lấy sản phẩm cho trang được chỉ định
        $dataQuery = "SELECT 
            sp.id as sp_id, 
            sp.name as sp_name, 
            sp.img as sp_img, 
            sp.price as sp_price, 
            sp.luotxem as sp_luotxem, 
            sp.mota as sp_mota, 
            sp.motact as sp_motact, 
            dm.name as dm_name,
            sp.luotxem as sp_luotxem,
            dm.id as dm_id
        FROM sanpham as sp
        INNER JOIN danhmuc as dm
            ON dm.id = sp.iddm
        ORDER BY sp.id DESC
        LIMIT :start, :perPage";

        $dataStatement = $GLOBALS['conn']->prepare($dataQuery);
        $dataStatement->bindParam(':start', $start, PDO::PARAM_INT);
        $dataStatement->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $dataStatement->execute();
        $products = $dataStatement->fetchAll(PDO::FETCH_ASSOC);

        return [
            'products' => $products,
            'totalPages' => $totalPages,
        ];

    } catch (Exception $e) {
        die($e->getMessage());
    }
}


//Nhận trang hiện tại từ tham số nhận, mặc định thành 1 nếu không đặt
$currentPage = isset($_GET['trang']) ? ($_GET['trang']) : 1;

// Đặt số lượng sản phẩm để hiển thị trên mỗi trang
$productsPerPage = 5;

// Nhận sản phẩm cho trang hiện tại
$productData = getProductsPerPage($currentPage, $productsPerPage);

// Trích xuất dữ liệu
$products = $productData['products'];
$totalPages = $productData['totalPages'];

