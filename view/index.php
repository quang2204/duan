<section class="section-slide">
	<div class="wrap-slick1 rs2-slick1">
		<div class="slick1">
			<div class="item-slick1 bg-overlay1" style="background-image: url(view/images/slide-05.jpg)" data-thumb="view/images/thumb-01.jpg"
																																	data-caption="Women’s Wear">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								Women Collection 2023
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								New arrivals
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="?act=product"
																																					class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1 bg-overlay1" style="background-image: url(view/images/slide-06.jpg)" data-thumb="view/images/thumb-02.jpg"
																																	data-caption="Men’s Wear">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								Men New-Season
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								Jackets & Coats
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
							<a href="?act=product"
																																					class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1 bg-overlay1" style="background-image: url(view/images/slide-07.jpg)" data-thumb="view/images/thumb-03.jpg"
																																	data-caption="Men’s Wear">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								Men Collection 2023
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								NEW SEASON
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
							<a href="?act=product"
																																					class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="wrap-slick1-dots p-lr-10"></div>
	</div>
</section>

<!-- Product -->
<section class="bg0 p-t-23 p-b-130">
	<div class="container m-t-80">
		<div class="p-b-10 d-flex justify-content-between align-items-center">
			<h3 class="ltext-103 cl5">
				Sản phẩm mới
			</h3>
			<a href="?act=product" class="d-flex align-items-center cursor" style='gap: 10px;color: black;'>
				<h5>Xem tất cả sản phẩm </h5>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right"
																																		viewBox="0 0 16 16">
					<path fill-rule="evenodd"
																																			d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
				</svg>
			</a>


		</div>

		<div class="row isotope-grid m-t-10 m-b-30">
			<?php foreach ($data as $key => $value): ?>
				<?php if ($value['status'] == 1): ?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="admin/<?= $value['img'] ?>" alt="IMG-PRODUCT">
								<a href="?act=product-detail&id=<?= $value['id'] ?>&iddm=<?= $value['iddm'] ?>"
																																						class="block2-btn flex-c-m stext-103 cl2 size-119 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
									View detail
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="?act=product-detail&id=<?= $value['id'] ?>&iddm=<?= $value['iddm'] ?>"
																																							class="stext-107 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?= $value['name'] ?>
									</a>

									<span class="stext-105 cl3">
										<?= number_format($value['price'], 0, ',', '.') ?> đ
									</span>
								</div>

							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>


		</div>


	</div>
</section>