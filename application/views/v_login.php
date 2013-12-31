<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
	<!--<head>
		<title>PERIJINAN - LOGIN</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">
		<!--[if lt IE 9]>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
		<![endif]-->
	<!--</head>
	<body class="bootstrap-admin-without-padding">
		<div class="container">
			<div class="row">-->
				<form method="post" class="bootstrap-admin-login-form">
                    <h3>User Login</h3>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="E-mail" id="username">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                    </div>
                    <button class="btn btn-lg btn-primary" type="button" id="submitbutton">Login</button>
                </form>
			<!--</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>-->
		<script>
			$(document).ready(function(){
				$('input[name="email"]').focus();
				
				$("#submitbutton").click(function(){
					var username = $("#username").val();
					var password = $("#password").val();
					$.ajax({
						url : 'index.php/c_login/verifikasiLogin',
						method : 'post',
						data : {
							username : username,
							password : password
						},
						success : function(response){
							if(response=='success'){
								window.location="index.php/c_home";
							}else{
								alert('Login gagal');
								$("#username").val('');
								$("#password").val('');
							}
						}
					});
					
				});
			});
		</script>
	<!--</body>
</html>-->