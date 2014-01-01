<!DOCTYPE html>
<html>
<head>
	<title>Lembar Kontrol sipd</title>
</head>
<body onLoad="window.print();">
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2" align="center"><h3 style="margin:0px;">FORMULIR PENGISIAN KELENGKAPAN BERKAS</h3></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><h3 style="margin:0px;"><u>SURAT IZIN PRAKTIK DOKTER / GIGI / SPESIALIS</u></h3></td>
		</tr>
		<tr>
			<td width="200px">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2"><b><u>Dasar Hukum :</u></b></td>
		</tr>
		<tr>
			<td colspan="2">1. UU RI No. 29 Tahun 2004 Tentang Praktik Kedokteran</td>
		</tr>
		<tr>
			<td colspan="2">2. Pemenkes RI No. 512/MenKes/Per/IV/2007 Tentang Izin Praktik dan Pelaksanaan Praktek Kedokteran</td>
		</tr>
		<tr>
			<td width="200px">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Nama Pemohon</td>
			<td>: <?php echo $printrecord[0]->pemohon_nama; ?></td>
		</tr>
		<tr>
			<td>Alamat Rumah</td>
			<td>: <?php echo $printrecord[0]->pemohon_alamat; ?></td>
		</tr>
		<tr>
			<td>Alamat Praktek</td>
			<td>: <?php echo $printrecord[0]->sipd_alamat; ?></td>
		</tr>
		<tr>
			<td>No Telepon</td>
			<td>: <?php echo $printrecord[0]->pemohon_telp; ?></td>
		</tr>
		<tr>
			<td>Jenis Permohonan</td>
			<td>: <?php echo ($printrecord[0]->det_sipd_jenis == 1) ? 'BARU' : 'PERPANJANGAN'; ?></td>
		</tr>
	</table>
	<br>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3"><b>DAFTAR LAMPIRAN</b></td>
			<td colspan="3"><b>KET</b></td>
		</tr>
		<?php $i=1; foreach($dataceklist as $subdataceklist){ ?>
		<tr>
			<td valign="top"><?php echo $i; ?></td>
			<td><?php echo $subdataceklist->NAMA_SYARAT; ?></td>
			<td valign="top">: <?php echo ($subdataceklist->sipd_cek_status == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
			<td><?php echo $subdataceklist->sipd_cek_keterangan; ?></td>
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
		<?php if($printrecord[0]->det_sipd_terima != ''){ ?>
		<tr>
			<td colspan="5"><b>Kolom ini diisi oleh petugas :</b></td>
		</tr>
		<tr>
			<td>Penerimaan Berkas Permohonan</td>
			<td>: Tanggal</td>
			<td>: <?php echo date('d-m-Y', strtotime($printrecord[0]->det_sipd_terimatanggal)); ?></td>
			<td>Oleh</td>
			<td>: <?php echo $printrecord[0]->det_sipd_terima; ?></td>
		</tr>
		<tr>
			<td>Kelengkapan Berkas</td>
			<td colspan="4">: <?php echo $printrecord[0]->det_sipd_kelengkapan_nama; ?></td>
		</tr>
		<?php } ?>
		<?php if($printrecord[0]->det_sipd_bap != ''){ ?>
		<tr>
			<td>Berita Acara Pemeriksaan</td>
			<td>: Nomor</td>
			<td>: <?php echo $printrecord[0]->det_sipd_bap; ?></td>
			<td>Tanggal</td>
			<td>: <?php echo date('d-m-Y', strtotime($printrecord[0]->det_sipd_baptanggal)); ?></td>
		</tr>
		<tr>
			<td>Keputusan</td>
			<td colspan="4">: <?php echo $printrecord[0]->det_sipd_keputusan_nama; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>