<!DOCTYPE html>
<html>
<head>
	<title>Lampiran Apotek</title>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="6" align="center"><h3 style="margin:0px;">LAMPIRAN PERMOHONAN IZIN APOTEK</h3></td>
		</tr>
		<tr>
			<td colspan="6" align="center"><hr></td>
		</tr>
		<tr>
			<td width="30px">&nbsp;</td>
			<td width="30px">&nbsp;</td>
			<td width="30px">&nbsp;</td>
			<td width="150px">&nbsp;</td>
			<td>&nbsp;</td>
			<td width="200px">&nbsp;</td>
		</tr>
		<tr>
			<td>1.</td>
			<td colspan="3">Keterangan Pemohon</td>
			<td colspan="2"></td>
		</tr>
			<tr>
				<td>&nbsp;</td>
				<td>a.</td>
				<td colspan="2">Nama</td>
				<td colspan="2">: <?php echo $pemohon_nama; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>b.</td>
				<td colspan="2">Tempat & Tanggal Lahir</td>
				<td colspan="2">: <?php echo $pemohon_tempatlahir.', '.date('d-m-Y', strtotime($pemohon_tanggallahir)); ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>c.</td>
				<td colspan="2">Pekerjaan</td>
				<td colspan="2">: <?php echo $pemohon_pekerjaan; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>d.</td>
				<td colspan="2">Alamat Rumah</td>
				<td colspan="2">: <?php echo $pemohon_alamat; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>e.</td>
				<td colspan="2">Nomor Telepon</td>
				<td colspan="2">: <?php echo $pemohon_telp; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>f.</td>
				<td colspan="2">NPWP</td>
				<td colspan="2">: <?php echo $pemohon_npwp; ?></td>
			</tr>
		<tr>
			<td>2.</td>
			<td colspan="3">Keterangan Bangunan</td>
			<td colspan="2"></td>
		</tr>
			<tr>
				<td>&nbsp;</td>
				<td>a.</td>
				<td colspan="2">Lokasi Sarana Apotek</td>
				<td colspan="2">:</td>
			</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>1)</td>
					<td>Di Tepi Jalan</td>
					<td colspan="2">: <?php echo $apotek_alamat; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>2)</td>
					<td>Desa/Kelurahan</td>
					<td colspan="2">: <?php echo $apotek_kel; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>3)</td>
					<td>Kecamatan</td>
					<td colspan="2">: <?php echo $apotek_kec; ?></td>
				</tr>
			<tr>
				<td>&nbsp;</td>
				<td>b.</td>
				<td colspan="2">Jarak Dengan Sarana Apotek Terdekat</td>
				<td colspan="2">: <?php echo $det_apotek_jarak; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>c.</td>
				<td colspan="2">Ruangan Khusus Penunjang Rumah Bersalin</td>
				<td colspan="2">:</td>
			</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>1)</td>
					<td>Ruang Peracikan</td>
					<td colspan="2">: <?php echo ($det_apotek_rracik == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>2)</td>
					<td>Ruang Administrasi dan Penyerahan Resep</td>
					<td colspan="2">: <?php echo ($det_apotek_radmin == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>3)</td>
					<td>Ruang Kerja Apoteker</td>
					<td colspan="2">: <?php echo ($det_apotek_rkerja == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>4)</td>
					<td>Ruang Tunggu</td>
					<td colspan="2">: <?php echo ($det_apotek_rtunggu == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>5)</td>
					<td>kamar Madi / WC</td>
					<td colspan="2">: <?php echo ($det_apotek_rwc == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
				</tr>
			<tr>
				<td>&nbsp;</td>
				<td>d.</td>
				<td colspan="2">Kelengkapan Bangunan Apotek</td>
				<td colspan="2">:</td>
			</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>1)</td>
					<td>Sumber Air</td>
					<td colspan="2">: <?php echo $det_apotek_air; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>2)</td>
					<td>Penerangan</td>
					<td colspan="2">: <?php echo $det_apotek_listrik; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>3)</td>
					<td>Alat Pemadam Kebakaran</td>
					<td colspan="2">: <?php echo $det_apotek_apk; ?> Buah, Ukuran <?php echo $det_apotek_apkukuran; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>4)</td>
					<td>Ventilasi:Jendela</td>
					<td colspan="2">: <?php echo $det_apotek_jendela; ?> Buah</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>5)</td>
					<td>Sanitasi</td>
					<td colspan="2">:</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>Saluran Pembuangan Limbah</td>
					<td colspan="2">: <?php echo ($det_apotek_limbah == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>Bak Pembuangan Sampah</td>
					<td colspan="2">: <?php echo ($det_apotek_baksampah == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>6)</td>
					<td>Tempat Parkir</td>
					<td colspan="2">: <?php echo ($det_apotek_parkir == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
				</tr>
			<tr>
				<td>&nbsp;</td>
				<td>e.</td>
				<td colspan="2">Papan Nama, (Papan Nama Berukuran Min 60cm x 40cm Tebal 5cm, Tulisan Hitam Di Atas Putih)</td>
				<td colspan="2">: <?php echo ($det_apotek_papannama == 1) ? 'ADA' : 'TIDAK ADA'; ?></td>
			</tr>
		<tr>
			<td>3.</td>
			<td colspan="3">Keterangan Perlengkapan</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td>4.</td>
			<td colspan="3">Keterangan Tenaga Kesehatan</td>
			<td colspan="2"></td>
		</tr>
			<tr>
				<td>&nbsp;</td>
				<td>a.</td>
				<td colspan="2">Apoteker Pengelola Apotek</td>
				<td colspan="2">: <?php echo $det_apotek_pengelola; ?> Orang</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>b.</td>
				<td colspan="2">Apoteker Pendamping</td>
				<td colspan="2">: <?php echo $det_apotek_pendamping; ?> Orang</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>c.</td>
				<td colspan="2">Asisten Apoteker</td>
				<td colspan="2">: <?php echo $det_apotek_asisten; ?> Orang</td>
			</tr>
		<tr>
			<td>5.</td>
			<td colspan="3">Keterangan Tanah</td>
			<td colspan="2"></td>
		</tr>
			<tr>
				<td>&nbsp;</td>
				<td>a.</td>
				<td colspan="2">Luas Tanah</td>
				<td colspan="2">: <?php echo $det_apotek_luas; ?> m2</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>b.</td>
				<td colspan="2">Status Hak Tanah</td>
				<td colspan="2">: <?php echo $det_apotek_statustanah; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>c.</td>
				<td colspan="2">Bukti Kepemilikan Tanah</td>
				<td colspan="2">:</td>
			</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
			<td>Bontang, <?php echo date('d-m-Y', strtotime($det_apotek_tanggal)); ?></td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
			<td>Yang Membuat Pernyataan</td>
		</tr>
		<tr>
			<td colspan="5" height="100px">&nbsp;</td>
			<td>Materai 6000</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
			<td><?php echo $pemohon_nama; ?></td>
		</tr>
	</table>
</body>
</html>