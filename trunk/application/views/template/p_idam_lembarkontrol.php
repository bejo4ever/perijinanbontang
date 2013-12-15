<!DOCTYPE html>
<html>
<head>
	<title>Lembar Kontrol IDAM</title>
</head>
<body onLoad="window.print();">
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2" align="center"><h3 style="margin:0px;">DAFTAR LAMPIRAN PERMOHONAN IZIN</h3></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><h3 style="margin:0px;"><u>LAIK HYGIENE DEPO AIR MINUM KOTA BONTANG</u></h3></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td>Nama Pemohon</td>
			<td>: <?php echo $printrecord[0]->det_idam_nama; ?></td>
		</tr>
		<tr>
			<td>Nama Sarana</td>
			<td>: <?php echo $printrecord[0]->idam_usaha; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: <?php echo $printrecord[0]->idam_alamat; ?></td>
		</tr>
		<tr>
			<td>No Telepon</td>
			<td>: <?php echo $printrecord[0]->det_idam_telp; ?></td>
		</tr>
		<tr>
			<td>Jenis Permohonan</td>
			<td>: <?php echo $printrecord[0]->det_idam_jenis_nama; ?></td>
		</tr>
	</table>
	<br><br>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4"><b>DAFTAR LAMPIRAN</b></td>
		</tr>
		<?php $i=1; foreach($dataceklist as $subdataceklist){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $subdataceklist->NAMA_SYARAT; ?></td>
			<td>: <?php echo ($subdataceklist->idam_cek_status == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
			<td><?php echo $subdataceklist->idam_cek_keterangan; ?></td>
		</tr>
		<?php $i++; } ?>
	</table>
	<br><br>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<?php if($printrecord[0]->det_idam_terima != ''){ ?>
		<tr>
			<td colspan="4"><b>Kolom ini diisi oleh petugas :</b></td>
		</tr>
		<tr>
			<td>Penerimaan Berkas Permohonan</td>
			<td>: Tanggal</td>
			<td>: <?php echo date('d-m-Y', strtotime($printrecord[0]->det_idam_terimatanggal)); ?></td>
			<td>Oleh</td>
			<td>: <?php echo $printrecord[0]->det_idam_terima; ?></td>
		</tr>
		<tr>
			<td>Kelengkapan Berkas</td>
			<td colspan="4">: <?php echo $printrecord[0]->det_idam_kelengkapan_nama; ?></td>
		</tr>
		<?php } ?>
		<?php if($printrecord[0]->det_idam_bap != ''){ ?>
		<tr>
			<td>Berita Acara Pemeriksaan</td>
			<td>: Nomor</td>
			<td>: <?php echo $printrecord[0]->det_idam_bap; ?></td>
			<td>Tanggal</td>
			<td>: <?php echo date('d-m-Y', strtotime($printrecord[0]->det_idam_baptanggal)); ?></td>
		</tr>
		<tr>
			<td>Keputusan</td>
			<td colspan="4">: <?php echo $printrecord[0]->det_idam_status_nama; ?></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td colspan="4">: <?php echo $printrecord[0]->det_idam_keterangan; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>