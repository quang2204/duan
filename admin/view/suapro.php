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
        <input required="" type="text" class="input" name="name" value="<?= $pro['name'] ?>">

    </label>
    <label>
        <span>Name</span>
        <input required="" type="text" class="input" name="email" value="<?= $pro['email'] ?>">

    </label>
    <label>
        <span>Mobile</span>
        <input placeholder="" type="text" class="input" min="0" name="tel" value="<?= $pro['tel'] ?>">

    </label>

    <label>
        <p>IMG</p>
        <input type="hidden" value="<?= $pro['img'] ?>">
        <input type="file" class="input" name="img">

        <img src="<?= $pro['img'] ?>" alt="" style="max-width: 360px;margin-top: 20px;">
    </label>


    <label>
        <span>Address</span>
        <input class="input" name="address">
        <?= $pro['address'] ?></input>

    </label>

    <button class="submit" type="submit">Add</button>
</form>