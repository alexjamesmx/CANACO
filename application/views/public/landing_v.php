<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>CANACO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Cámara Nacional de Comercio, Servicios y Turismo de Querétaro " />
	<meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
	<meta name="author" content="Shreethemes" />
	<meta name="email" content="support@shreethemes.in" />
	<meta name="website" content="https://shreethemes.in" />
	<meta name="Version" content="v3.2.0" />
	<!-- favicon -->
	<link rel="shortcut icon" href="<?= base_url('static/images/favicon.ico') ?>">
	<!-- Font Awesome -->
	<link href="<?= base_url('static/css/fontawesome/css/all.css') ?>" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="<?= base_url('static/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
	<!-- tobii css -->
	<link href="<?= base_url('static/css/tobii.min.css') ?>" rel="stylesheet" type="text/css" />
	<!-- Icons -->
	<link href="<?= base_url('static/css/materialdesignicons.min.css') ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
	<!-- Slider -->
	<link rel="stylesheet" href="<?= base_url('static/css/tiny-slider.css') ?>" />
	<!-- Main Css -->
	<link href="<?= base_url('static/css/style.css') ?>" rel="stylesheet" type="text/css" id="theme-opt" />
	<link href="<?= base_url('static/css/colors/default.css') ?>" rel="stylesheet" id="color-opt">
	<!--Toast -->
	<link rel="stylesheet" href="<?= base_url(
										'static/admin/toastr/toastr.min.css'
									) ?>" rel="stylesheet" />
</head>

<body>
	<!-- Loader -->
	<div id="preloader">
		<div id="status">
			<div class="spinner">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>
	</div>
	<!-- Loader -->

	<?= $_APP['header'] ?>

	<?= $_APP['fragment'] ?>

	<?= $_APP['footer'] ?>

	<!-- Back to top -->
	<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
	<script>
		function base_url(complement = '') {
			return "<?= base_url() ?>" + complement
		}
	</script>
	<script src="<?= base_url('static/admin/js/vendor/jquery-3.3.1.min.js') ?>"></script>
	<script src="<?= base_url('static/js/sweetalert2.all.min.js') ?>"></script>
	<script src="<?= base_url('static/js/bootstrap.bundle.min.js') ?>"></script>

	<script src="<?= base_url('static/js/tiny-slider.js') ?>"></script>
	<script src="<?= base_url('static/js/tobii.min.js') ?>"></script>
	<!-- Icons -->
	<script src="<?= base_url('static/js/feather.min.js') ?>"></script>
	<!-- Main Js -->
	<script src="<?= base_url('static/js/plugins.init.js') ?>"></script>
	<!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
	<script src="<?= base_url('static/js/app.js') ?>"></script>
	<!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
	<?php
	if (isset($scripts)) :
		if (is_array($scripts)) :
			foreach ($scripts as $script) :
	?>
				<script src="<?= base_url('static/' . $script . '.js') ?>"></script>
	<?php
			endforeach;
		endif;
	endif;
	?>


</body>

</html>