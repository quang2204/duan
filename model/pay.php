<?php
function pay()
{
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['name']) || strlen($_POST['name']) < 5 || strlen($_POST['name']) > 30) {
                $_SESSION['error']['name'] = 'Tên từ 5 đến 30 ký tự';
            } else {
                unset($_SESSION['error']['name']);
            }

            if (empty($_POST['dc']) || strlen($_POST['dc']) < 5 || strlen($_POST['dc']) > 30) {
                $_SESSION['error']['dc'] = 'Địa chỉ từ 5 đến 30 ký tự';
            } else {
                unset($_SESSION['error']['dc']);
            }

            if (empty($_POST['sdt'])) {
                $_SESSION['error']['sdt'] = 'Bắt buộc nhập số điện thoại';
            } else {
                $phoneNumber = $_POST['sdt'];
                $pattern = '/^[0-9]{10,15}$/';
                if (!preg_match($pattern, $phoneNumber)) {
                    $_SESSION['error']['sdt'] = 'Định dạng số điện thoại không hợp lệ';
                } else {
                    unset($_SESSION['error']['sdt']);
                }
            }

            if (empty($_SESSION['error'])) {
                $date = date("Y-m-d");
                $sql = 'INSERT INTO orders(name, phone, address, note, total, created_time, id_us,pay)
                        VALUES(:name, :phone, :address, :note, :total, :created_time, :id_us,:pay)';
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->bindParam(':name', $_POST['name']);
                $stmt->bindParam(':phone', $_POST['sdt']);
                $stmt->bindParam(':address', $_POST['dc']);
                $stmt->bindParam(':note', $_POST['note']);
                $stmt->bindParam(':total', $_POST['total']);
                $stmt->bindParam(':created_time', $date);
                $stmt->bindParam(':id_us', $_POST['user']);

                $stmt->bindParam(':pay', $_POST['tt']);
                $stmt->execute();
                if ($stmt) {
                    $order_id = $GLOBALS['conn']->lastInsertId();
                    foreach ($_SESSION['cart']['buy'] as $value) {
                        $sql_order_detail = '
                        INSERT INTO order_detail(order_id, quantity, price, id_product,colors,sizes,name)
                        VALUES(:order_id, :quantity, :price, :id_product,:colors,:sizes,:name)';
                        $stmt_order_detail = $GLOBALS['conn']->prepare($sql_order_detail);
                        $stmt_order_detail->bindParam(':order_id', $order_id);
                        $stmt_order_detail->bindParam(':quantity', $value['sl']);
                        $stmt_order_detail->bindParam(':name', $value['name']);
                        $stmt_order_detail->bindParam(':price', $value['tong']);
                        $stmt_order_detail->bindParam(':id_product', $value['id']);
                        $stmt_order_detail->bindParam(':colors', $value['color']);
                        $stmt_order_detail->bindParam(':sizes', $value['size']);
                        $stmt_order_detail->execute();
                    }
                }
                unset($_SESSION['cart']);
                header('Location: ?act=hoadon&id=' . $order_id);
                exit();
            }
        }
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function order()
{
    try {
        $sql = "SELECT * FROM order_detail WHERE order_id = :order_id ;";
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":order_id", $_GET['id']);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function getOrderDetailsByUserId($userId)
{
    try {
        $sql = 'SELECT 
                    `order`.id as id,
                    `order`.status as status,
                    detail.order_id as order_id,
                    detail.quantity as quantity,
                    detail.price as price,
                    detail.id_product as id_product,
                    detail.colors as colors,
                    detail.sizes as sizes,
                    user.id as id_user,
                    sp.img as img,
                    sp.id as sp_id,
                    sp.iddm as sp_iddm,
                    sp.name as name
                FROM order_detail as detail
                INNER JOIN orders AS `order` ON `order`.id = detail.order_id
                INNER JOIN taikhoan AS user ON `order`.id_us = user.id
                INNER JOIN sanpham AS sp ON detail.id_product = sp.id
                WHERE user.id = :id_user';

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':id_user', $userId);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}




function orderid()
{
    $sql = "SELECT * FROM orders WHERE id = :id LIMIT 1;";

    return slectid($sql);

}

function orderall()
{
    $sql = "SELECT * FROM orders ";

    return select($sql);

}
function xoaorder()
{

    $sql = "DELETE FROM orders WHERE id = :id;";
    return slectid($sql);

}
function updateorder()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {

            $sql = "UPDATE orders 
                SET 
                status = :status
                where id=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':status', $_POST['status']);

            $stmt->bindParam(':id', $_POST['id']);

            $stmt->execute();
            header('Location: ?act=order');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }

    }
}