<style>
  .header-v3 .wrap-menu-desktop {
    background-color: black;
  }

  .form {
    padding: 0;
  }
</style>

<?php require_once "model/validate.php"; ?>
<div class="container m-b-30 con m-t-140">
  <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
    <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
      Trang chủ
      <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <span class="stext-109 cl4">
      Thanh toán
    </span>
  </div>
</div>


<!-- Shoping Cart -->
<div class="thongtin m-b-60" id="myForm">
  <div id="t">

    <form action="" class="form ">
      <div class="no">
        <div class="p">* Bắt buộc nhập</div>
      </div>

      <h3 style="margin-bottom: 8px">Thông tin thanh toán</h3>
      <label for="name">Họ và tên * </label>
      <input type="text" id="product-name" name="name" placeholder="Họ và tên" class="input">
      </input />
      <p id="ten-loi"></p>
      <label for="name">Tên công ty </label>
      <input type="text" id="product-tency" name="tency" placeholder="Tên công ty" class="input" />

      <label for="dc">Địa chỉ *</label>
      <input type="text" placeholder="Địa chỉ" id="product-dc" name="dc" class="input" />
      <p id="dc-loi"></p>
      <label for="name">Tỉnh thành phố *</label>
      <input type="text" id="product-tp" name="tp" placeholder="Tỉnh thành phố" class="input" />
      <p id="tp-loi"></p>
      <label for="name">Số điện thoại *</label>
      <input type="text" id="product-sdt" name="sdt" placeholder="Số điện thoại " class="input" />
      <p id="sdt-loi"></p>
      <h3>Thông tin bổ sung</h3>
      <label for="">Ghi chú bổ sung</label>
      <textarea name="" id="textt" cols="2" rows="5" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."
                                                                                                                              class="input"></textarea>

    </form>

    <div class="donhang">
      <h3>ĐƠN HÀNG CỦA BẠN</h3>
      <table>
        <thead>
          <tr class="">
            <th class="product-sp product">Sản phẩm</th>
            <th class="product-total product">Tổng</th>
          </tr>
        </thead>
        <tbody class="cart1">
          <tr class="cart bor12 m-b-10">
            <td id="tt-name">
              Cà chua <strong class="tt-quantity">x1</strong>
            </td>
            <td>90.000&</td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="tvc m-b-10">
            <th class="left">Tiền vận chuyển</th>
            <td class="right">30.000₫</td>
          </tr>
          <tr class="tvc m-b-10" style="border-bottom: 2px solid #ccc">
            <th>Tổng thanh toán</th>
            <td id="product-totals">30.000₫</td>
          </tr>
        </tfoot>
      </table>
      <div class="pttt">
        <div class="d-flex gap m-t--5">
          <input type="radio" name="tt" id="ck" class="ck" checked />
          <label for="" id="ttck" class="p-t-20">Thanh toán chuyển khoản</label>
        </div>
        <div class="d-flex gap m-t--10">
          <input type="radio" name="tt" id="tm" class="ck" />
          <label for="" class="p-t-20"> Trả tiền mặt khi nhận hàng</label>
        </div>

      </div>
      <form action="" method="post">
        <button class="dathang m-t--19" type="submit">
          Đặt hàng
        </button>
      </form>

      <p style="font-size: 15px; max-width: 660px">
        Your personal data will be used to process your order, support your
        experience throughout this website, and for other purposes described
        in our <span class="span">chính sách riêng tư.</span>
      </p>
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    $('#myForm').submit(function (event) {
      event.preventDefault();

      $.ajax({
        url: 'model/validate.php',
        type: 'POST',
        data: {
          name: $('#product-name').val(),
          dc: $('#product-dc').val(),
          tp: $('#product-tp').val(),
          sdt: $('#product-sdt').val(),
        },
        success: function (response) {
          var data = JSON.parse(response);
          console.log(data)

          // Clear previous error messages
          $('#ten-loi').text('');
          $('#dc-loi').text('');
          $('#tp-loi').text('');
          $('#sdt-loi').text('');
          $('#product-name').css('border', '1px solid #ddd');
          $('#product-dc').css('border', '1px solid #ddd');
          $('#product-tp').css('border', '1px solid #ddd');
          $('#product-sdt').css('border', '1px solid #ddd');

          // Check and display error messages
          if (data.errors.name) {
            $('#ten-loi').text(data.errors.name);
            $('#product-name').css('border', '1px solid red');

          }

          if (data.errors.dc) {
            $('#dc-loi').text(data.errors.dc);
            $('#product-dc').css('border', '1px solid red');

          }

          if (data.errors.tp) {
            $('#tp-loi').text(data.errors.tp);
            $('#product-tp').css('border', '1px solid red');

          }

          if (data.errors.sdt) {
            $('#sdt-loi').text(data.errors.sdt);
            $('#product-sdt').css('border', '1px solid #ddd');

          }

          // Add red border to the input field with id "product-tency" if there is an error

        }
      });
    });
  });
</script>