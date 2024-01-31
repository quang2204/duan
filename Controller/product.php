<?php

require_once "./model/products.php";

$param = "";
$sortParam = "";
$orderCondition = "";

$search = isset($_GET['name']) ? $_GET['name'] : "";
if ($search) {
    $where = "WHERE name LIKE '%" . $search . "%'";
    $param .= "name=" . $search . "&";
    $sortParam = "name=" . $search . "&";
}

$orderField = isset($_GET['field']) ? $_GET['field'] : "";
$orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
if (!empty($orderField) && !empty($orderSort)) {
    $orderCondition = "ORDER BY `sanpham`.`" . $orderField . "` " . $orderSort;
    $param .= "field=" . $orderField . "&sort=" . $orderSort . "&";
}

$itemPerPage = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
$currentPage = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $itemPerPage;

$products = getProducts($conn, $where, $orderCondition, $itemPerPage, $offset);
$totalRecords = getTotalRecords($conn, $where);
$totalPages = ceil($totalRecords / $itemPerPage);

