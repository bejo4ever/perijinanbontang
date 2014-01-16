<!DOCTYPE html>
<html>
<head>
	<title>Laporan Permohonan</title>
</head>
<body onLoad="window.print();">
	<table width="900px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="8" align="center">BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</td>
		</tr>
		<tr>
			<td colspan="8" align="center">KOTA BONTANG</td>
		</tr>
		<tr>
			<td colspan="8" align="center">LAPORAN PERMOHONAN <?php echo strtoupper($params['laporan_ijin_nama']); ?></td>
		</tr>
		<tr>
			<td align="center">No.</td>
			<td align="center">Jenis</td>
			<td align="center">Nama Pemohon</td>
			<td align="center">Alamat</td>
			<td align="center">Tgl.Permohonan</td>
			<td align="center">Status Permohonan</td>
			<td align="center">No. SK</td>
			<td align="center">Tgl. Terbit</td>
		</tr>
		<?php $n=0; if(count($printrecord)>0){ 
		foreach($printrecord AS $subrecord){ $n++; ?>
			<tr>
				<td><?php echo $n; ?></td>
				<td><?php echo $subrecord->permohonan_jenis; ?></td>
				<td><?php echo $subrecord->pemohon_nama; ?></td>
				<td><?php echo $subrecord->pemohon_alamat; ?></td>
				<td><?php echo $subrecord->permohonan_tanggal; ?></td>
				<td><?php echo $subrecord->permohonan_proses; ?></td>
				<td><?php echo $subrecord->permohonan_sk; ?></td>
				<td><?php echo $subrecord->permohonan_terbit; ?></td>
			</tr>
		<?php }}else{ ?>
		<tr>
			<td colspan="8" align="center">Tidak Ada Data</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>