<!DOCTYPE html>
<html>
<head>
	<title>Surat Keputusan Izin Apotek</title>
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
			<td colspan="4" align="center"><h2 style="margin:0px;">SURAT IZIN APOTEK</h2></td>
		</tr>
		<tr>
			<td width="100px">&nbsp;</td>
			<td width="200px">&nbsp;</td>
			<td width="50px">&nbsp;</td>
			<td width="360px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><b><u>KEPUTUSAN KEPALA DINAS KESEHATAN KOTA BONTANG</u></b></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">Nomor : <?php echo $det_apotek_nomorsk; ?></h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">Menetapkan</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center">MEMBERIKAN IZIN SEMENTARA TETAP PERUBAHAN KE - II PENGELOLA APOTEK</td>
		</tr>
		<tr>
			<td><b>KEPADA :</b></td>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Nama</td>
			<td colspan="2">: <?php echo $det_apotek_nama; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Alamat</td>
			<td colspan="2">: <?php echo $det_apotek_alamat; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Nomor Surat Penugasan</td>
			<td colspan="2">: <?php echo $det_apotek_sp; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Nama Apotek</td>
			<td colspan="2">: <?php echo $apotek_nama; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Alamat</td>
			<td colspan="2">: <?php echo $apotek_alamat; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Kota</td>
			<td colspan="2">: Bontang</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Propinsi</td>
			<td colspan="2">: Kalimantan Timur</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Dengan Menggunakan Sarana</td>
			<td colspan="2">: <?php echo $apotek_kepemilikan; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Nama Pemilik Sarana</td>
			<td colspan="2">: <?php echo $apotek_pemilik; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Alamat Sarana</td>
			<td colspan="2">: <?php echo $apotek_alamat; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Akte Perjanjian Kerja Sama Nomor</td>
			<td colspan="2">: <?php echo $det_apotek_spnomor; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Yang dibuat dihadapan Notaris</td>
			<td colspan="2">: <?php echo $det_apotek_notaris; ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Di</td>
			<td colspan="2">: Bontang</td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4"><b>Dengan ketentuan sebagai berikut :</b></td>
		</tr>
		<tr>
			<td colspan="4">
				<table>
					<tr>
						<td width="30px" valign="top">1.</td>
						<td align="justify">
							Izin Apotek berlaku untuk Apoteker atau Apoteker bekerja sama dengan pemilik sarana Apotek, di lokasi dan sarana sebagaimana tersebut diatas.
						</td>
					</tr>
					<tr>
						<td valign="top">2.</td>
						<td align="justify">
							Penyelenggaraan Apotek harus selalu mematuhi ketentuan peraturan perundang-undangan yang berlaku.
						</td>
					</tr>
					<tr>
						<td valign="top">3.</td>
						<td align="justify">
							Sertifikat ini hanya berlaku dalam wilayah Kota Bontang.
						</td>
					</tr>
					<tr>
						<td valign="top">4.</td>
						<td align="justify">
							Pemilik wajib melakukan Registrasi Ulang setelah memperoleh Surat Tanda Registrasi Apoteker.
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>
				<table>
					<tr>
						<td>Dikeluarkan di</td>
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
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4"><u>Tembusan Kepada Yth. :</u></td>
		</tr>
		<tr>
			<td colspan="4">
				<table>
					<tr>
						<td width="30px" valign="top">1.</td>
						<td align="justify">Menteri Kesehatan Ri di Jakarta</td>
					</tr>
					<tr>
						<td valign="top">2.</td>
						<td align="justify">Kepada Dinas Kesehatan Prop. Kaltim di Samarinda</td>
					</tr>
					<tr>
						<td valign="top">3.</td>
						<td align="justify">Kepala Balai POM di Samarinda</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>