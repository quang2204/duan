<style>
    input {
        width: 290px;
        height: 40px;
        margin-bottom: 20px;
        padding-left: 10px;
    }

    i {
        color: black;
    }

    .m-t-40 {
        margin-top: 40px;
    }

    form {
        background-color: white;
    }

    .m-b-40 {
        margin-bottom: 40px;
    }

    .m-b-50 {
        margin-bottom: 50px;
    }

    .bor4 {
        border: 1px solid #e6e6e6;
        border-radius: 3px;
    }
</style>
<div class='mt-32 container d-flex justify-content-center mb-32'>
    <form action="" class="d-flex flex-column align-items-center relative" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,.14) ;width: 500px;height: 276px;"
                                                                                                                            method="post">

        <div class="d-flex m-t-40">
            <a href="?act=sign-in">
                <div class='absolute ' style='top: 40px;left: 20px;'><i class="fa fa-arrow-left "></i></div>
            </a>

            <h4 class='m-b-50 '>Đặt lại mật khẩu</h4>
        </div>
        <input type="password" placeholder='Nhập mật khẩu mới' class='bor4' name="pass" required=''>
        <button class="hov-btn4 " type="submit" style='width: 290px !important;height: 40px;'>Tiếp theo</button>
    </form>
</div>