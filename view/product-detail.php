<style>
	.header-v3 .wrap-menu-desktop {
		background-color: black;
	}

	.top {
		margin-top: 100px;
	}
</style>

<div class="container top">

	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="?" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="?act=product&id=<?= $productDetail['dm_id'] ?>" class="stext-109 cl8 hov-cl1 trans-04">
			<?= $productDetail['dm_name'] ?>
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			<?= $productDetail['sp_name'] ?>
		</span>
	</div>
</div>
<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-7 p-b-30">
				<div class="p-l-25 p-r-30 p-lr-0-lg">
					<div class="wrap-slick3 flex-sb flex-w">
						<div class="wrap-slick3-dots"></div>
						<div class="wrap-slick3-arrows flex-sb-m flex-w tt"></div>

						<div class="slick3 gallery-lb">
							<div class="item-slick3" data-thumb="admin/<?= $productDetail['sp_img'] ?>">
								<div class="wrap-pic-w pos-relative imgs">
									<img src="admin/<?= $productDetail['sp_img'] ?>" alt="IMG-PRODUCT">

									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
																																							href="admin/<?= $productDetail['sp_img'] ?>">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div>
							<?php foreach ($img as $key => $value): ?>
								<div class="item-slick3" data-thumb="admin/<?= $value['img'] ?>">
									<div class="wrap-pic-w pos-relative">

										<img src="admin/<?= $value['img'] ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
																																								href="admin/<?= $value['img'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-5 p-b-30">
				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						<?= $productDetail['sp_name'] ?>
					</h4>
					<span class="mtext-106 cl2 price">

						<?= number_format($productDetail['sp_price'], 0, ',', '.') ?> đ

					</span>
					<div class="p-t-33">
						<div class="flex-w flex-r-m p-b-10">
							<div class="size-203 flex-c-m respon6">
								Size
							</div>

							<div class="size-204 respon6-next">
								<div class="rs1-select2 bor8 bg0">

									<select class="size js-select2" name="time">
										<?php foreach ($variants as $key => $value): ?>
											<?php if ($value['status'] == 1): ?>

												<option value="<?= $value['size_name'] ?>">
													<?= $value['size_name'] ?>
												</option>
											<?php endif ?>

										<?php endforeach; ?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-r-m p-b-10">
							<div class="size-203 flex-c-m respon6">
								Color
							</div>

							<div class="size-204 respon6-next">
								<div class="rs1-select2 bor8 bg0">
									<select class="color js-select2" name="time" onchange="searchProduct()">
										<?php foreach ($variants as $key => $value): ?>
											<?php if ($value['status'] == 1): ?>

												<option value="<?= $value['color_name'] ?>" id='color'
																																										data-color='<?= $value['id_colors'] ?>'>
													<?= $value['color_name'] ?>
												</option>
											<?php endif ?>

										<?php endforeach; ?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-r-m p-b-10 ">

							<div class="size-204 flex-w flex-m respon6-next align-content-between "
																																					style='    flex-direction: column;'>
								<div class="wrap-num-product flex-w m-r-20 m-tb-10">
									<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-minus"></i>
									</div>

									<input class="mtext-104 cl3 txt-center num-product" type="number" name="<?= $productDetail['sp_id'] ?>"
																																							value="1">

									<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-plus"></i>
									</div>
								</div>

								<?php if ($productDetail['sp_quantity'] > 0): ?>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 <?= !isset($_SESSION['users']) ? 'link' : '' ?>  <?= isset($_SESSION['users']) ? 'add-to-cart-btn js-addcart-detail' : '' ?> "
																																							<?= !isset($_SESSION['users']) ? 'onclick="return confirm(\'Đăng nhập để thêm giỏ hàng\')"' : '' ?>
																																							data-product-id='<?= $productDetail['sp_id'] ?>'
																																							type='submit'>
										Thêm vào giỏ hàng
									</button>
								<?php else: ?>
									<h5>Hết hàng</h5>
								<?php endif ?>

							</div>
						</div>
					</div>

					<!--  -->
					<div class="flex-w flex-m p-l-100 p-t-10 respon7 sl">
						<div class="flex-m bor9 p-r-10 m-r-11">

						</div>

						<a href="https://www.facebook.com/" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
																																				data-tooltip="Facebook">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="https://twitter.com/" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
																																				data-tooltip="Twitter">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="https://www.google.com/" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
																																				data-tooltip="Google Plus">
							<i class="fa fa-google-plus"></i>
						</a>
					</div>
				</div>
			</div>

		</div>
		<div id='bl'></div>
		<div class="bor10 m-t-50 p-t-43 p-b-40">
			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#description" role="tab">ĐẶC ĐIỂM NỔI BẬT</a>
					</li>
					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh giá </a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-43">
					<!-- - -->
					<div class="tab-pane fade show active" id="description" role="tabpanel">
						<div class="how-pos2 p-lr-15-md">
							<li class="stext-102 cl6" style="  white-space: pre-line;">
								<?= $productDetail['sp_motact'] ?>
							</li>
						</div>
					</div>

					<!-- - -->
					<div class="tab-pane fade" id="information" role="tabpanel">
						<div class="row">
							<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
								<ul class="p-lr-28 p-lr-15-sm">
									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Weight
										</span>

										<span class="stext-102 cl6 size-206">
											0.79 kg
										</span>
									</li>

									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Dimensions
										</span>

										<span class="stext-102 cl6 size-206">
											110 x 33 x 100 cm
										</span>
									</li>

									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Materials
										</span>

										<span class="stext-102 cl6 size-206">
											60% cotton
										</span>
									</li>

									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Color
										</span>

										<span class="stext-102 cl6 size-206">
											Black, Blue, Grey, Green, Red, White
										</span>
									</li>

									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Size
										</span>

										<span class="stext-102 cl6 size-206">
											XL, L, M, S
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- - -->
					<div class="tab-pane fade" id="reviews" role="tabpanel">
						<div class="row">
							<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
								<div class="p-b-30 m-lr-15-sm">
									<!-- Review -->

									<div id="reviewsContainer">
										<?php if (empty($bl)): ?>
											<h5 class='text-center'>Không có bình luận.</h5>
										<?php else: ?>
											<?php foreach ($bl as $key => $value): ?>
												<div class="flex-w flex-t p-b-68">
													<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
														<img
																																												src="admin/<?= $value['user_img'] ? $value['user_img'] : '../view/images/avartar.jpg' ?>">
													</div>

													<div class="size-207">
														<div class="flex-w flex-sb-m p-b-17">
															<span class="mtext-108 cl2 p-r-20">
																<?= $value['user_name'] ?>
															</span>

															<span class="fs-18 cl11">
																<?php for ($i = 0; $i < $value['rating']; $i++) {
																	echo '⭐';
																} ?>
															</span>
														</div>

														<p class="stext-102 cl6">
															<?= $value['comment_content'] ?>
														</p>
														<p>
															<!-- #region -->
															<?= $value['ngaybinhluan'] ?>
														</p>
													</div>
												</div>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
		<span class="stext-107 cl6 p-lr-25">
			Thể loại:
			<?= $productDetail['dm_name'] ?>
		</span>
	</div>
