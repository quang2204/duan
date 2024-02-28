<?php

function cart()
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $qty = isset($_GET['quantity']) ? ($_GET['quantity']) : 1;
    $color = isset($_GET['color']) ? $_GET['color'] : 'red';
    $size = isset($_GET['size']) ? $_GET['size'] : 'M';

    if ($qty <= 0) {
        $qty = 1;
    }

    $product = getByID($id);

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['sl'] + $qty;
    }

    $_SESSION['cart']['buy'][$id] = [
        'id' => $product['sp_id'],
        'name' => $product['sp_name'],
        'price' => $product['sp_price'],
        'img' => $product['sp_img'],
        'sl' => $qty,
        'iddm' => $product['dm_id'],
        'color' => $color,
        'size' => $size,
        'tong' => $product['sp_price'] * $qty
    ];

    update();

    echo json_encode($_SESSION['cart']);

    exit();
}

function update()
{
    $num_order = 0;
    $total = 0;

    foreach ($_SESSION['cart']['buy'] as $value) {
        $num_order += $value['sl'];
        $total += $value['tong'];
    }

    $_SESSION['cart']['info'] = [
        'num_order' => $num_order,
        'total' => $total + 30000
    ];
}
function deletecart()
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    unset($_SESSION['cart']['buy'][$id]);
    update();
    echo json_encode($_SESSION['cart']);
    exit();
}

