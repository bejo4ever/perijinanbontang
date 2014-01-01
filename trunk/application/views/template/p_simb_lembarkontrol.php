<!DOCTYPE html>
<html>
<head>
	<title>Lembar Kontrol simb</title>
</head>
<style>
	.bordered{
		border:1px solid black;
		border-collapse : collapsed;
	}
</style>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td rowspan="4"><img src="<?php echo base_url(); ?>assets/images/logo-bontang.jpg" width="80px" height="100px"></td>
			<td colspan="6" align="center"><h2 style="margin:0px;">PEMERINTAH KOTA BONTANG</h2></td>
		</tr>
		<tr>
			<td colspan="6" align="center"><h3 style="margin:0px;">BADAN PELAYANAN PERIJINAN TERPADU DAN</h3></td>
		</tr>
		<tr>
			<td colspan="6" align="center"><h3 style="margin:0px;">PENANAMAN MODAL</h3></td>
		</tr>
		<tr>
			<td colspan="6" align="center"><h4 style="margin:0px;">Jl. Awang Long No. 1 (0548) 20594 Fax (0548) 20598</h4></td>
		</tr>
		<tr>
			<td width="90px">&nbsp;</td>
			<td width="30px">&nbsp;</td>
			<td width="230px">&nbsp;</td>
			<td width="100px">&nbsp;</td>
			<td width="100px">&nbsp;</td>
			<td width="50px">&nbsp;</td>
			<td width="120px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="7"><hr></td>
		</tr>
		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Nama Perusahaan</td>
			<td colspan="4">: <?php echo $simb_per_nama; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Nama Penanggung Jawab</td>
			<td colspan="4">: <?php echo $pemohon_nama; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Alamat</td>
			<td colspan="4">: <?php echo $simb_alamat; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Tanggal Masuk</td>
			<td colspan="4">: <?php echo date('d-m-Y', strtotime($det_simb_tanggal)); ?></td>
		</tr>
		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="6" align="center"><h3 style="margin:0px;">SITU / HO - MB</h3></td>
		</tr>
		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>I.</td>
			<td colspan="5">Daftar Kelengkapan Pemohon</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td class="bordered" align="center">No.</td>
			<td colspan="4" align="center" class="bordered">Jenis Lampiran</td>
			<td class="bordered" align="center">Keterangan</td>
		</tr>
		<?php $i=1; foreach($dataceklist as $subdataceklist){ ?>
		<tr>
			<td>&nbsp;</td>
			<td class="bordered" align="center"><?php echo $i; ?></td>
			<td colspan="4" class="bordered"><?php echo $subdataceklist->NAMA_SYARAT; ?></td>
			<td class="bordered" align="center"><?php echo ($subdataceklist->simb_cek_status == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
		</tr>
		<?php $i++; } ?>
		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td class="bordered" align="center">No.</td>
			<td class="bordered" align="center">Diterima Oleh</td>
			<td class="bordered" align="center">Tanggal</td>
			<td class="bordered" align="center">Tanda Tangan</td>
			<td colspan="2" class="bordered" align="center">Keterangan</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td class="bordered">1.</td>
			<td class="bordered"><?php echo $det_simb_penerima; ?></td>
			<td class="bordered"><?php echo date('d-m-Y', strtotime($det_simb_tanggalterima)); ?></td>
			<td class="bordered">&nbsp;</td>
			<td colspan="2" class="bordered"><?php echo $det_simb_keterangan; ?></td>
		</tr>
	</table>
</body>
</html>