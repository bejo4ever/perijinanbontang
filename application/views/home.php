<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>PERIJINAN KOTA BONTANG</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/ext-all.css" rel="stylesheet">
		
		<!--[if lt IE 9]>
           <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
           <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body class="bootstrap-admin-with-small-navbar">
		<nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar-sm" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-hover="dropdown"> <i class="glyphicon glyphicon-user"></i> Username <i class="caret"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Ubah Password <?php echo $_SESSION['PERIJINAN_USERNAME']; ?></a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li><a href="<?php echo site_url("c_login/logout"); ?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
		<nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar-under-small" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="about.html">PERIJINAN</a>
                    </div>
                    <div class="collapse navbar-collapse main-navbar-collapse">
                        <ul class="nav navbar-nav" id="mainmenu">
                            <li class="active"><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Perijinan <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#c_t_idam_det">Depo Air Minum</a></li>
                                    <li><a href="#c_t_ipmbl_det">Pengambilan Mineral Bukan Logam</a></li>
                                    <li><a href="#c_t_iujt_det">Usaha Jasa Titipan</a></li>
                                    <li><a href="#c_sktr">SKTR</a></li>
                                    <li><a href="#c_sppl">SPPL</a></li>
                                    <li><a href="#c_trayek">Trayek</a></li>
                                    <li><a href="#c_ijin_lingkungan_inti">Lingkungan</a></li>
                                    <li><a href="#c_ijin_lokasi_inti">Lokasi</a></li>
                                    <li><a href="#c_t_iujk_det">Usaha Jasa Konstruksi</a></li>
                                    <li><a href="#c_t_apotek_det">Izin Apotek</a></li>
                                    <li role="presentation" class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container -->
        </nav>
		
        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- content -->
                <div class="col-md-12">
                    <div class="row" id="mainpanel">
                    </div>
                </div>
            </div>
            <div class="row">
                <hr>
                <footer role="contentinfo">
                    <p>&copy; 2013</p>
                </footer>
            </div>
        </div>
		
        <!--/.fluid-container-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/globalVariabel.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ext-all.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/src/ux/InputTextMask.js"></script>
		<script>
			$(document).ready(function(){
				$("#mainmenu li a").click(function(){
					var item = $(this);
					var link = item.attr('href').replace('#','');
					if(link != ''){
						$("#mainpanel").empty();
						$("#mainpanel").load('' + link);
					}
				});
			});
		</script>
    </body>
</html>