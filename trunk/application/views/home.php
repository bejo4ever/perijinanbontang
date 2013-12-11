<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>PERIJINAN KOTA BONTANG</title>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/ext-all.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/globalVariabel.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ext-all.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/src/ux/InputTextMask.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">PERIJINAN</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Vincent Gabriel <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Ubah Password</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="login.html">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="#">Tools <i class="icon-arrow-right"></i>

                                        </a>
                                        <ul class="dropdown-menu sub-menu">
                                            <li>
                                                <a href="#">Reports</a>
                                            </li>
                                            <li>
                                                <a href="#">Logs</a>
                                            </li>
                                            <li>
                                                <a href="#">Errors</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">SEO Settings</a>
                                    </li>
                                    <li>
                                        <a href="#">Other Link</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Other Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Other Link</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Content <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Blog</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">News</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Custom Pages</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Calendar</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="#">FAQ</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">User List</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Search</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Permissions</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" id="sidebarmenu">
                        <li>
                            <a href="#c_t_idam"><i class="icon-chevron-right"></i> Depo Air Minum</a>
                        </li>
                        <li>
                            <a href="#c_t_iujk"><i class="icon-chevron-right"></i> IUJK</a>
                        </li>
                        <li>
                            <a href="#c_t_ipmbl"><i class="icon-chevron-right"></i> Pengambilan Mineral</a>
                        </li>
                    </ul>
                </div>
				
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <div class="block" id="mainpanel">
                            
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Perijinan Kota Bontang</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
		<script>
			$(document).ready(function(){
				$("#sidebarmenu li a").click(function(){
					$("#mainpanel").empty();
					var item = $(this);
					var link = item.attr('href').replace('#','');
					$("#mainpanel").load('' + link);
				});
			});
		</script>
    </body>
</html>