<form method="post" class="bootstrap-admin-login-form">
	<h4 style="text-align:center;font-weight:bold;">FORM LOGIN PERIZINAN</h4>
	<hr>
	<div class="form-group">
		<input class="form-control" type="text" name="email" placeholder="Username" id="username">
	</div>
	<div class="form-group">
		<input class="form-control" type="password" name="password" placeholder="Password" id="password">
	</div>
	<hr>
	<button class="btn btn-block btn-primary" style="margin:auto;" type="button" id="submitbutton">Login</button>
</form>
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