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

                        <?php endif;
                    endforeach; ?>

                </select>
                <label for="" style='color:red'>
                    <?= isset($_SESSION['error']['size']) ? $_SESSION['error']['size'] : ''
                        ?>
                </label>
            </label>

            <label style="width: 180px;">
                <span>Color</span>
                <div class="d-flex " style='gap:20px'>
                    <select name="color[]" id="" class="input" style='padding: 7px;'>
                        <?php foreach ($color as $key => $value): ?>
                            <?php if ($value['status'] == 1): ?>

                                <option value="<?= $value['id'] ?>">
                                    <?= $value['color'] ?>
                                </option>
                            <?php endif;
                        endforeach; ?>

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


    <button class="submit " type="submit">Thêm</button>
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

     
        $(".btn-delete").click(function () {
         
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
    document.addEventListener('DOMContentLoaded', function () {
        // Lắng nghe sự kiện click vào nút xóa
        var deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Tìm phần tử cha của nút xóa (tức là phần tử cha chứa tất cả các input)
                var item = this.closest('.item');
                // Xóa phần tử cha đó khỏi cây DOM
                item.remove();
            });
        });
    });
</script>