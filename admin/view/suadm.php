<form class="form" method="post" enctype="multipart/form-data">
    <div class="flex justify-between ">
        <p class="title">Update Category </p>
        <a href="?act=danhmuc" class="mt-4 ">
            <p class="btn">List Category </p>
        </a>
    </div>

    <input type="hidden" name='id' value='<?= $_GET['id'] ?>'>
    <label>
        <span>Tên sản phẩm</span>
        <input required="" type="text" class="input" name="name" value="<?= $suadm['name'] ?>" style="margin: 10px 0;">

    </label>

    <button class=" submit" type="submit">Thêm</button>
</form>