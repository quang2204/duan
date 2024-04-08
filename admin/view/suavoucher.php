<form class="form" method="post" enctype="multipart/form-data">
    <div class="flex justify-between ">
        <p class="title">Update Voucher </p>
        <a href="?act=voucher" class="mt-4 ">
            <p class="btn">List Voucher </p>
        </a>
    </div>

    <input type="hidden" name='id' value='<?= $_GET['id'] ?>'>
    <label>
        <span>Name</span>
        <input required="" type="text" class="input" name="name" value="<?= $updateid['name'] ?>"
                                                                                                                                style="margin: 10px 0;">

    </label>
    <label>
        <span>Discount</span>
        <input required="" type="text" class="input" name="discount" value="<?= $updateid['discount'] ?>"
                                                                                                                                style="margin: 10px 0;">

    </label>

    <button class=" submit" type="submit">Update</button>
</form>