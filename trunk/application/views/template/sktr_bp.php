<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Bukti Penerimaan</title>
</head>
<body onLoad="window.print()">
	<?//php extract((array)$printrecord[0]); ?>
	<table width="680px" align="center" cellpadding="0" cellspacing="0" style="padding:20px;border:2px solid black;">
		<tr>
			<td rowspan="4" align="center"><img src="<?php echo base_url(); ?>assets/images/logo-bontang.jpg" width="50px" height="60px"></td>
			<td align="center" colspan="4"><h4 style="margin:0px;">SURAT KETERANGAN KESANGGUPAN TATA RUANG</h4></td>
		</tr>
		<tr>
			<td align="center" colspan="4"><h4 style="margin:0px;">BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</h4></td>
		</tr>
		<tr>
			<td align="center" colspan="4"><h4 style="margin:0px;">KOTA BONTANG</h4></td>
		</tr>
		<tr>
			<td align="center" colspan="4"><h4 style="margin:0px;">Telp. (0548) 20594 </h4></td>
		</tr>
		<tr>
			<td colspan="2"><span style="margin-left:50px">Nama Pemilik</span></td>
			<td colspan="3">: <?php echo $sktr["NAMA_PEMILIK"]; ?></td>
		</tr>
		<tr>
			<td colspan="2"><span style="margin-left:50px">Fungsi</span></td>
			<td colspan="3">: <?php echo $sktr["FUNGSI"]; ?></td>
		</tr>
		<tr>
			<td colspan="2"><span style="margin-left:50px">Lokasi Usaha</span></td>
			<td colspan="3">: <?php echo $sktr["ALAMAT_BANGUNAN"]; ?></td>
		</tr>
		<tr>
			<td colspan="2"><span style="margin-left:50px">Tanggal Masuk</span></td>
			<td colspan="3">: <?php echo date('d-m-Y', strtotime($sktr["TGL_PERMOHONAN"])); ?></td>
		</tr>
		<tr>
			<td colspan="2"><span style="margin-left:50px">Perkiraan Selesai</span></td>
			<td colspan="3">: <?php echo $ijin["WAKTUSELESAI"]; ?></td>
		</tr>
		<tr>
			<td width="75px">&nbsp;</td>
			<td width="125px">&nbsp;</td>
			<td>&nbsp;</td>
			<td width="100px">&nbsp;</td>
			<td width="150px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td align="center">Petugas</td>
		</tr>
		<tr>
			<td colspan="5" height="50px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td align="center"><u><?php echo $ijin['NAMA_PEJABAT']; ?></u></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td align="center"><?php echo $ijin['NIP_PEJABAT']; ?></td>
		</tr>
	</table>
</body>
</html>