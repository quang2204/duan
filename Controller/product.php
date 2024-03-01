<?php

require_once "./model/product.php";


function product()
{
    $link = isset($_GET['id']) ? '&id=' . $_GET['id'] : '';
    $order = isset($_GET['orderBy']) ? '&orderBy=' . $_GET['orderBy'] : '';
    $tk = isset($_GET['search']) ? '&search=' . $_GET['search'] : '';
    $orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : null;
    $search = isset($_GET['search']) ? $_GET['search'] : null;

    $iddm = isset($_GET['id']) ? $_GET['id'] : null;

    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $productsPerPage = isset($limit) ? $limit : 8;

    $minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : null;
    $maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : null;

    $data = getProductData($orderBy, $search, $iddm, $minPrice, $maxPrice, $productsPerPage, $page);

    $dm = getAlldm();

    return [
        'dm' => $dm,
        'product' => $data,
        'link' => $link,
        'order' => $order,
        'tk' => $tk,
        'page' => $page,
    ];
}
function statusa()
{
    $status = updateorder();
    header('Location: ?act=order&id=' . $_SESSION['users']['id']);

}