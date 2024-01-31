<style>
    tr {
        border-bottom: 0px solid #ccc;
        gap: 25px;
        margin-bottom: 30px;

    }

    .hs input {
        margin-top: -4px;
    }
</style>
<div class="container m-t-100 ">
    <form class='m-b-50 d-flex justify-content-around align-items-center bor4 p-b-30 p-t-30 ' method="post" enctype="multipart/form-data"
                                                                                                                            style='box-shadow: 1px 0px 10px 1px #bab5b5     '>
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
                            <input type="text" name='name' value="<?= $pro['name'] ?>">
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
                <button type='submit'>Lưu</button>


            </div>


        </div>
        <div>
            <input type="hidden" value="<?= $pro['img'] ?>">
            <button type="button" id="customButton" onclick="chooseFile()" name='img'>Thêm ảnh</button>
            <input type="file" id="fileInput" accept="image/*" onchange="displayFileName(this)" name='img'>
            <p id="fileName"></p>

            <img src="admin/<?= $pro['img'] ?>" alt="" style="max-width: 360px;margin-top: 20px;">


        </div>
    </form>


</div>