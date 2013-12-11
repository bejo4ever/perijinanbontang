<!DOCTYPE html>
<html>
  <head>
    <title>PERIJINAN - LOGIN</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address" id="username">
        <input type="password" class="input-block-level" placeholder="Password" id="password">
        <button class="btn btn-large btn-primary" type="button" id="submitbutton">Sign in</button>
      </form>
    </div> <!-- /container -->
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
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
  </body>
</html>