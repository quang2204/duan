<style>
    .header-v3 .wrap-menu-desktop {
        background-color: black;
    }

    .container {
        margin-top: 140px;
        margin-bottom: 50px;
    }

    h1 {
        color: black;
    }

    .input {
        margin-left: 10px;
        border-radius: 10px;
        border: 0;
        width: 85%;
        height: 100%;
        margin-bottom: 0;
        box-shadow: none;
    }
</style>
<div class="container">
    <h1 style="text-align: center;margin-bottom: 30px;">Đăng Ký </h1>
    <form class="form">
        <div class="flex-column">
            <label>Họ và tên </label>
        </div>
        <div class="inputForm">

            <input type="text" class="input" placeholder="Họ và tên" required=''>
        </div>
        <div class="flex-column">
            <label>Email </label>
        </div>
        <div class="inputForm">
            <i class="fa fa-envelope"></i>
            <input type="email" class="input" placeholder="Email" required=''>
        </div>

        <div class="flex-column">
            <label>Mật khẩu </label>
        </div>
        <div class="inputForm">
            <i class="fa fa-lock"></i>
            <input type="password" class="input" id="passwordInput" placeholder="Enter your Password" required="">
            <div class="i">
                <i class="fa fa-eye"></i>
            </div>

        </div>

        <div class="flex-column">
            <label>Nhập lại mật khẩu </label>
        </div>
        <div class="inputForm">
            <i class="fa fa-lock"></i>
            <input type="password" class="input" id="passwordInput" placeholder="Enter your Password" required="">
            <div class="i">
                <i class="fa fa-eye"></i>
            </div>

        </div>

        <button class="button-submit">Đăng ký</button>
        <p class="p">Bạn đã có tài khoản? <a href="?act=login" class="span">Đăng nhập</a>

        </p>

    </form>
</div>
