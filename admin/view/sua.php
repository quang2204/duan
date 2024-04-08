<form class="form" method="post" enctype="multipart/form-data" style="max-width: 530px">
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
        <span>Quantity</span>
        <input required="" placeholder="" type="number" class="input" min="0" name="quantity"
                                                                                                                                value="<?= $update['sp_quantity'] ?>">

    </label>
    <label>
        <p>IMG</p>
        <input type="hidden" value="<?= $update['sp_img'] ?>">
        <input type="file" class="input file-input" name="img">

        <img src="<?= $update['sp_img'] ?>" alt="" style="max-width: 360px;margin: 20px auto;">

    </label>

    <p>Abum</p>
    <div class="append">
        <input type="file" name="anh[]" class="file-input mb-2" />
    </div>
    <button type="button" name="add" class="mt-2 mb-2 btn m-auto" style="width: 30%;">Add</button>
    <label>
        <div class=" flex justify-content-center flex-wrap" style="gap:10px">
            <?php foreach ($img as $key => $value): ?>
                <div class='xoa'>
                    <div class="header-cart-item-img js-addwish delete" data-id='<?= $value['id'] ?>'>

                        <img src="<?= $value['img'] ?>" alt="IMG" style='max-width: 100px;'>

                    </div>
                    <br>
                    <input type="file" class="input file-input" name="imgs[<?= $value['id'] ?>]" accept=".jpg,.jpeg,.png"
                                                                                                                                            style="width: 115px; padding: 3px;">

                </div>
            <?php endforeach; ?>
        </div>
    </label>
    <!-- <div class="radio-inputs">
        <label class="radio">
            <input type="radio" name="status" <?= $update['sp_status'] ? 'checked' : '' ?> value='1'>
            <span class="name">Hiện thị </span>
        </label>
        <label class="radio">
            <input type="radio" name="status" <?= $update['sp_status'] ? '' : 'checked' ?> value='0'>
            <span class="name">Ẩn đi</span>
        </label>

    </div> -->
    <label>
        <span>Description</span>
        <textarea class="input" name="motact"><?= $update['sp_motact'] ?></textarea>

    </label>
    <label>
        <span>Category</span>
        <select name="iddm" id="" class="input">
            <?php foreach ($ad as $value): ?>
                <?php if ($value['status'] == 1): ?>
                    <option value="<?= $value['id'] ?>" <?= ($value['id'] == $update['dm_id']) ? 'selected' : '' ?>>
                        <?= $value['name'] ?>
                    </option>
                <?php endif ?>
            <?php endforeach; ?>
        </select>

    </label>
    <!-- <label>
        <span>Size</span>
        <div class="d-flex " style='gap:20px'>
            <?php foreach ($size as $key => $value): ?>
                <label class="check">
                    <input type="checkbox" name='size[]' value='<?= $value['id'] ?>' 
                    <?php foreach ($variants as $key => $values):

                        if ($value['id'] == $values['id_sizes']):
                            echo 'checked';
                        endif;
                    endforeach; ?>
                    >
                    <div class="checkmark"></div>
                    <p>
                        <?= $value['size'] ?>
                    </p>
                </label>
                
            <?php endforeach; ?>
         
        </div>
           <label for="" style='color:red'>
            <?= isset($_SESSION['error']['size']) ? $_SESSION['error']['size'] : ''
                ?>
        </label>
    </label>
                           
    <label style="margin-top:-30px;">
        <span>Màu sắc</span>
        <div class="d-flex " style='gap:20px'>
            <?php foreach ($color as $key => $value): ?>
                <label class="check">
                    <input type="checkbox" name='color[]' value='<?= $value['id'] ?>' 
                    <?php foreach ($variants as $key => $values):

                        if ($value['id'] == $values['id_colors']):
                            echo 'checked';
                        endif;
                    endforeach; ?>
                    >
                    <div class="checkmark"></div>
                    <p>
                        <?= $value['color'] ?>
                    </p>
                </label>
                
            <?php endforeach; ?>
              
        </div>
              <label for="" style='color:red'>
            <?= isset($_SESSION['error']['color']) ? $_SESSION['error']['color'] : '' ?>
        </label>
    </label> -->
    <button class="submit" type="submit">Update</button>
</form>
<script>
    $(document).ready(function () {
        $(document).on('click', '.delete', function (event) {
            event.preventDefault();

            var productId = $(this).data('id');
            var rowElement = $(this).closest('.xoa');
            var confirmation = confirm('Bạn có muốn xóa ảnh này k?');
            if (confirmation) {

                $.ajax({
                    url: '?act=xoaimg&id=' + productId,
                    type: 'GET',
                    success: function (data) {

                        rowElement.remove();
                    },
                    error: function (xhr, status, error) {
                        // Handle errors
                        alert('Error deleting item. Please try again.');
                    }
                });
            }

        });
    });
</script>
<script>
    $("button[name=add]").click(function () {
        let file = parseInt($('input[type=hidden]').val());
        file += 1;

        // Thêm file
        $(".append").append(`<input type="file" name="anh[]" class="file-input mb-2"/>`);

        // Cập nhật giá trị     
        $("input[name=total]").val(file);
    });
</script>