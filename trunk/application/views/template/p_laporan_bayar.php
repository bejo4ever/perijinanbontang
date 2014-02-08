<!DOCTYPE html>
<html>
<head>
	<title>Laporan Expired</title>
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
			<td colspan="6" align="center">BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</td>
		</tr>
		<tr>
			<td colspan="6" align="center">KOTA BONTANG</td>
		</tr>
		<tr>
			<td colspan="6" align="center">LAPORAN BAYAR <?php echo strtoupper($params['laporan_bayar_ijin_nama']); ?></td>
		</tr>
		<tr>
			<td colspan="6" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">Tanggal Permohonan : <?php if($params['laporan_bayar_opsi'] == 'tanggal'){echo $params['laporan_bayar_tanggalAwal'] . ' s/d ' .$params['laporan_bayar_tanggalAkhir'];}else{echo $params['laporan_bayar_bulan'] . '-' . $params['laporan_bayar_tahun']; } ?> </td>
			<td colspan="3" align="right">Tanggal Cetak : <?php echo date('d-m-Y'); ?></td>
		</tr>
		<tr>
			<td colspan="6" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" style="background-color : #8edac7;">No.</td>
			<td align="center" style="background-color : #8edac7;">Nama Perusahaan</td>
			<td align="center" style="background-color : #8edac7;">Pemohon</td>
			<td align="center" style="background-color : #8edac7;">Telp</td>
			<td align="center" style="background-color : #8edac7;">Alamat</td>
			<td align="center" style="background-color : #8edac7;">Retribusi (Rp)</td>
		</tr>
		<?php $n=0; $total=0; if(count($printrecord)>0){ 
		foreach($printrecord AS $subrecord){ $n++; ?>
			<tr>
				<td><?php echo $n; ?></td>
				<td><?php echo $subrecord->perusahaan_nama; ?></td>
				<td><?php echo $subrecord->pemohon_nama; ?></td>
				<td><?php echo $subrecord->pemohon_telp; ?></td>
				<td><?php echo $subrecord->pemohon_alamat; ?></td>
				<td align="right"><?php echo number_format($subrecord->permohonan_retribusi,0,'.',','); $total+=$subrecord->permohonan_retribusi; ?>&nbsp;</td>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="2" style="background-color : #8edac7;"><b>Total</b></td>
			<td colspan="3" style="background-color : #8edac7;"><b><?php echo $n; ?> Data</b></td>
			<td style="background-color : #8edac7;" align="right"><b><?php echo number_format($total,0,'.',','); ?></b></td>
		</tr>
		<?php }else{ ?>
		<tr>
			<td colspan="6" align="center">Tidak Ada Data</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>