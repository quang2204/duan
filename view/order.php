<?php
if (empty($_SESSION['users'])) {
    header('Location: ?act=sign-in');

}
?>
<style>
    span,
    h5,
    strong,
    h6,
    h4,
    p {
        color: black;

    }
</style>

<div class="container m-t-150 p-b-60 d-flex justify-content-between">
    <?php require_once 'view/inc/headeruser.php' ?>

    <div>

        <?php foreach ($orders as $key => $values): ?>
            <!-- <a href="?act=hoadon&id=<?= $values['id'] ?>"> -->
            <div class="container how-shadow1 m-b-30 bor2 " style="width: 900px">
                <div class="bor12 p-t-20  text-right p-b-20 text-danger">
                    <?php if ($values['status'] == 1) {
                        echo 'Thành công';
                    } elseif ($values['status'] == 0) {
                        echo ' Đang xác nhận';

                    } elseif ($values['status'] == 2) {
                        echo 'Đã hủy';
                    } elseif ($values['status'] == -2) {
                        echo 'Giao hàng thành công';
                    } elseif ($values['status'] == 3) {
                        echo 'Xác nhận';

                    } else {
                        echo 'Đang vận chuyển';
                    }
                    ?>
                </div>

                <?php foreach ($order as $key => $value): ?>

                    <?php if ($values['id'] == $value['order_id']): ?>
                 
                        <a href="?act=hoadon&id=<?= $values['id'] ?>">
                            <div class='d-flex justify-content-between align-items-center bor12'>
                                <div class="d-flex p-t-20 " style='gap:20px'>
                                    <img src="admin/<?= $value['img'] ?>" style="width: 80px;height: 80px;margin-bottom: 10px;">
                                    <div style="line-height: 2;">
                                        <h5 style='max-width: 580px;'>
                                            <?= $value['name'] ?>
                                        </h5>
                                        <p>Phân loại hàng : Size:
                                            <?= $value['sizes'] ?>, Color:
                                            <?= $value['colors'] ?>
                                            <input type="hidden">
                                        </p>
                                        <strong>x
                                            <?= $value['quantity'] ?>
                                        </strong>
                                    </div>
                                </div>
                                <div>
                                    <p style="color: red;" class='fs-20 m-b-20 m-l-80'>
                                        <?= number_format($value['price'], 0, 0, ) ?> đ

                                    </p>
    <div class="d-flex justify-content-end align-items-center" style='gap:20px;'>
                                    <?php if ($values['status'] == 1): ?>
                                    
                                            <input type="hidden" name='size' class="size" value='<?= $value['sizes'] ?>'>
                                            <input type="hidden" name='color' class="color" value='<?= $value['colors'] ?>'>
                                            <?php if ($value['is_comment'] == 0):
                                                ?>
                                                <a href="?act=commen&idbl=<?= $value['id_product'] ?>&id=<?= $value['detail_id'] ?>">

                                                    <button class="cursor fs-18">
                                                        Bình luận
                                                    </button>
                                                </a>
                                            <?php endif; ?>



                                      
                                    <?php endif; ?>
                                    <h5 class="cursor add-to-cart-btn js-addwish-b2" data-product-id='<?= $value['id_product'] ?>'>
                                        Mua Lại</h5>
                                          </div>
                                </div>

                            </div>
                        </a>

                    <?php endif; ?>
                <?php endforeach; ?>
                <div>
                    <h4 class="text-right m-t-30">Ship : <strong> 30.000 đ</strong> </h4>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <h6 class='text-right m-t-30 m-b-30 p-'>Thành Tiền : </h6>
                    <div class='fs-30 p-l-10' style='color: red;'>
                        <?= number_format($values['total'], 0, 0, ) ?> đ
                    </div>
                </div>
                <?php if ($values['status'] == 0): ?>
                    <form action="?act=updateorder" method="post" class='d-flex justify-content-end '>
                        <input type="hidden" name='status' value='2'>
                        <input type="hidden" name='id' value='<?= $values['id'] ?>'>
                        <button class="btn mt-1  m-b-30 hov-btn4" style='background-color: red;padding: 7px 10px; max-width: 130px; height:40px'
                                                                                                                                                type='submit'>
                            Hủy đơn hàng
                        </button>
                    </form>
                <?php elseif ($values['status'] == -2): ?>

                    <div class="d-flex justify-content-end" style='gap:20px'>
                        <form action="?act=updateorder" method="post" class='d-flex justify-content-end '>
                            <input type="hidden" name='status' value='2'>
                            <input type="hidden" name='id' value='<?= $values['id'] ?>'>
                            <button class="btn mt-1  m-b-30 hov-btn4" style='background-color: red;padding: 7px 10px; max-width: 130px; height:40px'
                                                                                                                                                    type='submit'>
                                Trả hàng
                            </button>
                        </form>
                        <form action="?act=updateorder" method="post" class='d-flex justify-content-end '>
                            <input type="hidden" name='status' value='1'>
                            <input type="hidden" name='id' value='<?= $values['id'] ?>'>
                            <button class="btn mt-1  m-b-30 hov-btn5" style='background-color: blue;padding: 7px 10px; max-width: 130px; height:40px'
                                                                                                                                                    type='submit'>
                                Đã nhận hàng
                            </button>
                        </form>
                    </div>

                <?php endif ?>

            </div>
            <!-- </a> -->
        <?php endforeach; ?>
    </div>
</div>