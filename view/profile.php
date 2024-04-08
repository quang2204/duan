<?php
if (empty($_SESSION['users'])) {
    header('Location: ?act=sign-in');

}
?>
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

    input {
        width: 400px
    }
</style>

<div class="container m-t-150 p-b-60 d-flex ">
    <?php require_once 'view/inc/headeruser.php' ?>

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
                            <input type="text" name='name' class="bor4 p-t-7 p-b-7 p-l-10 " value="<?= $pro['name'] ?>">
                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class='email'>
                            <label for="email">Email</label>
                        </td>
                        <td class='email'>
                            <input type="text" name="email" class='bor4 p-t-7 p-b-7 p-l-10 '
                                                                                                                                                    value='<?= $pro['email'] ?>'>


                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class='tel'>
                            <label for="tel">Phone</label>
                        </td>
                        <td class='tel'>
                            <input type="text" name="tel" class='bor4 p-t-7 p-b-7 p-l-10  m-l--6'
                                                                                                                                                    value='<?php echo isset($pro['tel']) ? $pro['tel'] : ''; ?>'>


                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class='address'>
                            <label for="address">Address</label>
                        </td>
                        <td class='address'>
                            <input type="text" name="address" class='bor4 p-t-7 p-b-7 p-l-5  m-l--16'
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