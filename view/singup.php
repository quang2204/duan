<style>
    .header-v3 .wrap-menu-desktop {
        background-color: black;
    }

    .container {
        margin-top: 140px;
        margin-bottom: 80px;
    }

    h1 {
        color: black;
    }

    .p {
        text-align: center;
    }

    .form {
        margin: auto;
        box-shadow: 3px 4px 10px 0px #d3c5c5;

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
<div class="container forms">
    <h1 style="text-align: center;margin-bottom: 30px;">Đăng Ký </h1>
    <form class="form" method="post" action="">
        <div class="flex-column">
            <label>Họ và tên </label>
        </div>
        <div class="inputForm">
            <i class="fa fa-user"></i>
            <input type="text" class="input" placeholder="Họ và tên" name='name' required=''>
        </div>
        <div class="flex-column">
            <label>Email </label>
        </div>
        <div class="inputForm">
            <i class="fa fa-envelope"></i>
            <input type="email" class="input" placeholder="Email" name='email' required=''>
        </div>


        <div class="flex-column">
            <label>Mật khẩu </label>
        </div>
        <div class="inputForm">
            <i class="fa fa-lock"></i>
            <input type="password" class="input" id="passwords" name="pass" placeholder="Enter your Password"
                                                                                                                                    required="">
            <div class="ii">
                <i class="fa fa-eye-slash"></i>
            </div>
            <select name="role" id="role" style="display:none;">
                <option value="0">User</option>

            </select>
        </div>

        <div class="flex-column">
            <label>Nhập lại mật khẩu </label>
        </div>
        <div class="inputForm">
            <i class="fa fa-lock"></i>
            <input type="password" class="input" id="password" placeholder="Enter your Password" name="nhaplai" required="">
            <div class="mat">
                <i class="fa fa-eye-slash"></i>
            </div>

        </div>

        <button class="button-submit">Đăng ký</button>
        <p class="p">Bạn đã có tài khoản? <a href="?act=sign-in" class="span">Đăng nhập</a>

        </p>

    </form>
</div>