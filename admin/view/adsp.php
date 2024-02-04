<?php
if (empty($_SESSION['users'])) {
    header('Location: index.php');

}
?>

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
        <p>Ảnh</p>
        <input required="" placeholder="" type="file" class="input" name="img">
    </label>


    <label>
        <span>Mô tả</span>
        <textarea class="input" name="motact">
        </textarea>

    </label>
    <label>
        <span>Loại</span>
        <select name="iddm" id="" class="input">
            <?php foreach ($ad as $key => $value): ?>
                <option value="<?= $value['id'] ?>">
                    <?= $value['name'] ?>
                </option>
            <?php endforeach; ?>

        </select>
    </label>
    <button class="submit" type="submit">Thêm</button>
</form>