<form class="form" method="post" enctype="multipart/form-data">
    <div class="flex justify-between ">
        <p class="title">Attribute</p>
        <a href="?act=sanpham" class="mt-4 ">
            <p class="btn">List Attribute </p>
        </a>
    </div>
    <input type="hidden" value='<?= $variants['variant_id'] ?>' name='id'>
    <input type="hidden" value='<?= $variants['id_product'] ?>' name='idproduct'>



    <label>
        <p>Ảnh</p>
        <input placeholder="" type="file" class="input" name="img">
        <input type="hidden" value="<?= $variants['img'] ?>">
        <img src="<?= $variants['img'] ?>" alt="" style="max-width: 360px;margin: 20px auto;">
        <!--  <input type="file" id="fileInput" accept=".jpg,.jpeg,.png" onchange="displayFileName(this)" name='img'
                                                                                                                                class='d-none'>



        <button type="button" id="customButton" onclick="chooseFile()" name='img'>Thêm ảnh</button>
        <p style="margin: auto;padding-top: 5px;">Định dạng:.jpg,.jpeg,.png</p>
        <br>
        <p id="fileName" style="margin: auto;"></p> -->
    </label>

    <label>
        <span>Size</span>
        <select name="size" id="" class="input">
            <?php foreach ($size as $value): ?>
                <?php if ($value['status'] == 1): ?>

                    <option value="<?= $value['id'] ?>" <?= ($value['id'] == $variants['size_id']) ? 'selected' : '' ?>>
                        <?= $value['size'] ?>
                    </option>
                <?php endif ?>

            <?php endforeach; ?>
        </select>
        <label for="" style='color:red'>
            <?= isset($_SESSION['error']['size']) ? $_SESSION['error']['size'] : ''
                ?>
        </label>
    </label>

    <label style="margin-top:-30px;">
        <span>Màu sắc</span>
        <select name="color" id="" class="input">
            <?php foreach ($color as $value): ?>
                <?php if ($value['status'] == 1): ?>

                    <option value="<?= $value['id'] ?>" <?= ($value['id'] == $variants['color_id']) ? 'selected' : '' ?>>
                        <?= $value['color'] ?>
                    </option>
                <?php endif ?>

            <?php endforeach; ?>
        </select>
        <label for="" style='color:red'>
            <?= isset($_SESSION['error']['color']) ? $_SESSION['error']['color'] : ''
                ?>
        </label>
    </label>


    <button class="submit " type="submit">Update</button>
</form>