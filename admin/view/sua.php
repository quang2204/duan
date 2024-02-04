<style>


</style>
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
        <input required="" type="text" class="input" name="name" value="<?= $update['name'] ?>">

    </label>

    <label>
        <span>Price</span>
        <input required="" placeholder="" type="number" class="input" min="0" name="price"
                                                                                                                                value="<?= $update['price'] ?>">

    </label>

    <label>
        <p>IMG</p>
        <input type="hidden" value="<?= $update['img'] ?>">
        <input type="file" class="input" name="img">

        <img src="<?= $update['img'] ?>" alt="" style="max-width: 360px;margin-top: 20px;">
    </label>


    <label>
        <span>Description</span>
        <textarea class="input" name="motact"><?= $update['motact'] ?></textarea>

    </label>
    <label>
        <span>Category</span>
        <select name="iddm" id="" class="input">
            <?php foreach ($ad as $key => $value): ?>
                <option value="<?= $value['id'] ?>">
                    <?= $value['name'] ?>
                </option>
            <?php endforeach; ?>

        </select>
    </label>
    <button class="submit" type="submit">Add</button>
</form>