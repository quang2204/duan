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
        $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT $start, $perPage";

        $dataStatement = $GLOBALS['conn']->prepare($sql);
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



