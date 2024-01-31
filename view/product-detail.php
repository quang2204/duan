<style>
	.header-v3 .wrap-menu-desktop {
		background-color: black;
	}

	.top {
		margin-top: 100px;
	}
</style>


<!-- breadcrumb -->
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
						<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

						<div class="slick3 gallery-lb">
							<!-- <div class="item-slick3" data-thumb="view/images/product-detail-01.jpg">
								<div class="wrap-pic-w pos-relative">
									<img src="view/images/product-detail-01.jpg" alt="IMG-PRODUCT">

									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
																																							href="view/images/product-detail-01.jpg">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div>

							<div class="item-slick3" data-thumb="view/images/product-detail-02.jpg">
								<div class="wrap-pic-w pos-relative">
									<img src="view/images/product-detail-02.jpg" alt="IMG-PRODUCT">

									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
																																							href="view/images/product-detail-02.jpg">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div> -->

							<div class="item-slick3" data-thumb="admin/<?= $productDetail['sp_img'] ?>">
								<div class="wrap-pic-w pos-relative">

									<img src="admin/<?= $productDetail['sp_img'] ?>" alt="IMG-PRODUCT">

									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
																																							href="admin/<?= $productDetail['sp_img'] ?>">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-5 p-b-30">
				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						<?= $productDetail['sp_name'] ?>

					</h4>

					<span class="mtext-106 cl2">
						<?= number_format($productDetail['sp_price'], 0, ',', '.') ?> đ

					</span>

					<!-- <p class="stext-102 cl3 p-t-23">
						<?= $product['sp_mota'] ?>

					</p> -->

					<!--  -->
					<div class="p-t-33">
						<div class="flex-w flex-r-m p-b-10">
							<div class="size-203 flex-c-m respon6">
								Size
							</div>

							<div class="size-204 respon6-next">
								<div class="rs1-select2 bor8 bg0">
									<select class="js-select2" name="time">
										<option>Size S</option>
										<option>Size M</option>
										<option>Size L</option>
										<option>Size XL</option>
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
									<select class="js-select2" name="time">
										<option>Red</option>
										<option>Blue</option>
										<option>White</option>
										<option>Grey</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-r-m p-b-10">
							<div class="size-204 flex-w flex-m respon6-next">
								<div class="wrap-num-product flex-w m-r-20 m-tb-10">
									<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-minus"></i>
									</div>

									<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product"
																																							value="1">

									<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-plus"></i>
									</div>
								</div>

								<button
																																						class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
									Thêm vào giỏ hàng
								</button>
							</div>
						</div>
					</div>

					<!--  -->
					<div class="flex-w flex-m p-l-100 p-t-40 respon7">
						<div class="flex-m bor9 p-r-10 m-r-11">
							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
																																					data-tooltip="Add to Wishlist">
								<i class="zmdi zmdi-favorite"></i>
							</a>
						</div>

						<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
																																				data-tooltip="Facebook">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
																																				data-tooltip="Twitter">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
																																				data-tooltip="Google Plus">
							<i class="fa fa-google-plus"></i>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="bor10 m-t-50 p-t-43 p-b-40">
			<!-- Tab01 -->
			<div class="tab01" id='bl'>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#description" role="tab">ĐẶC ĐIỂM NỔI BẬT</a>
					</li>

					<!-- <li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
							information</a>
					</li> -->

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
									<?php foreach ($bl as $key => $value): ?>
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="admin/<?= $value['user_img'] ?>" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-108 cl2 p-r-20">
														<?= $value['user_name'] ?>
													</span>

													<span class="fs-18 cl11">
														<?php for ($i=0; $i < $value['rating']; $i++) { 
															echo '⭐';
														} ?>
													</span>
												</div>

												<p class="stext-102 cl6">
													<?= $value['comment_content'] ?>

												</p>
												<p>
													<?= $value['ngaybinhluan'] ?>
												</p>
											</div>
										</div>
									<?php endforeach; ?>


									<!-- Add review -->
									<form class="w-full" method="post">
										<h5 class="mtext-108 cl2 p-b-7">
											Thêm một bài đánh giá
										</h5>
										<input type="hidden" value='<?= $productDetail['sp_id'] ?>' name='idpro'>

										<input type="hidden" value='<?= $_SESSION['users']['id'] ?>' name="iduser">
										<p class="stext-102 cl6">
											Địa chỉ email của bạn sẽ không được công bố.Các trường bắt buộc được đánh
											dấu*
										</p>

										<div class="flex-w flex-m p-t-50 p-b-23">
											<span class="stext-102 cl3 m-r-16">
												Đánh giá của bạn
											</span>

											<span class="wrap-rating fs-18 cl11 pointer">
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
												<input class="dis-none" type="number" name="rating">

											</span>
										</div>

										<div class="row p-b-25">
											<div class="col-12 p-b-5">
												<label class="stext-102 cl3" for="review">Đánh giá của bạn</label>
												<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10 how-shadow1" id="review"
																																										name="noidung"></textarea>
											</div>

											<!-- <div class="col-sm-6 p-b-5">
												<label class="stext-102 cl3" for="name">Tên</label>
												<input class="size-111 bor8 stext-102 cl2 p-lr-20 how-shadow1" id="name" type="text"
																																										name="name">
											</div>

											<div class="col-sm-6 p-b-5">
												<label class="stext-102 cl3" for="email">E-mail</label>
												<input class="size-111 bor8 stext-102 cl2 p-lr-20 how-shadow1" id="email" type="text"
																																										name="email">
											</div> -->
										</div>

										<button type="submit"
																																								class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
											Submit
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
		<!-- <span class="stext-107 cl6 p-lr-25">
			SKU: JAK-01
		</span> -->

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

								<a href="#"
																																						class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									xem
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="?act=product-detail&id=<?= $product['id'] ?>&iddm=<?= $product['iddm'] ?>"
																																							class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?= $product['name'] ?>
									</a>

									<span class="stext-105 cl3">
										<?= number_format($product['price'], 0, ',', '.') ?> đ

									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="view/images/icons/icon-heart-01.png"
																																								alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="view/images/icons/icon-heart-02.png"
																																								alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>


				<!-- -->


			</div>
		</div>
	</div>
</section>