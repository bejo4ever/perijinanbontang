<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Twitter Bootstrap Popover Example</title>   
<meta name="description" content="Creating Modal Window with Twitter Bootstrap">  
<link href="../../assets/bootstrap/css/bootstrap.css" rel="stylesheet">  
<script src="../../assets/jQuery/jquery-1.10.2.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.js"></script>   
</head>  
<body>  
<div id="modal" class="modal hide">    
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Lorem Ipsum</h2>
	</div>	
    <div class="modal-body">  
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.   
        Donec placerat sem ipsum, ut faucibus nulla. Nullam mattis volutpat  
        dolor, eu porta magna facilisis ut. In ultricies, purus sed pellentesque   
        mollis, nibh tortor semper elit, eget rutrum purus nulla id quam.</p>  
    </div>  
</div>
<a href="#modal" role="button" class="btn" data-toggle="modal">Click Me</a>
<script>$('#modal').modal();</script>
</body>  
</html>  
