<style>
	.header-v3 .wrap-menu-desktop {
		background-color: black;
	}

	.con {
		margin-top: 100px;
	}
</style>


<div class="bg0 p-b-200 ">

	<div class="container con">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10" style='    max-width: 950px;'>
				<a href="?act=product">
					<button class="stext-106 cl6 hov1 trans-04 m-r-32 m-tb-5 
					 <?= !isset($_GET['id']) ? 'how-active1' : '' ?>">
						Tất cả sản phẩm
					</button>
				</a>

				<?php foreach ($product['dm'] as $category): ?>
					<?php if ($category['status'] == 1): ?>

						<a href="?act=product<?= isset($category['id']) ? '&id=' . $category['id'] : '' ?>">
							<button
																																					class="stext-106 cl6 hov1 trans-04 m-r-32 m-tb-5 <?= isset($_GET['id']) && $_GET['id'] == $category['id'] ? 'how-active1' : '' ?>">
								<?= $category['name'] ?>
							</button>
						</a>
					<?php endif ?>

				<?php endforeach; ?>

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
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<form id="searchForm" method="get" class="dis-flex p-l-15 bor2 bor10"
																																		onsubmit="return searchProduct();">
					<button id="searchButton" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" type="submit">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input id="searchInput" class="mtext-107 cl2 size-114 plh2 p-r-15 m-t-20 align-content-center" type="text"
																																			name="search">

				</form>
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
								<a href="?act=product<?= $link ?>&orderBy=ASC" class="filter-link stext-106 trans-04">

									Giá: thấp đến cao
								</a>
							</li>

							<li class="p-b-6">
								<a href="?act=product<?= $link ?>&orderBy=DESC" class="filter-link stext-106 trans-04">
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
								<a href="?act=product&minPrice=100000&maxPrice=200000<?= $link ?><?= $tk ?>"
																																						class="filter-link stext-106 trans-04">
									100.000 đ - 200.000 đ
								</a>

							</li>



							<li class="p-b-6">
								<a href="?act=product&minPrice=200000&maxPrice=300000<?= $link ?><?= $tk ?>"
																																						class="filter-link stext-106 trans-04">
									200.000 đ - 300.000 đ
								</a>
							</li>

							<li class="p-b-6">
								<a href="?act=product&minPrice=300000&maxPrice=400000<?= $link ?><?= $tk ?>"
																																						class="filter-link stext-106 trans-04">
									300.000 đ - 400.000 đ
								</a>
							</li>

							<li class="p-b-6">
								<a href="?act=product&minPrice=400000&maxPrice=500000<?= $link ?><?= $tk ?>"
																																						class="filter-link stext-106 trans-04">
									400.000 đ - 500.000 đ
								</a>
							</li>

							<li class="p-b-6">
								<a href="?act=product&minPrice=500000<?= $link ?><?= $tk ?>"
																																						class="filter-link stext-106 trans-04">
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


			<?php $products = $product['product']['products'];
			foreach ($products as $key => $value): ?>
				<?php if ($value['status'] == 1): ?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="admin/<?= $value['img'] ?>" alt="IMG-PRODUCT">
								<!-- js-show-modal1	 -->
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
				<?php endif ?>
			<?php endforeach; ?>

		</div>
		<div class="flex-c-m flex-w w-full p-t-38">
			<?php if ($page > 1): ?>
				<a href="?act=product&page=<?= $page - 1; ?><?= $link ?><?= $order ?>"
																																		class="flex-c-m how-pagination1 trans-04 m-all-7 ">
					<i class="fa fa-arrow-left"></i>
				</a>
			<?php endif; ?>
			<?php if ($totalPages > 1):
				for ($i = 1; $i <= $totalPages; $i++): ?>
					<a href="?act=product&page=<?= $i ?><?= $link ?><?= $order ?>"
																																			class="flex-c-m how-pagination1 trans-04 m-all-7 <?= ($i == $page) ? 'active-pagination1' : ''; ?>">
						<?= $i ?>
					</a>
				<?php endfor; endif; ?>
			<?php if ($page < $totalPages): ?>
				<a href="?act=product&page=<?= $page + 1; ?><?= $link ?><?= $order ?>"
																																		class="flex-c-m how-pagination1 trans-04 m-all-7 ">
					<i class="fa fa-arrow-right"></i>
				</a>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>
<script>
	function searchProduct() {
		var searchInput = document.getElementById('searchInput').value;
		window.location.href = '?act=product&search=' + searchInput;
		return false;
	}
	
</script>