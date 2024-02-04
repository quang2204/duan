<style>
    tr {
        border-bottom: 0px solid #ccc;
        gap: 25px;
        margin-bottom: 30px;

    }

    span {
        color: black;
    }

    h5 {
        color: black;
    }
</style>
<div class="container m-t-150 p-b-60 d-flex ">
    <div>
        <div class='d-flex  m-b-30  p-b-10' style='gap:15px'>
            <img src="admin/<?= $pro['img'] ?>" alt="" style='max-width: 60px; height: 60px;border-radius: 50%;'>
            <div class="name">
                <span>
                    <strong>
                        <?= $pro['name'] ?>
                    </strong>
                    <a href="?act=portfolio&id=<?= $_SESSION['users']['id'] ?>">
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
                <a href="?act=portfolio&id=<?= $_SESSION['users']['id'] ?>">
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


    <form class='m-b-50 d-flex justify-content-around align-items-center bor4 p-b-30 p-t-30 m-lr-auto p-r-30 p-l-30 p-t-30 p-b-30'
                                                                                                                            method="post"
                                                                                                                            enctype="multipart/form-data"
                                                                                                                            style='box-shadow: 1px 0px 10px 1px #bab5b5;gap:30px'>
        <input type="hidden" name='id' value='<?= $_SESSION['users']['id'] ?>'>

        <div class="bor6">
            <div class="p-b-30 bor12">
                <h2 class='m-b-10'>Hồ sơ của tôi</h2>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            </div>

            <div class="hs">
                <table>
                    <tr class="d-flex  m-t-37">
                        <td class='name '>
                            <label for="name">Name</label>
                        </td>
                        <td class='name'>
                            <input type="text" name='name' class="bor4 p-t-7 p-b-7 p-l-10 p-r-180"
                                                                                                                                                    value="<?= $pro['name'] ?>">
                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class='email'>
                            <label for="email">Email</label>
                        </td>
                        <td class='email'>
                            <input type="text" name="email" class='bor4 p-t-7 p-b-7 p-l-10 p-r-180'
                                                                                                                                                    value='<?= $pro['email'] ?>'>


                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class='tel'>
                            <label for="tel">Phone</label>
                        </td>
                        <td class='tel'>
                            <input type="text" name="tel" class='bor4 p-t-7 p-b-7 p-l-10 p-r-180 m-l--6'
                                                                                                                                                    value='<?php echo isset($pro['tel']) ? $pro['tel'] : ''; ?>'>


                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class='address'>
                            <label for="address">Address</label>
                        </td>
                        <td class='address'>
                            <input type="text" name="address" class='bor4 p-t-7 p-b-7 p-l-5 p-r-180 m-l--16'
                                                                                                                                                    value='<?php echo isset($pro['address']) ? $pro['address'] : ''; ?>'>


                        </td>

                    </tr>

                </table>
                <button type='submit ' class='btn'>Lưu</button>

            </div>

        </div>
        <div class="d-flex flex-column">
            <input type="hidden" value="<?= $pro['img'] ?>">

            <input type="file" id="fileInput" accept=".jpg,.jpeg,.png" onchange="displayFileName(this)" name='img'
                                                                                                                                    class='d-none'>

            <img src="admin/<?= $pro['img'] ?>" alt="" class="m-b-30" style="max-width: 250px;border-radius: 50%;">

            <button type="button" id="customButton" onclick="chooseFile()" name='img'>Thêm ảnh</button>
            <p style="margin: auto;padding-top: 5px;">Định dạng:.jpg,.jpeg,.png</p>
            <br>
            <p id="fileName" style="margin: auto;"></p>

        </div>
    </form>


</div>