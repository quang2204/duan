<style>
	.header-v3 .wrap-menu-desktop {
		background-color: black;
	}

	.container {
		margin-top: 100px;
	}

	.p-t-85 {
		margin-top: -40px;
		padding: 0;
	}

	.p-t-75 {
		padding: 10px;
	}

	.table-shopping-cart .column-5 {
		padding-right: 0;
	}

	@media (max-width: 990px) {
		.container {
			margin-top: 0;
		}

		.p-t-85 {
			margin-top: 0px;

		}


	}

	.rs1-select2 .select2-container .select2-selection--single {
		height: 40px;
		border: 1px solid #ccc;
		border-radius: 15px;
		width: 80px;
	}


	.rs1-select2 .select2-container .select2-selection--single .select2-selection__rendered {
		padding-left: 10px;
	}

	.rs1-select2 .select2-container--default .select2-selection--single .select2-selection__arrow {
		right: 0px;
		border: 0;
	}
</style>

<!-- bánh mì -->
<div class="container">
	<?php print_r($_SESSION['cart']) ?>
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Giỏ hàng
		</span>
	</div>
</div>

<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85 m-t--60 " method="post">
	<div class="container">

		<?php
		$numOrder = $_SESSION['cart']['info']['num_order'];

		if ($numOrder >= 1): ?>
			<div class="row block">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">

									<th class="column-1 " style='padding-left: 30px;'>Sản phẩm</th>
									<th class="column-2"></th>
									<th class="column-3">Giá</th>
									<th class="column-4">Số lượng</th>
									<th class="column-5">Tổng cộng</th>
								</tr>

								<?php $cart = $_SESSION['cart']['buy'];
								foreach ($cart as $key => $value): ?>
									<tr class="table_row">

										<td class="column-1">
											<div class=" d-flex align-items-center " style='gap:15px'>
												<div class='cursor m-l--30 '>

													<p class=" bor0 bor10 d-flex justify-content-center align-items-center p-b-3 hov-btn3 delete js-addwish " data-id='<?= $value['id'] ?>'
																																											style='width: 25px;height: 25px;'>
														x</p>


												</div>
												<div>
													<img src="admin/<?= $value['img'] ?>" alt="IMG" class="w-100">
												</div>
											</div>

										</td>

										<td class="column-2 p-l-10">
											<a href="?act=product-detail&id=<?= $value['id'] ?>&iddm=<?= $value['iddm'] ?>"
																																									style='color: black;'>
												<p class="m-b-4">
													<?= $value['name'] ?>
												</p>
											</a>

											<p class="m-b-4">Size :
												<?= $value['size'] ?> - Color :
												<?= $value['color'] ?>
											</p>
										</td>
										<td class="column-3 text-center subtotal-for-product-<?= $value['id'] ?>">
											<?= number_format($value['price'], 0, 0, ) ?> đ
										</td>
										<td class="column-4">
											<div class="wrap-num-product flex-w m-l-auto m-r-0">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m sl" name="<?= $value['id'] ?>"
																																										data-id="<?= $value['id'] ?>">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>

												<input class="mtext-104 cl3 txt-center num-product sll" type="number" name="<?= $value['id'] ?>" value="<?= $value['sl'] ?>"
																																										data-id="<?= $value['id'] ?>">

												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m sl" data-id="<?= $value['id'] ?>"
																																										name="<?= $value['id'] ?>">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										</td>

										<td class="column-5 text-center tong-<?= $value['id'] ?>">

											<?= number_format(isset($value['total']) ? $value['total'] : $value['tong'], 0, 0, ) ?>
											đ
										</td>
									</tr>
								<?php endforeach; ?>



							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">

								<a href="?">
									<div
																																							class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
										<i class="fa fa-arrow-left p-r-10"></i>
										Quay lại trang chủ
									</div>
								</a>

							</div>
							<a href="#">
								<div
																																						class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">

									Cập nhật
								</div>
							</a>

						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Tổng số
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Vận chuyển
								</span>
							</div>

							<div class="size-209 text-right">
								<span class="mtext-110 cl2 ">
									30.000đ
								</span>
							</div>
						</div>



						<div class="flex-w flex-t p-t-27 pb-3 bor12">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Tổng cộng:
								</span>
							</div>

							<div class="size-209 p-t-1 text-right">
								<span class="mtext-110 cl2 xoa">
									<?php
									$info = isset($_SESSION['cart']['infos']['total']) ? $_SESSION['cart']['infos']['total'] : $_SESSION['cart']['info']['total'];
									?>
									<?= number_format($info, 0, 0, ) ?> đ
								</span>
							</div>
						</div>
						<a href="?act=pay"
																																				class="flex-c-m stext-101 cl0 size-107 bg3 bor1 hov-btn3 p-lr-15 trans-04 m-b-10 m-t-20">
							Tiến hành thanh toán
						</a>

						<div class="flex-w flex-t p-b-20 sale mt-3">
							<button class="flex-c-m stext-101 mb-3 size-111  bor14 hov-btn3 p-lr-15 trans-04 pointer ">Mã
								Giảm Giá</button>
							<input type="text" placeholder="Mã giảm giá"
																																					class="flex-c-m stext-101 mt-1 size-126 p-lr-15 trans-04 ">
						</div>
						<button class="flex-c-m stext-101 cl2 size-116 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer ">
							Áp dụng
						</button>

					</div>
				</div>
			</div>
			<div class="text-center m-t-140 m-b-100  none" style='display: none;'>
				<h3>Chưa có sản phẩm nào trong giỏ hàng </h3>
				<br>
				<a href="?act=product" id="productLink">
					<button class="btn w-25 d-flex ml-auto mr-auto hov-btn2">Quay lại cửa hàng</button>
				</a>

			</div>
		<?php else: ?>
			<div class="text-center m-t-140 m-b-100 ">
				<h3>Chưa có sản phẩm nào trong giỏ hàng </h3>
				<br>
				<a href="?act=product" id="productLink">
					<button class="btn w-25 d-flex ml-auto mr-auto hov-btn2">Quay lại cửa hàng</button>
				</a>

			</div>

		<?php endif ?>

	</div>
</form>
<script>
	$(document).ready(function () {
		$('.sl, .sll').on('click blur', function (event) {
			event.preventDefault();

			var productId = $(this).data('id');
			var quantity = $('input[name="' + productId + '"]').val();

			var text = $(this).closest('.column-5');

			$.ajax({
				url: '?act=update&id=' + productId + '&qty=' + quantity,
				type: 'GET',
				data: {
					productId: productId,
					quantity: quantity
				},
				success: function (datas) {
					const cartData = JSON.parse(datas);

					Total(cartData.sub_total);
					updateTotal(cartData.total);
					updateCartCount(cartData.num_order);
					// console.log(cartData);
					// console.log(datas);
				},
				error: function (xhr, status, error) {
					console.log('Error: ' + error);
				}
			});

			function Total(newTotal) {
				var formattedTotal = newTotal.toLocaleString('vi-VN');
				$('.tong-' + productId).text(' ' + formattedTotal + ' đ');
			}

			function updateTotal(newTotal) {
				var formattedTotal = newTotal.toLocaleString('vi-VN');
				$('.xoa').text(formattedTotal + ' đ');
			}

			function updateCartCount(count) {
				$('.js-show-cart').attr('data-notify', count);
			}
		});
	});
</script>
<script>
	$(document).ready(function () {
		$('#productLink').click(function (event) {
			event.preventDefault();
			window.location.href = $(this).attr('href');
		});
	});
</script>