<?php
$baseurl = 'http://php.test/duanmau/';
?>
<!-- <img src="upload/about-01.jpg" alt=""> -->
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
							<a href="product-detail.php"
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
							<a href="product-detail.php"
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
							<a href="product-detail.php"
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

		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				Sản phẩm mới
			</h3>
		</div>


		<div class="row isotope-grid">
			<?php foreach ($data as $key => $value): ?>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0 label-new" data-label="New">
							<img src="admin/<?= $value['img'] ?>" alt="IMG-PRODUCT">

							<a href="<?= $baseurl ?>?act=product-detail&id=<?= $value['id'] ?>"
																																					class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Mua ngay
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="?act=product-detail&id=<?= $value['id'] ?> &iddm=<?= $value['iddm'] ?>"
																																						class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $value['name'] ?>
								</a>

								<span class="stext-105 cl3">
									<?= number_format($value['price'], 0, ',', '.') ?> đ

								</span>
							</div>


						</div>
					</div>
				</div>
			<?php endforeach; ?>


		</div>

	</div>
</section>