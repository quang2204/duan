<!DOCTYPE html>
<html lang="en">


<title>CozaStore</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="view/images/icons/favicon.png" />
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->

<link rel="stylesheet" type="text/css" href="view/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->

<link rel="stylesheet" type="text/css" href="view/vendor/animsition/css/animsition.min.css" />
<link rel="stylesheet" type="text/css" href="view/vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/vendor/slick/slick.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="view/css/util.css">
<link rel="stylesheet" type="text/css" href="view/css/main.css">
<link rel="stylesheet" type="text/css" href="view/css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--===============================================================================================-->
</head>

<body class="animsition">
	<!-- Header -->
	<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">

					<!-- Logo desktop -->
					<a href="?" class="logo">
						<img src="view/images/icons/logo-02.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu ">
							<li>

								<a href="?" class="<?= ($act === 'index') ? 'active' : '' ?>">Trang chủ</a>

							</li>

							<li>
								<a href="?act=product" class="<?= ($act === 'product') ? 'active' : '' ?>">Sản phẩm</a>
							</li>

							<li>
								<a href="?act=blog" class="<?= ($act === 'blog') ? 'active' : '' ?>">Blog</a>
							</li>

							<li>
								<a href="?act=about" class="<?= ($act === 'about') ? 'active' : '' ?>">Về chúng tôi</a>
							</li>

							<li>
								<a href="?act=contact" class="<?= ($act === 'contact') ? 'active' : '' ?>">Liên hệ</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<div class="flex-c-m h-full  gap">
							<?php
							if (!empty($_SESSION['users'])): ?>
								<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 <?= isset($_SESSION['cart']) ? 'icon-header-noti' : '' ?>  js-show-cart"
																																						data-notify="<?= isset($_SESSION['cart']['info']) ? $_SESSION['cart']['info']['num_order'] : '' ?>">
									<i class="zmdi zmdi-shopping-cart"></i>

								</div>

								<div class="flex-c-m h-full p-lr-19">


									<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-18 js-show-sidebar ">
										<?php
										if (!empty($_SESSION['users']['img'])):
											?>
											<img src="admin/<?= $pro['img'] ?>" alt="" style="  width: 40px; height:40px;border-radius: 50%;
												">
										<?php else: ?>
											<img src="view\images\avatar-01.jpg" alt="" style="  width: 40px; height:40px;border-radius: 50%;
	">
										<?php endif; ?>


									</div>

								</div>

							<?php endif; ?>
							<?php
							if (empty($_SESSION['users'])): ?>
								<a href="?act=sign-in"
																																						class="flex-c-m stext-104 cl0 size-104 bg1 bor2 hov-btn2 p-lr-15 trans-04 ">Đăng
									nhập</a>
								<a href="?act=singup" class="flex-c-m stext-104 cl0 size-104  bor2 hov-btn2 p-lr-15 trans-04 m-r-10"
																																						style="border: 3px solid #717fe0;">Đăng
									ký</a>
							<?php endif; ?>
							<!-- -->

						</div>
					</div>
			</div>
			</nav>
		</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="?"><img src="view/images/icons/logo-01.png" alt="IMG-LOGO" /></a>
			</div>

			<!-- Icon header -->
			<?php
			if (!empty($_SESSION['users'])): ?>
				<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
					<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 <?= isset($_SESSION['cart']) ? 'icon-header-noti' : '' ?>  js-show-cart"
																																			data-notify="<?= isset($_SESSION['cart']['info']) ? $_SESSION['cart']['info']['num_order'] : '' ?>">
						<i class="zmdi zmdi-shopping-cart" style='color: black;'></i>


					</div>
				</div>

				<!-- Button show menu -->

			<?php endif; ?>

			<?php
			if (empty($_SESSION['users'])): ?>
				<a href="?act=sign-in"
																																		class="flex-c-m stext-104 cl0 size-104 bg1 bor2 hov-btn2 p-lr-15 trans-04 m-r-10">Đăng
					nhập</a>
				<a href="?act=singup" class="flex-c-m stext-104  size-104  bor2 hov-btn2 p-lr-15 trans-04 "
																																		style="border: 3px solid #717fe0;color: #717fe0;">Đăng
					ký</a>
			<?php endif; ?>
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="?">Trang chủ</a>

				</li>

				<li>
					<a href="?act=product">Sản phẩm</a>
				</li>
				<li>
					<a href="?act=blog">Blog</a>
				</li>

				<li>
					<a href="?act=about">Về Chúng tôi</a>
				</li>
				<?php
				if (!empty($_SESSION['users'])): ?>
					<li>
						<a href="?act=profile&id=<?= $_SESSION['users']['id'] ?>">Tài khoản của tôi</a>
						<ul class="sub-menu-m" style="padding-bottom: 0;">
							<li>
								<a href="?act=profile&id=<?= $_SESSION['users']['id'] ?>">Tài khoản của tôi</a>
							</li>
							<li>
								<a href="?act=dx">Đăng xuất</a>
							</li>
							<li>
								<a href="#">Đơnơn hàng</a>
							</li>
						</ul>
						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>

				<?php endif; ?>
				<li>
					<a href="?act=contact">Liên hệ</a>
				</li>


			</ul>
		</div>

	</header>

	<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="?act=profile" class="stext-102 cl2 hov-cl1 trans-04">
							Portfolio
						</a>
					</li>

					<li class="p-b-13">
						<a href="?act=order" class="stext-102 cl2 hov-cl1 trans-04">
							Order
						</a>
					</li>


					<li class="p-b-13">
						<a href="?act=dx" class="stext-102 cl2 hov-cl1 trans-04">
							Đăng xuất
						</a>
					</li>

				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@ Lương Thành Quang
					</span>

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="view/images/gallery-01.jpg" data-lightbox="gallery"
																																					style="background-image: url('view/images/gallery-01.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="view/images/gallery-02.jpg" data-lightbox="gallery"
																																					style="background-image: url('view/images/gallery-02.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="view/images/gallery-03.jpg" data-lightbox="gallery"
																																					style="background-image: url('view/images/gallery-03.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="view/images/gallery-04.jpg" data-lightbox="gallery"
																																					style="background-image: url('view/images/gallery-04.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="view/images/gallery-05.jpg" data-lightbox="gallery"
																																					style="background-image: url('view/images/gallery-05.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="view/images/gallery-06.jpg" data-lightbox="gallery"
																																					style="background-image: url('view/images/gallery-06.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="view/images/gallery-07.jpg" data-lightbox="gallery"
																																					style="background-image: url('view/images/gallery-07.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="view/images/gallery-08.jpg" data-lightbox="gallery"
																																					style="background-image: url('view/images/gallery-08.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="view/images/gallery-09.jpg" data-lightbox="gallery"
																																					style="background-image: url('view/images/gallery-09.jpg');"></a>
						</div>
					</div>
				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						About
					</span>

					<p class="stext-108 cl6 p-t-27">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit.
						Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem
						fermentum quis.
					</p>
				</div>
			</div>
		</div>
	</aside>
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-45 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 m-r--20 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<?php if (isset($_SESSION['cart'])): ?>

				<div class="header-cart-content flex-w js-pscroll block">

					<ul class="header-cart-wrapitem w-full addcart">
						<?php

						foreach ($_SESSION['cart']['buy'] as $key => $value):

							?>
							<li class="header-cart-item flex-w flex-t m-b-12 p-b-20">

								<div class="header-cart-item-img js-addwish delete " data-id='<?= $value['id'] ?>'>
									<img src="admin/<?= $value['img'] ?>" alt="IMG">
								</div>

								<div class="header-cart-item-txt ">
									<a href="?act=product-detail&id=<?= $value['id'] ?>&iddm=<?= $value['iddm'] ?>"
																																							class="header-cart-item-name m-b-18 hov-cl1 trans-04 ">
										<?=
											substr($value['name'], 0, 45) . '...';
										?>
									</a>

									<span class="header-cart-item-info">
										<?= $value['sl'] ?> x
										<?= number_format($value['price'], 0, 0, ) ?> đ
									</span>
								</div>
							</li>
							<?php


						endforeach;
						?>
					</ul>

					<div class="w-full m-t--30">
						<div class="header-cart-total w-full p-tb-40">
							<?php $info = isset($_SESSION['cart']['infos']['total']) ? $_SESSION['cart']['infos']['total'] : $_SESSION['cart']['info']['total']; ?>
							Total:
							<?= number_format($info, 0, 0, ) ?> đ
						</div>
					<?php endif; ?>
					<h2 class="m-auto none" style='display: none;'>Không có sản phẩm </h2>
					<div class="header-cart-buttons flex-w w-full " <?= !isset($_SESSION['cart']) ? "style='position: fixed; bottom:40px'" : '' ?>>
						<a href="?act=shoping-cart"
																																				class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Xem giỏ hàng
						</a>

						<a href="?act=pay"
																																				class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Thanh toán
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>