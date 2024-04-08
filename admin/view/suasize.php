<form class="form" method="post" enctype="multipart/form-data">
    <div class="flex justify-between ">
        <p class="title">Update size </p>
        <a href="?act=danhmuc" class="mt-4 ">
            <p class="btn">List size </p>
        </a>
    </div>

    <input type="hidden" name='id' value='<?= $_GET['id'] ?>'>
    <label>
        <span>Tên sản phẩm</span>
        <input required="" type="text" class="input" name="size" value="<?= $idsize['size'] ?>" style="margin: 10px 0;">

    </label>

    <button class=" submit" type="submit">Update</button>
</form>