<?php
function pay($pay = null, $id_order = null)
{
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            if (empty($_POST['name']) || strlen($_POST['name']) < 5 || strlen($_POST['name']) > 30) {
                $_SESSION['error']['name'] = 'Tên từ 5 đến 30 ký tự';
            } else {
                unset($_SESSION['error']['name']);
            }

            if (empty($_POST['dc']) || strlen($_POST['dc']) < 5 || strlen($_POST['dc']) > 50) {
                $_SESSION['error']['dc'] = 'Địa chỉ từ 5 đến 50 ký tự';
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
                $name = $_POST['name'];
                $total = $_POST['total'];
                $date = date("Y-m-d");
                $sql = 'INSERT INTO orders(id,name, phone, address, note, total, created_time, id_us,pay,voucher)
                        VALUES(:id,:name, :phone, :address, :note, :total, :created_time, :id_us,:pay,:voucher)';
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':phone', $_POST['sdt']);
                $stmt->bindParam(':address', $_POST['dc']);
                $stmt->bindParam(':note', $_POST['note']);
                $stmt->bindParam(':total', $total);
                $stmt->bindParam(':created_time', $date);
                $stmt->bindParam(':id_us', $_POST['user']);
                $stmt->bindParam(':id', $id_order);
                $stmt->bindParam(':voucher', $_SESSION['voucher']['name']);

                $stmt->bindParam(':pay', $pay);
                $stmt->execute();
                if ($stmt) {


                    foreach ($_SESSION['cart']['buy'] as $value) {
                        $sql_order_detail = '
                        INSERT INTO order_detail(order_id, quantity, price, id_product,colors,sizes,name)
                        VALUES(:order_id, :quantity, :price, :id_product,:colors,:sizes,:name)';
                        $stmt_order_detail = $GLOBALS['conn']->prepare($sql_order_detail);
                        $stmt_order_detail->bindParam(':order_id', $id_order);
                        $stmt_order_detail->bindParam(':quantity', $value['sl']);
                        $stmt_order_detail->bindParam(':name', $value['name']);
                        $stmt_order_detail->bindParam(':price', $value['tong']);
                        $stmt_order_detail->bindParam(':id_product', $value['id']);
                        $stmt_order_detail->bindParam(':colors', $value['color']);
                        $stmt_order_detail->bindParam(':sizes', $value['size']);
                        $stmt_order_detail->execute();
                    }
                    foreach ($_SESSION['cart']['buy'] as $value) {
                        $sqlupdate = 'UPDATE sanpham 
                                      SET quantity = quantity - :quantity
                                      WHERE id = :id';

                        $stmtupdate = $GLOBALS['conn']->prepare($sqlupdate);
                        $stmtupdate->bindParam(':quantity', $value['sl']);
                        $stmtupdate->bindParam(':id', $value['id']);
                        $stmtupdate->execute();
                    }

                }
                $to = $_POST['email'];
                $key = 1;
                $subject = "Đặt hàng Thành công";
                $body = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .table-responsive {
            max-width: 600px;
        }

        .table td,
        .table th {
            padding: 0.75rem 0;
            vertical-align: top;
            border: 0;
        }

        .container {
            margin: auto;
            width: 600px;
        }

        .col {
            width: 300px;
            text-align: left;
        }

        .img {
            margin: 20px 0;
            line-height: 2;
            
        }

        th {
            text-align: left;
        }
        
        .img img {
            margin: auto;
            margin-bottom: 30px;
            display: block;
        }

        .img p {
            text-align: left;
        }
    .red{
        color: red;
    }
    hr{
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="img">
        <img src="https://home.quangluong.id.vn/view/images/icons/logo-01.png">
            <p>
                Xin chào ' . ($name) . ',
            </p>
            <p >
                Đơn hàng <strong class="red">#' . ($id_order) . '</strong> của bạn đã đặt thành công ngày ' . ($date) . '.
            </p>
        </div>
        <hr>
        <div class="conten">
            <h4>
                <strong>
                    THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA
                </strong>
            </h4>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td scope="col" class="col" >
                            Mã đơn hàng:
                        </td>
                        <td scope="col" class="col red">#' . ($id_order) . '</td>
                    </tr>
                    <tr>
                        <td scope="col" class="col">
                            Ngày đặt hàng:
                        </td>
                        <td scope="col" class="col ">' . ($date) . '</td>
                    </tr>
                </table>';

                foreach ($_SESSION['cart']['buy'] as $value) {
                    $body .= '<table class="table">
                    <tr>
                        <td class="th"><img src="https://home.quangluong.id.vn/admin/' . $value['img'] . '" alt="" style="width: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">' . ($key++) . '.' . ($value['name']) . '</td>
                    </tr>
                    <tr>
                        <td id="th" style="width: 300px;" >Size:</td>
                        <td class="th">' . ($value['size']) . '</td>
                    </tr>   
                    <tr>
                    <td id="th"  >Color:</td>
                    <td class="th">' . ($value['color']) . '</td>
                </tr>
                    <tr>
                        <td class="th">Số lượng:</td>
                        <td class="th">' . ($value['sl']) . '</td>
                    </tr>
                    <tr>
                        <td class="th">Giá:</td>
                        <td class="th">' . (number_format($value['tong'], 0, 0, )) . '</td>
                    </tr>
                </table>
                <hr>
               ';
                }

                $body .= '
            <table class="table">
                <tr>
                    <td>Tổng tiền:</td>
                    <td>' . (number_format($_SESSION['cart']['info']['total'], 0, 0, )) . '</td>
                </tr>
                <tr>
                    <td>Voucher :</td>
                    <td>' . (number_format($_SESSION['voucher']['discount'], 0, 0, )) . '</td>
                </tr>
                <tr>
                <td>Mã giảm giá  :</td>
                <td>' . ($_SESSION['voucher']['name']) . '</td>
            </tr>
                <tr>
                    <td style="width: 300px;" >Phí vận chuyển:</td>
                    <td>30.000 đ</td>
                </tr>
                <tr>
                    <td>Tổng thanh toán:</td>
                    <td>' . (number_format($total, 0, 0, )) . '</td>
                </tr>
                
            </table>
                </div>
        </div>
    </div>
</body>

</html>';

                sendmail($to, $subject, $body);
                unset($_SESSION['cart']);
                unset($_SESSION['voucher']);
                if (isset($_POST['cod'])) {
                    header('Location: ?act=hoadon&id=' . $id_order);
                    exit();
                } elseif (isset($_POST['redirect'])) {
                    header('https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
                    exit();
                }

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

function getOrderDetailsByUserId()
{
    try {
        $sql = 'SELECT 
                    `order`.id as id,
                    `order`.status as status,
                    detail.order_id as order_id,
                    detail.quantity as quantity,
                    detail.price as price,
                    detail.id as detail_id,
                    detail.id_product as id_product,
                    detail.colors as colors,
                    detail.sizes as sizes,
                    detail.is_comment as is_comment,
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
        $stmt->bindParam(':id_user', $_SESSION['users']['id']);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function getOrderDetailId()
{
    try {
        $sql = 'SELECT 
                    `order`.id as id,
                    `order`.status as status,
                    detail.order_id as order_id,
                    detail.quantity as quantity,
                    detail.price as price,
                    detail.id as detail_id,
                    detail.id_product as id_product,
                    detail.colors as colors,
                    detail.sizes as sizes,
                    detail.is_comment as is_comment,
                    user.id as id_user,
                    sp.img as img,
                    sp.id as sp_id,
                    sp.iddm as sp_iddm,
                    sp.name as name
                FROM order_detail as detail
                INNER JOIN orders AS `order` ON `order`.id = detail.order_id
                INNER JOIN taikhoan AS user ON `order`.id_us = user.id
                INNER JOIN sanpham AS sp ON detail.id_product = sp.id
                WHERE user.id = :id_user and `order`.status=:status';

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':id_user', $_SESSION['users']['id']);
        $stmt->bindParam(':status', $_GET['status']);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function ordersid($id)
{
    try {
        $sql = 'SELECT 
                    `orders`.id as id,
                    `orders`.status as status,
                    detail.order_id as order_id,
                    detail.quantity as quantity,
                    detail.price as price,
                    detail.id_product as id_product,
                    detail.colors as colors,
                    detail.sizes as sizes,
                    detail.name as name
                FROM orders as `orders`
                INNER JOIN order_detail AS detail ON detail.order_id = `orders`.id
                WHERE `orders`.id = :order_id';
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":order_id", $id);
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

function bl()
{
    try {
        if (isset($_POST['submit_comment'])) {
            $id = $_POST['id'];
            $sql = "SELECT * FROM order_detail WHERE id_product = :id_product LIMIT 1;";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id_product", $id);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}

function orderall($keyword, $page = '', $perPage = '')
{

    $offset = ($page - 1) * $perPage;

    $sql = "SELECT * FROM orders WHERE id LIKE '%$keyword%' OR id LIKE '%$keyword%' ORDER BY created_time DESC LIMIT $offset, $perPage";
    return select($sql);
}
// function orderall($page = null, $perPage = null)
// {
//     // Calculate the offset for pagination
//     $offset = ($page - 1) * $perPage;

//     // Fix the SQL query
//     $sql = "SELECT `order`.id as order_id,
//                     `order`.name as order_name,
//                     `order`.phone as phone,
//                     `order`.address as address,
//                     `order`.note as note,
//                     `order`.total as total,
//                     `order`.created_time as created_time,
//                     `order`.pay as pay,
//                     `order`.status as status,
//                     `order`.id_voucher as id_voucher,
//                     gg.id as gg_id,
//                     gg.name as gg_name
//             FROM orders AS `order`
//             INNER JOIN magiamgia AS gg 
//             ON gg.id = `order`.id_voucher
//             ORDER BY `order`.created_time DESC 
//             LIMIT $offset, $perPage";

//     // Assuming 'select' is a function to execute SQL queries
//     return select($sql);
// }
function orderiduser()
{
    try {
        $sql = "SELECT * FROM orders WHERE id_us = :id_us ORDER BY created_time DESC";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id_us", $_SESSION['users']['id']);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function orderids()
{
    try {
        $sql = "SELECT * FROM orders WHERE id_us = :id_us and status=:status ORDER BY created_time DESC";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id_us", $_SESSION['users']['id']);
        $stmt->bindParam(":status", $_GET['status']);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
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
            // header('Location: ?act=order');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }

    }
}
