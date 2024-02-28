<?php
// require_once 'product.php';
// require_once "function.php";
// require_once "connact.php";

function updatecart()
{

    // Ensure that id and qty are set in the $_GET array
    if (isset($_GET['id'], $_GET['qty'])) {
        $id = $_GET['id'];
        $qty = $_GET['qty'];

        $product = getByID($id);


        if (isset($_SESSION['cart'], $_SESSION['cart']['buy'][$id])) {
            $_SESSION['cart']['buy'][$id]['sl'] = $qty;
            $sub_total = $qty * $product['sp_price'];
            $_SESSION['cart']['buy'][$id]['tong'] = $sub_total;
            $num_order = 0;
            $total = 0;

            foreach ($_SESSION['cart']['buy'] as $value) {
                $num_order += $value['sl'];
                $total += $value['tong'];
            }

            $_SESSION['cart']['info'] = [
                'sub_total' => $sub_total,
                'total' => $total + 30000,
                'num_order' => $num_order,

            ];

            echo json_encode($_SESSION['cart']['info']);
            exit();
        }
    }
}
