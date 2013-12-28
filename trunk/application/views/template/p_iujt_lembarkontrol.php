<!DOCTYPE html>
<html>
<head>
	<title>Lembar Kontrol IUJT</title>
</head>
<body onLoad="window.print();">
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4" align="center"><img src="<?php echo base_url(); ?>assets/images/logo-bontang.jpg" width="50px" height="60px"></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">PEMERINTAH KOTA BONTANG</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h4 style="margin:0px;">DINAS PERHUBUNGAN KOMUNIKASI DAN INFORMATIKA</h4></td>
		</tr>
		<tr>
			<td colspan="4" align="center">Jl. Bessai Berinta Graha Taman Praja Blok 1 Lt.3 Telp(0548) 5116504</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">KOTA BONTANG</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><hr></td>
		</tr>
		<tr>
			<td width="150px">&nbsp;</td>
			<td width="210px">&nbsp;</td>
			<td width="100px">&nbsp;</td>
			<td width="260px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h4 style="margin:0px;">LEMBAR CEKLIST PERMOHONAN IZIN USAHA JASA TITIPAN</h4></td>
		</tr>
		<tr>
			<td>Surat Dari</td>
			<td>: <?php echo $printrecord[0]->pemohon_nama; ?></td>
		</tr>
		<tr>
			<td>Nomor Surat</td>
			<td colspan="3">: <?php echo $printrecord[0]->det_iujt_nopermohonan; ?></td>
		</tr>
		<tr>
			<td>Perihal</td>
			<td colspan="3">: <?php echo $printrecord[0]->det_iujt_perihal; ?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td colspan="3">: <?php echo date('d-m-Y', strtotime($printrecord[0]->det_iujt_tanggal)); ?></td>
		</tr>
		<tr>
			<td colspan="4" align="center" style="border:1px solid black;"><h4 style="margin:0px;">KELENGKAPAN DATA</h4></td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom:1px solid black;border-left:1px solid black;border-right:1px solid black;">
				<table>
					<?php $i=1; foreach($dataceklist as $subdataceklist){ if($i%2==1){ ?>
					<tr>
						<td><?php echo $subdataceklist->NAMA_SYARAT; ?></td>
						<td valign="top" width="100">: <?php echo ($subdataceklist->iujt_cek_status == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
					</tr>
					<?php } $i++; } ?>
				</table>
			</td>
			<td colspan="2" style="border-bottom:1px solid black;border-right:1px solid black;">
				<table>
					<?php $i=1; foreach($dataceklist as $subdataceklist){ if($i%2==0){ ?>
					<tr>
						<td><?php echo $subdataceklist->NAMA_SYARAT; ?></td>
						<td valign="top" width="100">: <?php echo ($subdataceklist->iujt_cek_status == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
					</tr>
					<?php } $i++; } ?>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="border-left:1px solid black;border-right:1px solid black;"><br>Catatan Khusus</td>
			<td colspan="2" style="border-right:1px solid black;"><br>Bontang, <?php echo date('d-m-Y', strtotime($printrecord[0]->det_iujt_cektanggal)); ?></td>
		</tr>
		<tr>
			<td colspan="2" rowspan="4" align="justify" valign="top" style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;"><?php echo $printrecord[0]->det_iujt_catatan; ?></td>
			<td colspan="2" style="border-right:1px solid black;">Petugas Ceklist</td>
		</tr>
		<tr>
			<td colspan="2" height="75px" style="border-right:1px solid black;">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" style="border-right:1px solid black;"><?php echo $printrecord[0]->det_iujt_cekpetugas; ?></td>
		</tr>
		<tr>
			<td colspan="2" style="border-right:1px solid black;border-bottom:1px solid black;"><?php echo $printrecord[0]->det_iujt_ceknip; ?></td>
		</tr>
	</table>
</body>
</html>