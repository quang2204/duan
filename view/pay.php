<style>
  .header-v3 .wrap-menu-desktop {
    background-color: black;
  }
  .con {
		margin-top: 100px;
	}

	@media (max-width: 983px) {
		.con {
			margin-top: 0px;
		}
	}
</style>


<!-- bánh mì -->
<div class="container  m-b-30 con">
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
<div class="thongtin" id="thongtin">
  <div id="t">
    <form action="" class="form">
      <div class="no">
        <div class="p">* Bắt buộc nhập</div>
        <p id="ten-loi"></p>
        <p id="dc-loi"></p>
        <p id="tp-loi"></p>
        <p id="sdt-loi"></p>
        <p class="error" id="errorMessage" style="font-size: 18px"></p>
      </div>

      <h3 style="margin-bottom: 8px">Thông tin thanh toán</h3>
      <label for="name">Họ và tên * </label>
      <input type="text" id="product-name" placeholder="Họ và tên" onblur="hoteen()" class="input" />
      <label for="name">Tên công ty </label>

      <input type="text" id="product-tency" placeholder="Tên công ty" class="input" />
      <label for="dc">Địa chỉ *</label>
      <input type="text" placeholder="Địa chỉ" id="product-dc" onblur="diachi()" class="input" />
      <label for="name">Tỉnh thành phố *</label>
      <input type="text" id="product-tp" placeholder="Tỉnh thành phố" onblur="thanhpho()" class="input" />
      <label for="name">Số điện thoại *</label>
      <input type="text" id="product-sdt" placeholder="Số điện thoại " onblur="dienthoai()" class="input" />
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
          <tr class="cart">
            <td id="tt-name">
              Cà chua <strong class="tt-quantity">x1</strong>
            </td>
            <td>90.000&</td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="tvc">
            <th class="left">Tiền vận chuyển</th>
            <td class="right">30.000₫</td>
          </tr>
          <tr class="tvc" style="border-bottom: 2px solid #ccc">
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
      <button class="dathang m-t--19">
        Đặt hàng
      </button>
      <p style="font-size: 15px; max-width: 660px">
        Your personal data will be used to process your order, support your
        experience throughout this website, and for other purposes described
        in our <span class="span">chính sách riêng tư.</span>
      </p>
    </div>
  </div>
</div>
<div class="chitiet">
  <div class="chitiett">
    <h2>Đơn hàng của bạn</h2>
    <table>
      <thead>
        <tr class="">
          <th class="left chitiet-p">Sản phẩm</th>
          <th class="right">Tổng</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="left chitiet-p">
            <p>Cà chua Đà Lạt <strong>x1</strong></p>
          </td>
          <td class="right">
            <span>20.000d</span>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th class="left chitiet-p">Tiền vận chuyển</th>
          <td class="right">340.000₫</td>
        </tr>
        <tr>
          <th class="left chitiet-p">Phương thức thanh toán:</th>
          <td class="right">Chuyển khoản ngân hàng</td>
        </tr>
        <tr>
          <th class="left chitiet-p">Tổng cộng:</th>
          <td class="right">340.000₫</td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>