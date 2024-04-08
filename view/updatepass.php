<?php
if (empty($_SESSION['users'])) {
    header('Location: ?act=sign-in');

}
?>
<style>
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
<div class="container m-t-150 p-b-60 d-flex justify-content-between">
    <?php require_once 'view/inc/headeruser.php' ?>
    <form class='m-b-50 d-flex  align-items-center bor4 p-b-30 p-t-30 m-lr-auto p-r-30 p-l-30 p-t-30 p-b-30' method="post" enctype="multipart/form-data"
                                                                                                                            style='box-shadow: 1px 0px 10px 1px #bab5b5;gap:30px;width: 800px;'>
        <input type="hidden" name='id' value='<?= $_SESSION['users']['id'] ?>'>

        <div class="bor6">
            <div class="p-b-30 bor12">
                <h2 class='m-b-10'>Đổi mật khẩu</h2>
                <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
            </div>

            <div class="hs m-t-40">
                <div class="d-flex align-items-center m-b-30" style='gap:38px'>
                    <h6 style='font-size: 16px;color: rgba(0, 0, 0, .65);'>Mật khẩu hiện tại </h6>
                    <input type="pas" name="pass" class='bor4 p-t-7 p-b-7 p-l-10 '>
                </div>
                <div class="d-flex align-items-center m-b-30" style='gap:60px'>
                    <h6 style='font-size: 16px;color: rgba(0, 0, 0, .65);'>Mật khẩu mới </h6>
                    <input type="password" name="thaypas" class='bor4 p-t-7  p-b-7 p-l-10 '>
                </div>
                <div class="d-flex align-items-center m-b-30" style='gap:20px'>
                    <h6 style='font-size: 16px;color: rgba(0, 0, 0, .65);'>Xác nhận mật khẩu
                    </h6>
                    <input type="password" name="nhaplai" class='bor4 p-t-7 p-b-7 p-l-10 '>
                </div>
                <button type='submit ' class='hov-btn4 m-t-30'
                                                                                                                                        style='width: 30%;height: 40px;margin-left: 165px;'>Lưu</button>

            </div>

        </div>

    </form>
</div>