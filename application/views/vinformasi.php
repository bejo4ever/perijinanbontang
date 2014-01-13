<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Informasi</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
.style1 {
	font-size: xx-large;
	font-weight: bold;
}
</style>
</head>

<body>
<p class="style1"><?=$output['label']?></p>
<?php 
echo $output['output']->output; 

?>
</body>
</html>
