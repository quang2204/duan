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
            <a href="?act=profile">
                <span>Hồ sơ</span>

            </a>
        </div>
        <div class='m-b-20  '>
            <a href="?act=updatepass">
                <span>Đổi mật khẩu</span>

            </a>
        </div>

    </div>
    <div class="thongbao">
        <a href="?act=order">
            <h5><i class="fa fa-cart-arrow-down"></i> Order</h5>
        </a>

    </div>

</div>