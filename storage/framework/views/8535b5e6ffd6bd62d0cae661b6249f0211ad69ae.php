<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>TETCO</title>
		<meta name="description" content="TETCO" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="<?php echo e(asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?php echo e(asset('assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/plugins/custom/prismjs/prismjs.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/fontawesome/css/all.min.css')); ?>" rel="stylesheet">
        <!--begin::Page Vendors Styles(used by this page)-->
        <link href="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/app.css')); ?>" rel="stylesheet" type="text/css" />

        <?php echo $__env->yieldContent('add_css'); ?>
		
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="/">
				<img class="w-25" alt="Logo" src="<?php echo e(asset('assets/media/logos/logo.png')); ?>" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto border-right" id="kt_aside">
					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="kt_brand">
						<!--begin::Logo-->
						<a href="/" class="brand-logo">
							<img alt="Logo" src="<?php echo e(asset('assets/media/logos/logo.png')); ?>" class="w-75"/>
						</a>
						<!--end::Logo-->
						<!--begin::Toggle-->
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</button>
						<!--end::Toolbar-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu mt-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
							<!--begin::Menu Nav-->
							<ul class="menu-nav position-relative h-100 pb-0" id="asideMenu">
								<li class="menu-item" aria-haspopup="true">
									<a href="/home" class="menu-link">
                                       <i class="menu-icon fa-solid fa-house"></i>
										<span class="menu-text font-weight-bolder">Home</span>
									</a>
								</li>
								<li class="menu-item" aria-haspopup="true">
									<a href="/schools-actual-price" class="menu-link">
                                        <i class="menu-icon fa-solid fa-calendar-days"></i>
										<span class="menu-text font-weight-bolder">Schools Actual Price</span>
									</a>
								</li>
								<li class="menu-item" aria-haspopup="true">
									<a href="/school-price-limit" class="menu-link">
                                        <i class="menu-icon fa-solid fa-money-bill"></i>
										<span class="menu-text font-weight-bolder">School Price Limit</span>
									</a>
								</li>
								<li class="menu-item" aria-haspopup="true">
									<a href="/discount-matrix" class="menu-link">
                                        <i class="menu-icon fa-solid fa-message-lines"></i>
										<span class="menu-text font-weight-bolder">Discount Matrix</span>
									</a>
								</li>
								<li class="menu-item position-absolute bottom-0 w-100 bg-secondary py-3 border-top-secondary" aria-haspopup="true">
                                    <a href="javascript:void(0)" class="menu-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="menu-icon fa-regular fa-circle-user fs-6"></i>
                                        <span class="menu-text font-weight-bold"><?php echo e(Auth::user()->name); ?></span>
                                    </a>
                                    <div class="dropdown-menu" style="width: 100%">
                                        <a class="dropdown-item" href="/register">Register User</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="route('logout')" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
								</li>
							</ul>
						</div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside-->

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <!--begin::Header-->
					<div id="kt_header" class="header header-fixed admin-header">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Menu-->
								<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
									<!--begin::Header Nav-->
									<ul class="menu-nav">
										<li class="menu-item">
											<?php echo $__env->yieldContent('bread_crumb'); ?>
										</li>
									</ul>
									<!--end::Header Nav-->
								</div>
								<!--end::Header Menu-->
							</div>
							<!--end::Header Menu Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->

                    <?php echo $__env->yieldContent('content'); ?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->

        <!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->

		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="<?php echo e(asset('assets/plugins/global/plugins.bundle.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/custom/prismjs/prismjs.bundle.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/scripts.bundle.js')); ?>"></script>
		<!--end::Global Theme Bundle-->
        <script src="<?php echo e(asset('assets/js/global.js')); ?>"></script>
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?php echo e(asset('assets/js/features/widgets.js')); ?>"></script>
		<!--end::Page Scripts-->
        <!--begin::Page Vendors(used by this page)-->
        <script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/features/bootstrap-notify.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/notification.js')); ?>"></script>
        <!--end::Page Vendors-->

		<?php echo $__env->yieldContent('add_js'); ?>
		
        <script>
			// Menu active
			const url = window.location.href;
			const pathSegments = url.split('/');
			const secondPathSegment = pathSegments[3];

			$(document).ready(function() {
				switch (secondPathSegment) {
					case "home":
						$("#asideMenu").children().eq(0).addClass("menu-item-open");
						break;
					case "school":
						$("#asideMenu").children().eq(0).addClass("menu-item-open");
						break;
					case "schools-actual-price":
						$("#asideMenu").children().eq(1).addClass("menu-item-open");
						break;
					case "school-price-limit":
						$("#asideMenu").children().eq(2).addClass("menu-item-open");
						break;
					case "discount-matrix":
						$("#asideMenu").children().eq(3).addClass("menu-item-open");
						break;
					default:
						$("#asideMenu").children().removeClass("menu-item-open");
				}
				$(".menu-item-open").children().find("i, span").css('color', '#1e776a');
			});
		</script>
	</body>
	<!--end::Body-->
</html><?php /**PATH D:\Work\Works\Web\Tetco\resources\views/layouts/app.blade.php ENDPATH**/ ?>