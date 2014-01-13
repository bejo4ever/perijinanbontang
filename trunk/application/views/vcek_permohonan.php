<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Cek Permohonan</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
.style4 {color: #FFFFFF}
</style>

</head>
<?
$jijin1 = $this->Umum_model->ListIjin();
$jijin2 = $this->Umum_model->ListIjin();
$no=array(
			'name' 	=>'no', 
			'id'	=>'no',
			'class'		=>'input-medium',			
			'value'	=>''
			);
$nama=array(
			'name' 	=>'nama', 
			'id'	=>'nama',
			'class'		=>'input-medium',			
			'value'	=>''
			);
?>
<body>
<p class="style1">Cek Permohonan</p>
<form name="form1" method="post" action="">
  <table width="798" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="268" height="40">
        <input name="choice" type="radio" value="1" checked>
Nomor Pendaftaran </td>
      <td width="16"><div align="center">:</div></td>
      <td width="490"><? echo form_input($no);?> </td>
    </tr>
    <tr>
      <td height="38"><input name="choice" type="radio" value="2">
Nama Perusahaan / Nama Pemohon</td>
      <td><div align="center">:</div></td>
      <td><? echo form_input($nama); ?> <? echo form_dropdown('jijin2', $jijin2,'','id="jijin2"');?></td>
    </tr>
  </table>
  <p>&nbsp; </p>
</form>
<div id="topic-grid">
  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    <tr bgcolor="#666666">
      <td><div align="center"><span class="style4">No Registrasi </span></div></td>
      <td><div align="center"><span class="style4">Nama Pemohon </span></div></td>
      <td><div align="center"><span class="style4">Nama Perusahaan </span></div></td>
      <td><div align="center"><span class="style4">Tanggal Permohonan </span></div></td>
      <td><div align="center"><span class="style4">Jenis Izin </span></div></td>
      <td><div align="center"><span class="style4">Keterangan</span></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
</body>
</html>
