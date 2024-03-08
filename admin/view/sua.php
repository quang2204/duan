<form class="form" method="post" enctype="multipart/form-data">
    <div class="d-flex align-items-center justify-content-between">
        <p class="title">Update product </p>
        <a href="?act=sanpham">
            <button class="btn">List product </button>
        </a>

    </div>

    <input type="hidden" name='id' value='<?= $_GET['id'] ?>'>
    <label>
        <span>Name</span>
        <input required="" type="text" class="input" name="name" value="<?= $update['sp_name'] ?>">

    </label>

    <label>
        <span>Price</span>
        <input required="" placeholder="" type="number" class="input" min="0" name="price"
                                                                                                                                value="<?= $update['sp_price'] ?>">

    </label>

    <label>
        <p>IMG</p>
        <input type="hidden" value="<?= $update['sp_img'] ?>">
        <input type="file" class="input" name="img">

        <img src="<?= $update['sp_img'] ?>" alt="" style="max-width: 360px;margin-top: 20px;">
    </label>


    <label>
        <span>Description</span>
        <textarea class="input" name="motact"><?= $update['sp_motact'] ?></textarea>

    </label>
    <label>
    <span>Category</span>
    <select name="iddm" id="" class="input">
    <?php foreach ($ad as $value): ?>
        <option value="<?= $value['id'] ?>" <?= ($value['id'] == $update['dm_id']) ? 'selected' : '' ?>>
            <?= $value['name'] ?>
        </option>
    <?php endforeach; ?>
    </select>

    </label>
    <label>
        <span>Size</span>
        <div class="d-flex" style='gap:20px'>
            <?php foreach ($size as $key => $value): ?>
                <label>
                    <input type="checkbox" name='size[]' value='<?= $value['id'] ?>' <?= ($update['id_sizes'] == $value['id']) ? 'checked' : '' ?>>
                    <div class="checkmark"></div>
                    <p>
                        <?= $value['size'] ?>
                    </p>
                </label>
            <?php endforeach; ?>
        </div>
    </label>

    <label style="margin-top:-30px;">
        <span>Màu sắc</span>
        <div class="d-flex " style='gap:20px'>
            <?php foreach ($color as $key => $value): ?>
                <label class="check">
                    <input type="checkbox" name='color[]' value='<?= $value['id'] ?>'
                                                                                                                                            <?= ($update['id_colors'] == $value['id']) ? 'checked' : '' ?>>
                    <div class="checkmark"></div>
                    <p>
                        <?= $value['color'] ?>
                    </p>
                </label>
            <?php endforeach; ?>
        </div>
    </label>
    <button class="submit" type="submit">Update</button>
</form>