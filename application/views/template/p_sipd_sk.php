<!DOCTYPE html>
<html>
<head>
	<title>Surat Izin Praktik Dokter</title>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4" align="center"><h4 style="margin:0px;">PEMERINTAH KOTA BONTANG</h4></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h4 style="margin:0px;">BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</h4></td>
		</tr>
		<tr>
			<td colspan="4" align="center">Jl. Awang Long No. 2 Telp. (0548) 20594 Fax. (0548) 20598</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><hr></td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h2 style="margin:0px;"><u>SURAT IZIN PRAKTIK (SIP) DOKTER</u></h2></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">Nomor : <?php echo $det_apotek_sk; ?></h3></td>
		</tr>
		<tr>
			<td width="200px">&nbsp;</td>
			<td width="270px">&nbsp;</td>
			<td width="150px">&nbsp;</td>
			<td width="100px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">Berdasarkan :</td>
		</tr>
		<tr>
			<td colspan="4" align="justify">- Peraturan menteri Kesehatan Nomor 512/Menkes/Per/X/2007 Tentang Izin Praktik dan Pelaksanaan Praktik Kedokteran.</td>
		</tr>
		<tr>
			<td colspan="4" align="justify">Yang bertanda tangan dibawah ini, <b>Kepala Dinas Kesehatan Kota Bontang</b> memberikan Izin Praktek kepada:</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">##pemohon</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td>Tempat/Tanggal Lahir</td>
			<td colspan="3">: </td>
		</tr>
		<tr>
			<td>Alamat Rumah</td>
			<td colspan="3">: </td>
		</tr>
		<tr>
			<td>Alamat Tempat Praktik</td>
			<td colspan="3">: </td>
		</tr>
		<tr>
			<td>Nomor STR</td>
			<td colspan="3">: </td>
		</tr>
		<tr>
			<td>No Rekomendasi OP</td>
			<td colspan="3">: </td>
		</tr>
		<tr>
			<td>Untuk Praktik Sebagai</td>
			<td colspan="3">: </td>
		</tr>
		<tr>
			<td colspan="4">Dengan kewenangan klinis sesuai dengan kompetensinya </td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>
				<table>
					<tr>
						<td>Ditetapkan di</td>
						<td><b>: Bontang</b></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td><b>: <?php echo date('d-m-Y', strtotime($det_apotek_berlaku)); ?></b></td>
					</tr>
					<tr>
						<td colspan="3" style="border-top:1px solid black;"><b>KEPALA DINAS</b></td>
					</tr>
					<tr>
						<td colspan="3" height="100" valign="bottom"><b><u>Dr. Indriati As'ad. MM</u></b></td>
					</tr>
					<tr>
						<td colspan="3">NIP. 196202091988032006</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>