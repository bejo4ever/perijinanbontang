<!DOCTYPE html>
<html>
<head>
	<title>Berita Acara Peninjauan Lokasi</title>
	<style>
		.tablebordered, .tablebordered tr, .tablebordered td{
			border : 1px solid black;
			border-collapse : collapse;
		}
		.border-dotted-bottom{
			border-bottom : 2px dotted black;
			border-collapse : collapse;
		}
	</style>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4" align="center"><img src="<?php echo base_url(); ?>assets/images/logo-bontang.jpg" width="50px" height="60px"></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">PEMERINTAH KOTA BONTANG</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h2 style="margin:0px;">BADAN PELAYANAN PERIJINAN TERPADU<br>DAN PENANAMAN MODAL</h2></td>
		</tr>
		<tr>
			<td colspan="4" align="center">JL. MT. Haryono No. 31 LT. 1 Telp./Fax (0548) 20594</td>
		</tr>
		<tr>
			<td colspan="4" align="center">Website : www.bppm.bontangkota.go.id E-mail : layanan.bppm@gmail.com</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><b>KOTA BONTANG</b></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><hr></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h4 style="margin:0px;"><u>BERITA ACARA PENINJAUAN LOKASI IZIN PERATAAN LAHAN</u></h4></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="justify">Pada Hari ini tanggal <?php echo date('d-m-Y',strtotime($det_ipmbl_surveytanggal)); ?>, kami yang 
			bertanda tangan dibawah ini selaku tim survey Surat Izin Perataan Lahan Pemerintah Kota Bontang telah melaksananakan peninjauan
			lokasi yang dimohon oleh Perorangan/Badan Hukum/Instansi Pemerintah sebagai berikut :</td>
		</tr>
		<tr>
			<td>1</td>
			<td colspan="3">PEMOHON :</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top">1.1 Nama Perusahaan</td>
			<td colspan="2">: <?php echo $ipmbl_usaha; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top">1.2 Nama Pemohon</td>
			<td colspan="2">: <?php echo $det_ipmbl_nama; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top">1.3 Alamat Pemohon</td>
			<td colspan="2">: <?php echo $det_ipmbl_alamat; ?></td>
		</tr>
		<tr>
			<td>2</td>
			<td colspan="3">Lokasi yang dimohon</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top">2.1 Keperluan</td>
			<td colspan="2">: <?php echo $ipmbl_keperluan; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top">2.2 Alamat</td>
			<td colspan="2">: <?php echo $ipmbl_lokasi; ?></td>
		</tr>
		<tr>
			<td valign="top">3</td>
			<td colspan="3">Berdasarkan pengamatan kondisi lapangan yang dimohon oleh <?php echo $ipmbl_usaha; ?> yang berlokasi
			di <?php echo $ipmbl_lokasi; ?> Kelurahan <?php echo $ipmbl_kelurahan; ?> Kegiatan Perataan Lahan/Kepras Urug dengan ini dinyatakan : 
			<b></i>Dapat <?php echo $det_ipmbl_status; ?></i></b></td>
		</tr>
		<tr>
			<td width="30px">&nbsp;</td>
			<td width="200px">&nbsp;</td>
			<td>&nbsp;</td>
			<td width="250px">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="3"><b>Pendapat dan saran Anggota Tim Survey :</b></td>
		</tr>
		<tr>
			<td colspan="4"><?php echo $det_ipmbl_surveypendapat; ?></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td align="center">Petugas Survey</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Dinas/Instansi <?php echo $det_ipmbl_surveydinas; ?></td>
		</tr>
		<tr>
			<td colspan="4" height="100px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td style="border-bottom:1px solid black;"><?php echo $det_ipmbl_surveypetugas; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>NIP. <?php echo $det_ipmbl_surveynip; ?></td>
		</tr>
	</table>
</body>
</html>