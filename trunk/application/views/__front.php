<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Perijinan Kota Bontang</title>
		<link rel="icon" href="<?php echo base_url(); ?>/assets/images/logo-bontang.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-migrate-1.1.1.js"></script>
		<!--<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" media="screen">-->
		<link href="<?php echo base_url(); ?>assets/css/ext-all.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/fancy_box/source/jquery.fancybox.js?v=2.1.4"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/fancy_box/source/jquery.fancybox.css?v=2.1.4" media="screen" />
		<link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" media="screen">
		<script src="<?php echo base_url(); ?>assets/js/globalVariabel.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ext-all.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/src/ux/InputTextMask.js"></script>
		<script language="javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
		</script>
		<style>
		<style type="text/css">
		body {
			background:url('<?php echo base_url(); ?>/assets/images/bg_login.png');
			padding-bottom: 40px;
			font-size:14px;
			
		}
		/* .loader{
			position:absolute;
			top:0;
			left:0;
			background:rgba(255,255,255,0.8) url('<?php echo base_url(); ?>/assets/images/loading.gif') no-repeat 50%;
			height:100%;
			width:100%;
			z-index:900;
		} */
		.hero-unit{
			margin-top:80px;
			border:1px solid #c4c6ca;
			font-size:14px;
			line-height:normal;
			background:-webkit-linear-gradient(top, rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
		}
		.banner{
			background:url('<?php echo base_url(); ?>/assets/images/bg_login.png');
			position:fixed;
			width: 100%;
			top:0;
			height:94px;
			z-index:1000;
			left:0;
			right:0;
		}
		.navbar{
			margin-top:14px;
			position:fixed;
			width:100%;
			z-index:1000;
		}
		.navbar-inner{
			background-image:linear-gradient(to bottom, #ffffff, #e6e6e6);
		}
		</style>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
	</head>
	<body>
	<div class="banner">
	<img src="<?php echo base_url(); ?>/assets/images/logo-bontang.png" style="margin-top:0px;margin-bottom:10px;margin-left:10px;width:70px;height:80px;">
	<font color="#000000" style="font-size:15pt;">Perizinan Online Pemerintah Kota Bontang</font>
	</div>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="#"></a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li><a class="" href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
						<li><a class="" href="<?php echo site_url();?>/informasi_p/cari_izin"><i class="icon-zoom-in"></i> Cari Izin</a></li>
						<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book"></i> Informasi<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url();?>/informasi_p/perijinan"><!--<i class="icon-plus"></i>--> Perijinan</a></li>
								<!--<li><a href="<?//php echo site_url();?>/informasi_p/cek_permohonan"><!--<i class="icon-minus"></i>--><!-- Cek Permohonan</a></li>-->
								<li><a href="<?//php echo site_url();?>#"><!--<i class="icon-minus"></i>--> Pengaduan</a></li>
							</ul>
						</li>
						<!--<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i> Permohonan Izin<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#c_t_idam_det">Depo Air Minum</a></li>
								<li><a href="#c_t_ipmbl_det">Pengambilan Mineral Bukan Logam</a></li>
								<li><a href="#c_t_iujt_det">Usaha Jasa Titipan</a></li>
								<li><a href="#c_sktr">SKTR</a></li>
								<li><a href="#c_sppl">SPPL</a></li>
								<li><a href="#c_trayek">Trayek</a></li>
								<li><a href="#c_ijin_lingkungan">Lingkungan</a></li>
								<li><a href="#c_ijin_lokasi">Lokasi</a></li>
								<li><a href="#c_t_iujk_det">Usaha Jasa Konstruksi</a></li>
								<li><a href="#c_t_apotek_det">Izin Apotek</a></li>
							</ul>
						</li>-->
						<li class="dropdown">
							<a href="<?php echo base_url("index.php/c_login/form"); ?>" class="dropdown-toggle fancybox fancybox.ajax" data-toggle="dropdown"><i class="icon-user"></i> Login</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container" style="margin-top:80px;">
	<?php echo $content; ?>
	
	<hr>
		<footer>
			<p>&#169; Pemerintah Kota Bontang 2013</p>
		</footer>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/js-boostrap/bootstrap-transition.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/js-boostrap/bootstrap-alert.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/js-boostrap/bootstrap-dropdown.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/js-boostrap/bootstrap-scrollspy.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/js-boostrap/bootstrap-collapse.js"></script>
	<script>
		$(".alert").alert();
	</script>
	</body>
</html>