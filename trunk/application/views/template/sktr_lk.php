<!DOCTYPE html>
<html>
<head>
	<title>Lembar Kontrol SKTR</title>
</head>
<body onLoad="window.print();">
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2" align="center"><h3 style="margin:0px;">DAFTAR LAMPIRAN PERMOHONAN IZIN</h3></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><h3 style="margin:0px;"><u>SURAT KETERANGAN KESANGGUPAN TATA RUANG</u></h3></td>
		</tr>
		<tr>
			<td width="200px">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Nama Pemohon</td>
			<td>: <?php echo $printrecord["pemohon_nama"]; ?></td>
		</tr>
		<tr>
			<td>Nama Pemilik</td>
			<td>: <?php echo $printrecord["NAMA_PEMILIK"]; ?></td>
		</tr>
		<tr>
			<td>Alamat Bangunan</td>
			<td>: <?php echo $printrecord["ALAMAT_BANGUNAN"]; ?></td>
		</tr>
		<tr>
			<td>No Telepon</td>
			<td>: <?php echo $printrecord["pemohon_telp"]; ?></td>
		</tr>
		<tr>
			<td>Jenis Permohonan</td>
			<td>: <?php echo ($printrecord["JENIS_PERMOHONAN"] == 1) ? ("Baru") : ("Perpanjangan"); ?></td>
		</tr>
	</table>
	<br><br>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3"><b>DAFTAR LAMPIRAN</b></td>
			<td colspan="3"><b>KET</b></td>
		</tr>
		<?php $i=1; foreach($dataceklist->result_array() as $subdataceklist){ ?>
		<tr>
			<td valign="top"><?php echo $i; ?></td>
			<td><?php echo $subdataceklist["NAMA_SYARAT"]; ?></td>
			<td valign="top">: <?php echo ($subdataceklist["STATUS"] == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
			<td><?php echo $subdataceklist["KETERANGAN"]; ?></td>
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
			<td width="220px">&nbsp;</td>
			<td width="100px">&nbsp;</td>
			<td width="150px">&nbsp;</td>
			<td width="70px">&nbsp;</td>
			<td width="180px">&nbsp;</td>
		</tr>
		<?/*php if($printrecord["det_idam_terima"] != ''){ ?>
		<tr>
			<td colspan="5"><b>Kolom ini diisi oleh petugas :</b></td>
		</tr>
		<tr>
			<td>Penerimaan Berkas Permohonan</td>
			<td>: Tanggal</td>
			<td>: <?php echo date('d-m-Y', strtotime($printrecord["TANGGAL"]); ?></td>
			<td>Oleh</td>
			<td>: <?php echo "Petugas Penerima"; ?></td>
		</tr>
		<tr>
			<td>Kelengkapan Berkas</td>
			<td colspan="4">: <?php echo $printrecord[0]->det_idam_kelengkapan_nama; ?></td>
		</tr>
		<?php } ?>
		<?/*php if($printrecord[0]->det_idam_bap != ''){ ?>
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
		<?php } */?>
	</table>
</body>
</html>