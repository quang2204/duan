<form class="form" method="post">
    <div class="flex justify-between ">
        <p class="title">Update color </p>
        <a href="?act=color" class="mt-4 ">
            <p class="btn">List color </p>
        </a>
    </div>

    <input type="hidden" name='id' value='<?= $_GET['id'] ?>'>
    <label>
        <span>Tên sản phẩm</span>
        <input required="" type="text" class="input" name="color" value="<?= $color['color'] ?>" style="margin: 10px 0;">

    </label>

    <button class=" submit" type="submit">Update</button>
</form>