<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Tambah Pengaduan</title>
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
	<script src="../../assets/self/wilayah.js"></script>
</head>
<body bgcolor="eeeeee">
<form name="kirim" method="post" action="">
<p class="style1">Pengaduan</p>
<table align="center" width="650" border="0">
  <tr>
    <td width="120" align="right">Nama :&nbsp;</td>
    <td width="520">&nbsp;<input type="text" name="txtnama"></td>
  </tr>
  <tr>
    <td align="right">Alamat :&nbsp;</td>
    <td>&nbsp;<input type="text" name="txtalamat">&nbsp;&nbsp;&nbsp;RT :&nbsp;<input name="txtrt" type="text" size="3">&nbsp;&nbsp;&nbsp;RW :&nbsp;<input name="txtrw" type="text" size="3"></td>
  </tr>
  <tr>
    <td align="right">Kecamatan :&nbsp;</td>
    <td>&nbsp;<select name="kec1" id="kec1" onChange="PilihDesa(this,document.getElementById('desa1'),'')"></select></td>
  </tr>
  <tr>
    <td align="right">Desa :&nbsp;</td>
    <td>&nbsp;<select name="desa1" id="desa1"></select></td>
  </tr>
  <tr>
    <td align="right">Telepon :&nbsp;</td>
    <td>&nbsp;<input type="text" name="txttelp">&nbsp;&nbsp;&nbsp;HP :&nbsp;<input name="txthp" type="text" size="15">&nbsp;&nbsp;&nbsp;email :&nbsp;<input name="txtemail" type="text" ></td>
  </tr>
  <tr>
    <td align="right">Isi Pengaduan :&nbsp;</td>
    <td>&nbsp;<textarea name="txtareaisi" cols="50" rows="5" ></textarea></td>
  </tr>
</table>
<input type="button" name="simpan" value="Simpan" onClick="simpen()" >
<a href="/informasi" ><input type="button" name="batal" value="Batal"  ></a>
<p>
<?php 
echo $output; 
//echo form_open('info_cekpermohonan/tambah');
//echo form_submit('mysubmit', 'Tambah');
echo form_close();

?>
</form>
<script language="javascript">
	
	function simpen()
	{
	if (confirm('Yakin mau menyimpan data ini ?'))
		{
		document.kirim.action="<?php echo site_url()."/info_tambahpengaduan/simpen_baru";?>";
		document.kirim.submit();
		}
	}

	function OnLoad()
	{	
		CreateKecamatan(document.getElementById('kec1'),'<?php echo isset($dataPermohonan->kecamatan_id) ? $dataPermohonan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec1'),document.getElementById('desa1'),'<?php echo isset($dataPermohonan->desa_id) ? $dataPermohonan->desa_id : ''?>');
		CreateKecamatan(document.getElementById('kec2'),'<?php echo isset($dataPerusahaan->kecamatan_id) ? $dataPerusahaan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec2'),document.getElementById('desa2'),'<?php echo isset($dataPerusahaan->desa_id) ? $dataPerusahaan->desa_id : ''?>');	
	}
	
	OnLoad();
</script>
</body>

</html>
