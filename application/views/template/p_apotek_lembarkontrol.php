<!DOCTYPE html>
<html>
<head>
	<title>Checklist Apotek</title>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><h3 style="margin:0px;"><u>DAFTAR LAMPIRAN PERMOHONAN IZIN APOTEK</u></h3></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td>Nama Pemohon</td>
			<td>: <?php echo $pemohon_nama; ?></td>
		</tr>
		<tr>
			<td>Nama Perusahaan</td>
			<td>: <?php echo $apotek_nama; ?></td>
		</tr>
		<tr>
			<td>Alamat Perusahaan</td>
			<td>: <?php echo $apotek_alamat; ?></td>
		</tr>
		<tr>
			<td>No Telephone</td>
			<td>: <?php echo $apotek_telp; ?></td>
		</tr>
		<tr>
			<td>Jenis Permohonan</td>
			<td>: <?php echo $det_apotek_jenis_nama; ?></td>
		</tr>
	</table>
	<br>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3"><b>DAFTAR LAMPIRAN (RANGKAP 2)</b></td>
			<td align="center"><b>KET</b></td>
		</tr>
		<?php $i=1; foreach($dataceklist as $subdataceklist){ ?>
		<tr>
			<td valign="top"><?php echo $i; ?></td>
			<td><?php echo $subdataceklist->NAMA_SYARAT; ?></td>
			<td valign="top">: <?php echo ($subdataceklist->apotek_cek_status == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
			<td><?php echo $subdataceklist->apotek_cek_keterangan; ?></td>
		</tr>
		<?php $i++; } ?>
		<tr>
			<td width="20px">&nbsp;</td>
			<td width="350px">&nbsp;</td>
			<td width="100px">&nbsp;</td>
			<td width="150px">&nbsp;</td>
		</tr>
	</table>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4"><b>Kolom ini diisi oleh petugas :</b></td>
		</tr>
		<tr>
			<td>Penerimaan Berkas Permohonan</td>
			<td>: Tanggal</td>
			<td>: <?php echo date('d-m-Y', strtotime($det_apotek_terimatanggal)); ?></td>
			<td>Oleh</td>
			<td>: <?php echo $det_apotek_terima; ?></td>
		</tr>
		<tr>
			<td>Kelengkapan Berkas</td>
			<td colspan="4">: <?php echo $det_apotek_kelengkapan_nama; ?></td>
		</tr>
		<tr>
			<td>Berita Acara Pemeriksaan</td>
			<td>: Nomor</td>
			<td>: <?php echo $det_apotek_bap; ?></td>
			<td>Tanggal</td>
			<td>: <?php echo date('d-m-Y', strtotime($det_apotek_baptanggal)); ?></td>
		</tr>
		<tr>
			<td>Keputusan</td>
			<td colspan="4">: <?php echo $det_apotek_keputusan_nama; ?></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td colspan="4">: <?php echo $det_apotek_keterangan; ?></td>
		</tr>
	</table>
</body>
</html>