<!DOCTYPE html>
<html>
<head>
	<title>Laporan Permohonan</title>
	<style>
		table{
			border:2px solid black;
			corder-collapse : collapse;
		}
	</style>
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
			<td colspan="8" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6">Tanggal Permohonan : <?php if($params['laporan_opsi'] == 'tanggal'){echo $params['laporan_tanggalAwal'] . ' s/d ' .$params['laporan_tanggalAkhir'];}else{echo $params['laporan_bulan'] . '-' . $params['laporan_tahun']; } ?> </td>
			<td colspan="2" align="right">Tanggal Cetak : <?php echo date('d-m-Y'); ?></td>
		</tr>
		<tr>
			<td colspan="8" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" style="background-color : #8edac7;">No.</td>
			<td align="center" style="background-color : #8edac7;">Jenis</td>
			<td align="center" style="background-color : #8edac7;">Nama Pemohon</td>
			<td align="center" style="background-color : #8edac7;">Alamat</td>
			<td align="center" style="background-color : #8edac7;">Tgl.Permohonan</td>
			<td align="center" style="background-color : #8edac7;">Status Permohonan</td>
			<td align="center" style="background-color : #8edac7;">No. SK</td>
			<td align="center" style="background-color : #8edac7;">Tgl. Terbit</td>
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
		<?php } ?>
		<tr>
			<td colspan="2" style="background-color : #8edac7;"><b>Total</b></td>
			<td colspan="6" style="background-color : #8edac7;"><b><?php echo $n; ?> Data</b></td>
		</tr>
		<?php }else{ ?>
		<tr>
			<td colspan="8" align="center">Tidak Ada Data</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>