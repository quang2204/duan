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

    .bor4 {
        border: 1px solid #e6e6e6;
        border-radius: 3px;
    }

    .m-lr-auto {
        margin-left: auto;
        margin-right: auto;
    }

    h2,
    p {
        color: black;
    }

    .m-b-30,
    .m-tb-30,
    .m-all-30 {
        margin-bottom: 30px;
    }

    .bor6 {
        border-right: 1px solid rgba(255, 255, 255, 0.1);
    }

    .bor12 {
        border-bottom: 1px solid #d9d9d9;
    }

    .m-b-10,
    .m-tb-10,
    .m-all-10 {
        margin-bottom: 10px;
    }

    .bor4 {
        border: 1px solid #e6e6e6;
        border-radius: 3px;
    }

    .input {
        padding: 7px 10px 7px 7px;
    }

    form {
        background-color: white;
    }



    input:focus {
        outline: none;
    }
</style>
<div class="container mt-12 pb-5 d-flex justify-content-between">

    <form class='mb-6 d-flex  align-items-center bor4 pb-4 pt-4 m-lr-auto p-4' method="post" enctype="multipart/form-data"
                                                                                                                            style='box-shadow: 1px 0px 10px 1px #bab5b5;gap:30px;width: 800px;'>
        <input type="hidden" name='id' value='<?= $_SESSION['users']['id'] ?>'>

        <div class="bor6">
            <div class="pb-3 bor12">
                <h2 class='m-b-10'>Đổi mật khẩu</h2>
                <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
            </div>

            <div class="hs mt-4">
                <div class="d-flex align-items-center m-b-30" style='gap:38px'>
                    <h6 style='font-size: 16px;color: rgba(0, 0, 0, .65);'>Mật khẩu hiện tại </h6>
                    <input type="text" name="pass" class='bor4 input '>
                </div>
                <div class="d-flex align-items-center m-b-30" style='gap:64px'>
                    <h6 style='font-size: 16px;color: rgba(0, 0, 0, .65);'>Mật khẩu mới </h6>
                    <input type="password" name="thaypas" class='bor4 input '>
                </div>
                <div class="d-flex align-items-center m-b-30" style='gap:23px'>
                    <h6 style='font-size: 16px;color: rgba(0, 0, 0, .65);'>Xác nhận mật khẩu
                    </h6>
                    <input type="password" name="nhaplai" class='bor4 input'>
                </div>
                <button type='submit ' class='hov-btn4 m-t-30'
                                                                                                                                        style='width: 30%;height: 40px;margin-left: 170px;'>Lưu</button>

            </div>

        </div>

    </form>
</div>