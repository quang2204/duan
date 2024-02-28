<?php
if (empty($_SESSION['users'])) {
    header('Location: index.php');

}
?>
<style>
    /* Hide the default checkbox */
    .check input {
        display: none;
    }

    .check {
        display: block;
        position: relative;
        cursor: pointer;
        font-size: 20px;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: relative;
        top: 0;
        left: 0;
        height: 1em;
        width: 1em;
        background-color: #2196F300;
        border-radius: 0.25em;
        transition: all 0.25s;
    }

    /* When the checkbox is checked, add a blue background */
    .check input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        transform: rotate(0deg);
        border: 0.1em solid black;
        left: 0;
        top: 0;
        width: 1em;
        height: 1em;
        border-radius: 0.25em;
        transition: all 0.25s, border-width 0.1s;
    }

    /* Show the checkmark when checked */
    .check input:checked~.checkmark:after {
        left: 0.4em;
        top: 0.2em;
        width: 0.25em;
        height: 0.5em;
        border-color: #fff0 white white #fff0;
        border-width: 0 0.15em 0.15em 0;
        border-radius: 0em;
        transform: rotate(45deg);
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
        <p>Ảnh</p>
        <input required="" placeholder="" type="file" class="input" name="img">
    </label>


    <label>
        <span>Mô tả</span>
        <textarea class="input" name="motact">
        </textarea>

    </label>
    <label>
        <span>Màu sắc</span>
        <div class="d-flex">
            <label class="check">
                <input type="checkbox">
                <div class="checkmark"></div>
                <p>Trắng</p>
            </label>
            <label class="check">
                <input type="checkbox">
                <div class="checkmark"></div>
                <p>Đen</p>
            </label>
        </div>

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