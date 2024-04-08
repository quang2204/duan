<?php
if (empty($_SESSION['users'])) {
    header('Location: ?act=sign-in');

}
?>
<style>
    li {
        list-style: disc;
    }

    .dh {
        line-height: 2.3;
        font-size: 16px;
        padding-left: 20px;
    }

    .ct {
        background-color: rgba(0, 0, 0, 0.02);
        box-shadow: 1px 1px 3px 0px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.07), inset 0 0 0 1px rgba(0, 0, 0, 0.05);
    }

    .th {
        width: 500px;
    }

    @media (max-width: 870px) {
        .rows {
            flex-wrap: wrap;
            justify-content: center !important;
        }

        .ct {
            width: 580px;
            margin-bottom: 70px;
        }
    }
</style>

<div class='m-t-140 container d-flex justify-content-around rows' style='gap: 30px'>

    <div>
        <h3>Chi tiết sản phẩm </h3>

        <table class="table m-t-30 ">
            <thead>
                <tr>
                    <th scope="col" class="th">Sản phẩm </th>
                    <th scope="col" class='text-right'>Tổng</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($order as $key => $value): ?>
                    <tr>
                        <th scope="row">
                            <?=
                                substr($value['name'], 0, 30) . '...';
                            ?>
                            <br>

                            SL :
                            <?= $value['quantity'] ?>,
                            Màu :
                            <?= $value['colors'] ?>,
                            Size :
                            <?= $value['sizes'] ?>


                        </th>
                        <td class='text-right'>
                            <?= number_format($value['price'], 0, 0, ) ?> đ
                        </td>

                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th scope="row">Voucher : </th>
                    <td class='text-right'>
                        <?= $orders['voucher'] ?>
                    </td>

                </tr>
                <tr>
                    <th scope="row">Ship : </th>
                    <td class='text-right'>30.000 đ</td>

                </tr>
                <tr>
                    <th scope="row">Phương thức thanh toán:</th>
                    <td class='text-right'>
                        <?php
                        if ($orders['pay'] == 0) {
                            echo 'Cod';
                        } elseif ($orders['pay'] == 1) {
                            echo 'Thanh toán bằng vnpay';
                        } else {
                            echo 'Thanh toán bằng momo';

                        }
                        ?>
                    </td>

                </tr>
                <tr>
                    <th scope="row">Tổng cộng:</th>
                    <td class='text-right'>
                        <?= number_format($orders['total'], 0, 0, ) ?>đ
                    </td>

                </tr>

            </tbody>

        </table>
        <a href="?">
            <button class='m-b-100 bor11 hov-btn3 bor10 p-l-20 p-r-20 p-t-6 p-b-6 '>Quay lại trang chủ</button>
        </a>
    </div>

    <div class='bor4 p-l-40 p-r-110 h-25 ct'>
        <h4 class='m-t-20 m-b-20'>Cảm ơn bạn đã mua hàng</h4>
        <ul class='dh '>
            <li>Mã đơn hàng :
                <strong>
                    DH
                    <?= $orders['id'] ?>
                </strong>
            </li>
            <li>Ngày:
                <strong>
                    <?= $orders['created_time'] ?>
                </strong>
            </li>
            <li>Tổng cộng :
                <strong>
                    <?= number_format($orders['total'], 0, 0, ) ?>đ

                </strong>
            </li>
            <li>Phương thức thanh toán :
                <strong>
                    <?php
                    if ($orders['pay'] == 0) {
                        echo 'Cod';
                    } elseif ($orders['pay'] == 1) {
                        echo 'Thanh toán bằng vnpay';
                    } else {
                        echo 'Thanh toán bằng momo';

                    }
                    ?>
                </strong>
            </li>
            <li>Trạng thái đơn hàng :
                <strong>
                    <?= $orders['status'] ? 'Thành công' : "Đang xác nhận" ?>

                </strong>
            </li>

        </ul>
    </div>


</div>