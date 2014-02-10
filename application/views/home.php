<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Perijinan Kota Bontang</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/ext-all.css" rel="stylesheet">
		<link rel="icon" href="<?php echo base_url(); ?>/assets/images/logo-bontang.png">
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/globalVariabel.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ext-all.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/src/ux/InputTextMask.js"></script>
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
                        <a class="navbar-brand" href="about.html">BERANDA</a>
                    </div>			
                    <div class="collapse navbar-collapse main-navbar-collapse">
						<?php
						$grup	= $this->m_groupmenu->get_by(array("publik"=>1),FALSE,FALSE,FALSE,"order ASC");
						foreach($grup as $row){
						?>
						<ul class="nav navbar-nav" >
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown"><?php echo $row["menu"]; ?> <b class="caret"></b></a>								
                                <ul class="dropdown-menu" id="mainmenu">
									<?php
									
									$join	= array(
										array("table"=>"useracl","join_key"=>"acl_id","join_table"=>"acl","join_key2"=>"id")
									);
									$acl	= $this->m_useracl->get_join_by($join,array("groupmenu_id"=>$row["id"],"user_id"=>$_SESSION['USERID']),FALSE,FALSE);
									foreach($acl as $r){
									?>
									<li><a href="<?php echo base_url(); ?>index.php/<?php echo $r["link"]; ?>"><?php echo $r["nama"]; ?></a></li>
									<!--<li><a href="<?php echo base_url(); ?>index.php/info_cekpermohonan">Cek Permohonan</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/info_tambahpengaduan">Pengaduan</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/info_daftarpengaduan">Daftar Pengaduan</a></li>-->
									<?php
									}
									?>
                                </ul>
                            </li>
                        </ul>
						<?php
						}
						?>
                        <!--<ul class="nav navbar-nav" >
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Perijinan <b class="caret"></b></a>								
                                <ul class="dropdown-menu" id="mainmenu">
									<li><a href="<?php echo base_url(); ?>index.php/tdp">TDP</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/imb">IMB</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/siup">SIUP</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/ho">SITU/HO</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/reklame">Reklame</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/limbah">Limbah</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/trayek">Trayek</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/lokasi">Lokasi</a></li>

									<li><a href="<?php echo base_url(); ?>index.php/c_t_iujk_det">IUJK</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_t_idam_det">Depo Air Minum</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_t_ipmbl_det">Pengambilan Mineral Bukan Logam</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_t_iujt_det">IUJT</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_sktr">SKTR</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_sppl">SPPL</a></li>                                    
                                    <li><a href="<?php echo base_url(); ?>index.php/c_ijin_lingkungan">Lingkungan</a></li>                                
                                    <li><a href="<?php echo base_url(); ?>index.php/c_t_apotek_det">Apotek</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_t_sipd_det">Praktek Dokter</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_iuiphhk">Usaha Industri</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_ijin_prinsip">Prinsip</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_trotoar">Trotoar</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/c_t_simb_det">SITU MB</a></li>
                                </ul>
                            </li>
                        </ul>
						<ul class="nav navbar-nav" >
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Administrasi <b class="caret"></b></a>								
                                <ul class="dropdown-menu" id="mainmenu">
									<li><a href="<?php echo base_url(); ?>index.php/tabel_master">Tabel Master</a></li>
                                </ul>
                            </li>
                        </ul>
						<ul class="nav navbar-nav" >
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Laporan <b class="caret"></b></a>								
                                <ul class="dropdown-menu" id="mainmenu">
									<li><a href="<?php echo base_url(); ?>index.php/c_t_laporan">Laporan</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/c_t_laporan_expired">Laporan Expired</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/c_t_laporan_bayar">Laporan Bayar</a></li>
                                </ul>
                            </li>
                        </ul>-->
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
					<?php echo (isset($content)) ? ($content) : (""); ?>
                    </div>
                </div>
            </div>           
        </div>
        <!--/.fluid-container-->
    </body>
</html>