<style>
    input {
        width: 290px;
        height: 40px;
        margin-bottom: 20px;
        padding-left: 10px;
    }

    form i {
        color: black;
    }

    .m-b-50 {
        margin-bottom: 50px;
    }

    .bor4 {
        border: 1px solid #e6e6e6;
        border-radius: 3px;
    }

    .hov-btn4:hover {
        border: 1px solid red !important;
        background-color: #fff !important;
        color: red;
    }

    .hov-btn4 {
        background-color: red !important;
        color: white;
        width: 150px !important;
    }

    form {
        background-color: white;
    }
</style>
<div class='mt-12 container d-flex justify-content-center mb-6'>
    <form action="" class="d-flex flex-column align-items-center relative" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,.14) ;width: 500px;height: 276px;"
                                                                                                                            method="post">

        <div class="d-flex mt-4">
            <a href="?act=sign-in">
                <div class='absolute ' style='top: 30px;left: 20px;'><i class="fa fa-arrow-left "></i></div>
            </a>

            <h4 class='m-b-50 '>Đặt lại mật khẩu</h4>
        </div>
        <input type="email" placeholder='Nhập email' class='bor4' name="email" required=''>
        <button class="hov-btn4 " type="submit" style='width: 290px !important;height: 40px;'>Tiếp theo</button>
    </form>
</div>