</section>


<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
	<div class="container">
		<div class="p-b-45">
			<h3 class="ltext-106 cl5 txt-center">
				Những sảm phẩm tương tự
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">

				<?php foreach ($id as $product): ?>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="admin/<?= $product['img'] ?>" alt="IMG-PRODUCT">

								<a href="?act=product-detail&id=<?= $product['id'] ?>&iddm=<?= $product['iddm'] ?>"
																																						class="block2-btn flex-c-m stext-103 cl2 size-119 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
									View detail
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="?act=product-detail&id=<?= $product['id'] ?>&iddm=<?= $product['iddm'] ?>"
																																							class="stext-107 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?= $product['name'] ?>
									</a>

									<span class="stext-105 cl3">
										<?= number_format($product['price'], 0, ',', '.') ?> đ

									</span>
								</div>


							</div>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
</section>
<script>
	// function searchProduct() {
	//    

	//     window.location.href = '?act=product-detail&id=<?= $variants[0]['id_product'] ?>&iddm=<?= $_GET['iddm'] ?>&color=' + encodeURIComponent(productId);

	// }
	function searchProduct() {

		var selectedOption = document.querySelector('.color option:checked');
		var productId = selectedOption.dataset.color;
		// Tạo một yêu cầu AJAX
		$.ajax({
			url: '?act=product-detaill&id=<?= $variants[0]['id_product'] ?>&iddm=<?= $_GET['iddm'] ?>&color=' + productId,
			type: 'GET',
			data: {
				productId: productId,
			},
			success: function (datas) {
				const cartData = JSON.parse(datas);

				img(cartData.img);
				console.log(cartData);
			},
			error: function (xhr, status, error) {
				console.log('Error: ' + error);
			}
		});

		function img(newImageSrc) {
			newImageSrc = 'admin/' + newImageSrc;

			$('.imgs img').attr('src', newImageSrc);

			setTimeout(function () {
				var newImageSrcs = 'admin/<?php echo $productDetail['sp_img']; ?>';
				$('.imgs img').attr('src', newImageSrcs);
			}, 3000);
		}


	}
	$('.link').on('click', () => {
		window.location.href = '?act=sign-in';
	})	
</script>