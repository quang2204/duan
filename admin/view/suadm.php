<style>
    .form {
        margin-top: 70px;
        margin-bottom: 180px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        max-width: 400px;
        background-color: #fff;
        padding: 20px;
        border-radius: 20px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 1px 2px 10px 1px #c2bdbd;

    }

    .title {
        font-size: 28px;
        color: royalblue;
        font-weight: 600;
        letter-spacing: -1px;
        position: relative;
        display: flex;
        align-items: center;
        padding-left: 60px;

    }

    .title::before,
    .title::after {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        border-radius: 50%;
        left: 0px;
        background-color: royalblue;
    }

    .title::before {
        width: 18px;
        height: 18px;
        background-color: royalblue;
    }

    .title::after {
        width: 18px;
        height: 18px;
        animation: pulse 1s linear infinite;
    }


    .signin {
        text-align: center;
    }

    .signin a {
        color: royalblue;
    }

    .signin a:hover {
        text-decoration: underline royalblue;
    }

    form .flex {
        display: flex;
        width: 100%;
        gap: 6px;
    }

    .form label {
        position: relative;
    }

    .form label .input {
        width: 100%;
        padding: 10px 10px 20px 10px;
        outline: 0;
        border: 1px solid rgba(105, 105, 105, 0.397);
        border-radius: 10px;
    }

    .form label .input:valid+span {
        color: green;
    }

    .submit {
        border: none;
        outline: none;
        background-color: royalblue;
        padding: 10px;
        border-radius: 10px;
        color: #fff;
        font-size: 16px;
        transform: .3s ease;
    }

    .submit:hover {
        background-color: rgb(56, 90, 194);
    }

    @keyframes pulse {
        from {
            transform: scale(0.9);
            opacity: 1;
        }

        to {
            transform: scale(1.8);
            opacity: 0;
        }
    }
</style>
<form class="form" method="post" enctype="multipart/form-data">
    <p class="title">Sửa sản phẩm </p>
    <input type="hidden" name='id' value='<?= $_GET['id'] ?>'>
    <label>
        <span>Tên sản phẩm</span>
        <input required="" type="text" class="input" name="name" value="<?= $suadm['name'] ?>" style="margin: 10px 0;">

    </label>





    <button class=" submit" type="submit">Thêm</button>
</form>