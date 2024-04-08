<?php
if (empty($_SESSION['users'])) {
    header('Location: index.php');

}
?>
<style>
    #customButton {
        padding: 6px 12px;
        border: 1px solid #bab5b5;
        /* max-width: 190px; */
        margin: auto;
        border-radius: 5px;
        transition: 0.5s ease-in-out;
    }

    #customButton:hover {
        background-color: #2d79f3;
        color: white;
    }

    .form {
        max-width: 700px;
    }
</style>

<form class="form" method="post" enctype="multipart/form-data">
    <div class="flex justify-between ">
        <p class="title">Thêm sản phẩm </p>
        <a href="?act=sanpham" class="mt-4 ">
            <p class="btn">List product </p>
        </a>
    </div>

    <label>
        <span>Tên sản phẩm</span>
        <input required="" placeholder="" type="text" class="input" name="name">

    </label>

    <label>
        <span>Giá</span>
        <input required="" placeholder="" type="number" class="input" min="0" name="price">

    </label>
    <label>
        <span>Số lượng</span>
        <input required="" placeholder="" type="number" class="input" min="0" name="quantity">

    </label>
    <!-- 
    <div class="radio-inputs">
        <label class="radio">
            <input type="radio" name="status" checked="" value='1'>
            <span class="name">Hiện thị </span>
        </label>
        <label class="radio">
            <input type="radio" name="status" value='0'>
            <span class="name">Ẩn đi</span>
        </label>

    </div> -->
    <label>
        <p>Ảnh</p>
        <input required="" placeholder="" type="file" class="input" name="img">
        <input type="hidden" value="<?= $pro['img'] ?>">

        <!-- <input type="file" id="fileInput" accept=".jpg,.jpeg,.png" onchange="displayFileName(this)" name='img'
                                                                                                                                class='d-none'>



        <button type="button" id="customButton" onclick="chooseFile()" name='img'>Thêm ảnh</button>
        <p style="margin: auto;padding-top: 5px;">Định dạng:.jpg,.jpeg,.png</p>
        <br>
        <p id="fileName" style="margin: auto;"></p> -->
    </label>
    <label>
        <p>Abum</p>
        <div class="appends ">
            <input type="file" name="anh[]" class="file-input mb-2" />
            <br>

        </div>
        <button type="button" name="addimg" class="mt-2 mb-2 btn m-auto" style="width: 30%;">Add</button>

    </label>

    <label>
        <span>Mô tả</span>
        <textarea class="input" name="motact">
        </textarea>

    </label>
    <span>Product attribute</span>
    <div class="append">
        <div class="d-flex align-items-center item" style='gap: 20px;'>
            <label style='width: 180px; '>
                <span>Size</span>
                <select name="size[]" id="" class="input" style='padding: 7px;'>
                    <?php foreach ($size as $key => $value): ?>

                        <?php if ($value['status'] == 1): ?>
                            <option value="<?= $value['id'] ?>">
                                <?= $value['size'] ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </select>
                <label for="" style='color:red'>
                    <?= isset($_SESSION['error']['size']) ? $_SESSION['error']['size'] : ''
                        ?>
                </label>
            </label>

            <label style="width: 180px;">
                <span>Màu sắc</span>
                <div class="d-flex " style='gap:20px'>
                    <select name="color[]" id="" class="input" style='padding: 7px;'>
                        <?php foreach ($color as $key => $value): ?>
                            <?php if ($value['status'] == 1): ?>

                                <option value="<?= $value['id'] ?>">
                                    <?= $value['color'] ?>
                                </option>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    </select>

                </div>
                <label for="" style='color:red'>
                    <?= isset($_SESSION['error']['color']) ? $_SESSION['error']['color'] : ''
                        ?>
                </label>
            </label>

            <label for="" style="margin-top: -24px; width: 300px;">
                <span>IMG</span>
                <input type="file" name="imgs[]" class="file-input mb-2" multiple />

            </label>
            <button class="btn-delete">Xóa</button>
        </div>
    </div>
    <button type="button" name="add" class="mt-2 mb-2 btn m-auto" style="width: 30%;">Add</button>
    <label>
        <span>Loại</span>
        <select name="iddm" id="" class="input">
            <?php foreach ($ad as $key => $value): ?>
                <?php if ($value['status'] == 1): ?>

                    <option value="<?= $value['id'] ?>">
                        <?= $value['name'] ?>
                    </option>
                <?php endif;
            endforeach; ?>

        </select>
    </label>

    <button class="submit " type="submit">Add</button>
</form>
<script>
    // Lắng nghe sự kiện click vào nút "Thêm"
    $("button[name=add]").click(function () {
        // Thêm phần tử mới
        $(".append").append(` <div class="d-flex align-items-center item" style='gap: 20px;'>
            <label style='width: 180px; '>
                <span>Size</span>
                <select name="size[]" id="" class="input" style='padding: 7px;'>
                    <?php foreach ($size as $key => $value): ?>
                                <option value="<?= $value['id'] ?>">
                                    <?= $value['size'] ?>
                                </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label style="width: 180px;">
                <span>Màu sắc</span>
                <div class="d-flex " style='gap:20px'>
                    <select name="color[]" id="" class="input" style='padding: 7px;'>
                        <?php foreach ($color as $key => $value): ?>
                                    <option value="<?= $value['id'] ?>">
                                        <?= $value['color'] ?>
                                    </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </label>

            <label for="" style=" width: 300px;">
                <span>IMG</span>
                <input type="file" name="imgs[]" class="file-input mb-2" />
            </label>
            <button class="btn-delete">Xóa</button>
        </div>`);

        // Gắn sự kiện click vào nút "Xóa" mới được thêm vào
        $(".btn-delete").click(function () {
            // Tìm phần tử cha của nút "Xóa" và loại bỏ phần tử đó khỏi DOM
            $(this).closest('.item').remove();
        });
    });
</script>

<script>
    function chooseFile() {
        document.getElementById('fileInput').click();
    }

    function displayFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById('fileName').innerText = fileName;
        document.getElementById('fileName').style.display = 'block';
    }
</script>
<script>
    $("button[name=addimg]").click(function () {
        let file = parseInt($('input[type=hidden]').val());
        file += 1;

        // Thêm file
        $(".appends").append(` 
           
                <input type="file" name="anh[]" class="file-input mb-2" />
                <br>
     `);

        // Cập nhật giá trị     
        $("input[name=total]").val(file);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lắng nghe sự kiện click vào nút xóa
        var deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {

                var item = this.closest('.item');

                item.remove();
            });
        });
    });
</script>