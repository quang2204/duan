<?php
if (empty($_SESSION['users'])) {
    header('Location: ?act=sign-in');

}
?>
<style>
    input {
        width: 290px;
        height: 40px;
        margin-bottom: 20px;
        padding-left: 10px;
    }

    .i i {
        color: black;
    }

    .red {
        color: red;
    }
</style>
<div class='m-t-200 container d-flex justify-content-center m-b-100'>
    <form action="" class="d-flex flex-column align-items-center pos-relative" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,.14) ;width: 500px;"
                                                                                                                            method="post">

        <div class="d-flex m-t-40">
            <a href="?act=sign-in">
                <div class='pos-absolute i' style='top: 40px;left: 20px;'><i class="fa fa-arrow-left "></i></div>
            </a>

            <h4 class='m-b-50 '>Đặt lại mật khẩu</h4>
        </div>
        <p class='m-b-5'>Mã xác minh đã được gửi đến địa chỉ email</p>
        <p class='red m-b-5'>

            <?= $_SESSION['email']['email'] ?>
        </p>
        <p class='m-b-40'>Vui lòng xác minh.</p>

        <button class="hov-btn4 m-b-40" type="submit" style='width: 290px !important;height: 40px;'>OK</button>


    </form>
</div>