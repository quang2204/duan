<style>
    span,
    h5 {
        color: black;

    }
</style>

<div class="container m-t-150 p-b-60 d-flex justify-content-between">
    <div>
        <div class='d-flex  m-b-30  p-b-10' style='gap:15px'>
            <img src="admin/<?= $pro['img'] ?>" alt="" style='max-width: 60px; height: 60px;border-radius: 50%;'>
            <div class="name">
                <span>
                    <strong>
                        <?= $pro['name'] ?>
                    </strong>
                    <a href="?act=profile&id=<?= $_SESSION['users']['id'] ?>">
                        <p style="color:black"> <svg xmlns="http://www.w3.org/2000/svg" style='width: 15px;' viewBox="0 0 512 512"
                                                                                                                                                    class='op-06 m-r-3'>
                                <path
                                                                                                                                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg> Sửa hồ sơ</p>
                    </a>

                </span>
            </div>
        </div>
        <div class="user">
            <h5><i class="fa fa-user" style='color: blue;'></i> Tài khoản của tôi</h5>

        </div>
        <div class="dropdown p-l-16 m-t-15">
            <div class='m-b-15'>
                <a href="?act=profile&id=<?= $_SESSION['users']['id'] ?>">
                    <span>Hồ sơ</span>

                </a>
            </div>
            <div class='m-b-20  '>
                <a href="#">
                    <span>Địa chỉ</span>

                </a>
            </div>

        </div>
        <div class="thongbao">
            <a href="">
                <h5><i class="fa fa-cart-arrow-down"></i> Order</h5>
            </a>

        </div>
        <div class="thongbao m-t-20">
            <a href="">
                <h5><i class="fa fa-bell" style='color: red;'></i> Notifications</h5>
            </a>

        </div>
    </div>

    <div>

        <?php foreach ($orders as $key => $values): ?>
            <div class="container how-shadow1 m-b-30 bor2 " style="width: 900px">
                <div class="bor12 p-t-20  text-right p-b-20 text-danger">
                    <?php if ($values['status'] == 1) {
                        echo 'Thành công';
                    } elseif ($values['status'] == 0) {
                        echo ' Đang xác nhận';
                    } else {
                        echo 'Đã hủy';
                    }
                    ?>
                </div>

                <?php foreach ($order as $key => $value): ?>

                    <?php if ($values['id'] == $value['order_id']): ?>

                        <div class='d-flex justify-content-between align-items-center bor12'>
                            <div class="d-flex p-t-20 " style='gap:20px'>
                                <img src="admin/<?= $value['img'] ?>" style="width: 80px;height: 80px;margin-bottom: 10px;">
                                <div style="line-height: 2;">
                                    <h5 style='max-width: 600px;'>
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
                                <?php if ($values['status'] == 1): ?>
                                    <div class="d-flex " style='gap:20px;'>
                                        <input type="hidden" name='size' class="size" value='<?= $value['sizes'] ?>'>
                                        <input type="hidden" name='color' class="color" value='<?= $value['colors'] ?>'>
                                        <h5 class="cursor add-to-cart-btn js-addwish-b2" data-product-id='<?= $value['id_product'] ?>'>
                                            Mua Lại</h5>
                                        <a href="?act=commen&id=<?= $value['id_product'] ?>">
                                            <button class="cursor ">
                                                Bình luận
                                            </button>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
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
                        <input type="hidden" name='id' value='<?= $value['id'] ?>'>
                        <button class="btn mt-1  m-b-30 hov-btn4" style='background-color: red;padding: 7px 10px; max-width: 130px; height:40px'
                                                                                                                                                type='submit'>
                            Hủy đơn hàng
                        </button>
                    </form>
                <?php endif ?>

            </div>
        <?php endforeach; ?>
    </div>
</div>