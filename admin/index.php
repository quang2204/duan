<?php

session_start();
require_once "../model/connact.php";
require_once './Controller/product.php';
require_once './Controller/dk.php';
require_once './Controller/dm.php';
require_once './model/adproduct.php';
require_once './model/product.php';
require_once './model/danhmuc.php';
require_once './model/user.php';
require_once '../model/singin.php';
require_once '../model/dn.php';
require_once '../model/dx.php';
require_once '../model/function.php';
require_once './model/dk.php';
require_once './model/phantrang.php';
require_once 'view/inc/header.php';
$act = !empty($_GET['act']) ? $_GET['act'] : 'sanpham';
$path = "view/{$act}.php";
$baseurl = 'http://php.test/duanmau/admin/';
?>

<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start none"
                                                                                                                        navbar-main
                                                                                                                        navbar-scroll="true">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="leading-normal text-sm">
                    <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                                                                                                                                        aria-current="page">
                    <?= $act ?>
                </li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">
                <?= $act ?>
            </h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                    <span
                                                                                                                                            class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                                                                                                            placeholder="Type here..." />
                </div>
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">

                <li class="flex items-center">
                    <?php if (empty($_SESSION['users']) || $_SESSION['users']['role'] != 1): ?>
                        <a href="?act=sign-in"
                                                                                                                                                class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
                            <i class="fa fa-user sm:mr-1" aria-hidden="true"></i>
                            <span class="hidden sm:inline">Sign In</span>
                        </a>
                    <?php else: ?>
                        <?php
                        if (!empty($_SESSION['users']['img'])):
                            ?>
                            <img src="<?= $_SESSION['users']['img'] ?>" alt="" style="  width: 40px; height:40px;border-radius: 50%;
                                                ">
                        <?php else: ?>
                            <img src="../view\images\avatar-01.jpg" alt="" style="  width: 40px; height:40px;border-radius: 50%;
    ">
                        <?php endif; ?>
                        <h6 class="px-4 mt-2">
                            <?= $_SESSION['users']['name'] ?>
                        </h6>

                    <?php endif; ?>

                </li>
                <li class="flex items-center pl-4 xl:hidden">
                    <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-sm text-slate-500"
                                                                                                                                            sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                            <i
                                                                                                                                                    class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                            <i
                                                                                                                                                    class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                            <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                        </div>
                    </a>
                </li>
                <li class="flex items-center px-2">

                </li>

                <!-- notifications -->

                <li class="relative flex items-center pr-2">
                    <p class="hidden transform-dropdown-show"></p>
                    <a dropdown-trigger href="javascript:;" class="block p-0 transition-all text-sm ease-nav-brand text-slate-500"
                                                                                                                                            aria-expanded="false">
                        <i class="cursor-pointer fa fa-bell text-xl" aria-hidden="true"></i>
                    </a>

                    <ul dropdown-menu
                                                                                                                                            class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                        <!-- add show class on dropdown open js -->
                        <li class="relative mb-2">
                            <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                                                                                                                                    href="javascript:;">
                                <div class="flex py-1">
                                    <div class="my-auto">
                                        <img src="view/assets/img/team-2.jpg"
                                                                                                                                                                class="inline-flex items-center justify-center mr-4 text-white text-sm h-9 w-9 max-w-none rounded-xl" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 font-normal leading-normal text-sm"><span
                                                                                                                                                                    class="font-semibold">New
                                                message</span> from Laur</h6>
                                        <p class="mb-0 leading-tight text-xs text-slate-400">
                                            <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="relative mb-2">
                            <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                                                                                                                                    href="javascript:;">
                                <div class="flex py-1">
                                    <div class="my-auto">
                                        <img src="view/assets/img/small-logos/logo-spotify.svg"
                                                                                                                                                                class="inline-flex items-center justify-center mr-4 text-white text-sm bg-gradient-to-tl from-gray-900 to-slate-800 h-9 w-9 max-w-none rounded-xl" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 font-normal leading-normal text-sm"><span
                                                                                                                                                                    class="font-semibold">New
                                                album</span>
                                            by Travis Scott</h6>
                                        <p class="mb-0 leading-tight text-xs text-slate-400">
                                            <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
                                            1 day
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="relative">
                            <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                                                                                                                                    href="javascript:;">
                                <div class="flex py-1">
                                    <div
                                                                                                                                                            class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-nav-brand text-sm bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                                                                                                                                        fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                                                                                                                                    opacity="0.593633743">
                                                            </path>
                                                            <path class="color-background"
                                                                                                                                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-1 font-normal leading-normal text-sm">Payment successfully
                                            completed</h6>
                                        <p class="mb-0 leading-tight text-xs text-slate-400">
                                            <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
                                            2 days
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
$ad = getAlldm();

if ($act === 'sanpham') {

    $productData = getProductsPerPage($currentPage, $productsPerPage);

} else if ($act === 'adsp') {
    $get = addsp();

} elseif ($act === 'xoa') {
    $xoa = delete($_GET['id']);

} elseif ($act === 'sua') {
    $update = getid($_GET['id']);
    $sua = updatesp($_GET['id']);

} elseif ($act === 'xoadanhmuc') {
    $delete = deletedm($_GET['id']);

} elseif ($act === 'themdm') {
    $add = adddm();

} elseif ($act === 'suadm') {
    $suadm = getiddm($_GET['id']);
    $updatedm = updatedm($_GET['id']);

} else if ($act === 'sign-up') {
    $dk = dkadmin();
} else if ($act === 'sign-in') {
    $dn = dn();
} else if ($act === 'dx') {
    $dx = dx();
} else if ($act === 'user') {
    $user = getAlluser();
} elseif ($act === 'xoauser') {
    $xoa = xoauser($_GET['id']);
}

//  echo "File path: $act";
if (file_exists($path)) {
    require_once $path;
} else {
    require_once "view/404.php";
}


require_once 'view/inc/footer.php';

