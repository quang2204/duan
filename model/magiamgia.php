<?php
function getvoucher()
{

    $sql = 'SELECT * from magiamgia';
    return select($sql);
}
function voucherid($id)
{
    $sql = 'SELECT * from magiamgia WHERE id=:id';
    return slectid($sql);
}
function getAllgg($keyword, $page = '', $perPage = '')
{

    $offset = ($page - 1) * $perPage;
    $sql = "SELECT * FROM magiamgia WHERE name LIKE '%$keyword%' OR name LIKE '%$keyword%'
    LIMIT $offset, $perPage";
    return select($sql);
}
function addvoucher()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $sql = 'INSERT INTO magiamgia(name,discount)
          values (:name,:discount)
    ';
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':discount', $_POST['discount']);
            $stmt->execute();
            header('Location:?act=voucher');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
function xoagg()
{
    $sql = "DELETE FROM magiamgia WHERE id = :id;";
    header('Location:?act=voucher');

    return slectid($sql);
}
function updategg()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $sql = "UPDATE magiamgia 
                    SET 
                    name = :name,
                    discount=:discount
                    where id=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':discount', $_POST['discount']);

            $stmt->bindParam(':id', $_POST['id']);

            $stmt->execute();
            header('Location: ?act=voucher');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
function magiamgia()
{
    $num_order = 0;
    $total = 0;

    foreach ($_SESSION['cart']['buy'] as $value) {
        $num_order += $value['sl'];
        $total += $value['tong'];
    }


    $voucher = voucherid($_GET['id']);


    $vouchers = $total - $voucher['discount'];

    $_SESSION['voucher'] = [
        'id' => $voucher['id'],
        'name' => $voucher['name'],
        'discount' => $voucher['discount']
    ];

    $_SESSION['cart']['info'] = [
        'num_order' => $num_order,
        'total' => $total + 30000,
        'vouchers' => $vouchers + 30000
    ];

    header("location: ?act=shoping-cart");
}
