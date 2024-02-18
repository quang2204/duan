<?php

function cart()
{
    $id = $_GET['id'];
    $qty = 1;
    $product = getByID($id);

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['sl'] + 1; // Increment the quantity
    }

    $_SESSION['cart']['buy'][$id] = [
        'id' => $product['sp_id'],
        'name' => $product['sp_name'],
        'price' => $product['sp_price'],
        'img' => $product['sp_img'],
        'sl' => $qty,
        'iddm' => $product['dm_id'],
        'tong' => $product['sp_price'] * $qty
    ];

    upadte();

    echo json_encode($_SESSION['cart']);

    exit();
}

function upadte()
{
    $num_order = 0;
    $total = 0;

    foreach ($_SESSION['cart']['buy'] as $value) {
        $num_order += $value['sl'];
        $total += $value['tong'] + 30000;
    }

    $_SESSION['cart']['info'] = [
        'num_order' => $num_order,
        'total' => $total
    ];
}
function deletecart()
{

    unset($_SESSION['cart']['buy'][$_GET['id']]);
    upadte();
    echo json_encode($_SESSION['cart']);
    exit();


}
