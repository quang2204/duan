<style>
	.header-v3 .wrap-menu-desktop {
		background-color: black;
	}

	.con {
		margin-top: 100px;
	}
</style>



<!-- Product -->
<div class="bg0 p-b-140 ">
	<div class="container con">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<a href="?act=product">
					<button class="stext-106 cl6 hov1 trans-04 m-r-32 m-tb-5 how-active1">
						Tất cả sản phẩm
					</button>
				</a>

				<?php foreach ($dm as $key => $value): ?>
					<a href="?act=product&id=<?= $value['id'] ?>">
						<button class="stext-106 cl6 hov1 <?= $value['name'] ? 'active' : ''; ?> trans-04 m-r-32 m-tb-5 how-active1">
							<?= $value['name'] ?>
						</button>
					</a>

				<?php endforeach; ?>


				<!-- <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
					Đàn ông
				</button> -->
				<!-- 
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
					Cái túi
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
					Đôi giày
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
					Đồng hồ
				</button> -->
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Lọc
				</div>

				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search ">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Tìm kiếm
				</div>
			</div>

			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15 ">
				<div class=" dis-flex p-l-15 bor2 bor10">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15 align-content-center" type="text" name="search-product" placeholder="Search"
																																			style=" margin-top: 17px;">
				</div>
			</div>

			<!-- Filter -->
			<div class="dis-none panel-filter w-full p-t-10">
				<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sắp xếp theo
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Mặc định
								</a>
							</li>


							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Giá: thấp đến cao
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Giá từ cao đến thấp
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col2 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Giá
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									Tất cả
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									100.000 đ - 200.000 đ
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									200.000 đ - 300.000 đ
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									300.000 đ - 400.000 đ
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									400.000 đ - 500.000 đ
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									500.000 đ+
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col3 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Màu sắc
						</div>

						<ul>
							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #222;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Đen
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									Màu xanh da trời
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Xám
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Màu xanh lá
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
									<i class="zmdi zmdi-circle"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Màu đỏ
								</a>
							</li>

							<li class="p-b-6">
								<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
									<i class="zmdi zmdi-circle-o"></i>
								</span>

								<a href="#" class="filter-link stext-106 trans-04">
									Trắng
								</a>
							</li>
						</ul>
					</div>

					<div class="filter-col4 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Tags
						</div>


					</div>
				</div>
			</div>
		</div>

		<div class="row isotope-grid">
			<?php foreach ($id as $key => $value): ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="admin/<?= $value['img'] ?>" alt="IMG-PRODUCT">
							<!-- js-show-modal1	 -->
							<a href=" #"
																																					class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								xem
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href=" <?= $GLOBALS['baseurl'] ?>?act=product-detail&id=<?= $value['id'] ?>"
																																						class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $value['name'] ?>
								</a>

								<span class="stext-105 cl3">
									<?= $value['price'] ?>0.000đ
								</span>
							</div>


						</div>
					</div>
				</div>
			<?php endforeach; ?>



		</div>

		<div class="flex-c-m flex-w w-full p-t-38">
			<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
				1
			</a>

			<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
				2
			</a>
		</div>
	</div>
</div>
<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
</div>

<!-- Modal1 -->