<!DOCTYPE html>
<html>
<head>
	<title>SK SIMPMBL</title>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4" align="center"><h4 style="margin:0px;">PEMERINTAH KOTA BONTANG</h4></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center">JL. MT. Haryono No. 31 Telp. (0548) 20594 Fax. (0548)20598</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">BONTANG</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><hr></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h4 style="margin:0px;"><u>SURAT IJIN PERTAMBANGAN UMUM DAERAH (SIPUD)</u></h4></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><b>Nomor : <?php echo $det_ipmbl_sk; ?></b></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="justify">
				Berdasarkan Peraturan Daerah Kota Bontang Nomor 13 tahun 2001 tentang pajak Pengambilan Bahan Galian Golongan "C", 
				Peraturan Daerah Kota Bontang Nomor 22 tahun 2001 tentang Pertambangan Umum Daerah , 
				Rekomendasi UKL / UPL dari Badan Lingkungan Hidup No.<?php echo $det_ipmbl_rekombl; ?> tanggal <?php echo date('d-m-Y',strtotime($det_ipmbl_rekomblhtanggal)); ?>, 
				dan Rekomendasi dari Kelurahan <?php echo $ipmbl_kelurahan; ?> <?php echo $det_ipmbl_rekomkel; ?> tanggal <?php echo date('d-m-Y',strtotime($det_ipmbl_rekomkeltanggal)); ?> dengan ini
				memberikan ijin Pertambangan Umum Daerah kepada :
			</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">Nama</td>
			<td colspan="2">: <?php echo $pemohon_nama; ?></td>
		</tr>
		<tr>
			<td colspan="2">Alamat</td>
			<td colspan="2">: <?php echo $pemohon_alamat; ?></td>
		</tr>
		<tr>
			<td colspan="2">Kelurahan</td>
			<td colspan="2">: <?php echo $ipmbl_kelurahan; ?></td>
		</tr>
		<tr>
			<td colspan="2">Kecamatan</td>
			<td colspan="2">: <?php echo $ipmbl_kecamatan; ?></td>
		</tr>
		<tr>
			<td colspan="2">Keperluan</td>
			<td colspan="2">: <?php echo $ipmbl_keperluan; ?></td>
		</tr>
		<tr>
			<td colspan="2">Luas kerukan</td>
			<td colspan="2">: <?php echo $ipmbl_luas; ?> M</td>
		</tr>
		<tr>
			<td colspan="2">Volume Kerukan</td>
			<td colspan="2">: <?php echo $ipmbl_volume; ?> M<sup>3</sup></td>
		</tr>
		<tr>
			<td colspan="2">Lokasi</td>
			<td colspan="2">: <?php echo $ipmbl_lokasi; ?></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4"><b>Kepada pemegang Ijin Pertambangan Umum Daerah ini diwajibkan unutk :</b></td>
		</tr>
		<tr>
			<td valign="top">1.</td>
			<td colspan="3" align="justify">
				Membayar Iuran Eksploitasi yang disetorkan kepada Bendaharawan Khusus  Penerima (BKP) DPPKA Kota Bontang
			</td>
		</tr>
		<tr>
			<td valign="top">2.</td>
			<td colspan="3" align="justify">
				Selambat-lambatnya dalam jangka waktu 3 (tiga) bulan terhitung tanggal berlakunya surat izin ini, sudah melaksananan
				kegiatan penambangan di lapangan serta memasang patok tanfa batas wilayah izin Pertambangan dimaksud.
			</td>
		</tr>
		<tr>
			<td valign="top">3.</td>
			<td colspan="3" align="justify">
				Memasang papan nama dan nomor izin serta masa berlakunya pada lokasi penambangan.
			</td>
		</tr>
		<tr>
			<td valign="top">4.</td>
			<td colspan="3" align="justify">
				Menyampaikan laporan hasil produksi dari kegiatan usahanya setiap 3 (tiga) bulan sekali
				kepada Walikota Bontang dan Kepala Dispenda Kota Bontang dengan tembusan Camat setempat.
			</td>
		</tr>
		<tr>
			<td valign="top">5.</td>
			<td colspan="3" align="justify">
				Mengindahkan semua undang-undang dan peraturan-peraturan yang berlaku, khususnya di Bontang.
			</td>
		</tr>
		<tr>
			<td valign="top">6.</td>
			<td colspan="3" align="justify">
				Menghindari dan mengadakan penanggulangan serta pengamanan terhadap kerusakan dan pencemaran lingkungan
				akibat kegiatan penambangan.
			</td>
		</tr>
		<tr>
			<td valign="top">7.</td>
			<td colspan="3" align="justify">
				Apabila ketentuan diatas tidak dipenuhi sebagaimana mestinya, maka Walikota Bontang dapat mencabut Izin 
				dan mengambil tindakan menurut yang berlaku.
			</td>
		</tr>
		<tr>
			<td valign="top">8.</td>
			<td colspan="3" align="justify">
				Surat Izin berlaku untuk jangka waktu 1 (satu) tahun sejak <?php echo date('d-m-Y',strtotime($det_ipmbl_berlaku)); ?> s/d <?php echo date('d-m-Y',strtotime($det_ipmbl_kadaluarsa)); ?> dengan ketentuan akan dirubah, ditambah atau dicabut apabila
				ternyata terdapat kekeliruan didalamnya.
			</td>
		</tr>
		<tr>
			<td width="30px">&nbsp;</td>
			<td width="170px">&nbsp;</td>
			<td>&nbsp;</td>
			<td width="350px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td align="center">Ditetapkan di Bontang</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td align="center">Pada tanggal , <?php echo date('d-m-Y',strtotime($det_ipmbl_berlaku)); ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td align="center"><b>a.n WALIKOTA BONTANG</b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td align="center"><b>KEPALA BADAN PELAYANAN PERIJINANAN</b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td align="center"><b>TERPADU DAN PENANAMAN MODAL</b></td>
		</tr>
		<tr>
			<td colspan="4" height="100px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td align="center"><b><u><?php echo @$dataijin->NAMA_PEJABAT; ?></u></b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td align="center"><b><?php echo @$dataijin->NAMA_PEJABAT; ?></b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td align="center"><b>NIP. <?php echo @$dataijin->NAMA_PEJABAT; ?></b></td>
		</tr>
		<tr>
			<td colspan="4"><b><u>Tembusan disampaikan kepada :</u></b></td>
		</tr>
		<tr>
			<td>1.</td>
			<td colspan="3">Gubernur Kalimantan Timur, di-Samarinda</td>
		</tr>
		<tr>
			<td>2.</td>
			<td colspan="3">Dinas Pertambangan dan Sumber Daya Mineral Propinsi Kalimantan timur, di-Samarinda</td>
		</tr>
		<tr>
			<td>3.</td>
			<td colspan="3">Kepala Badan Lingkungan Hidup Kota Bontang, di-Bontang</td>
		</tr>
		<tr>
			<td>4.</td>
			<td colspan="3">Kepala Inspektorat Kota Bontang,di-Bontang</td>
		</tr>
		<tr>
			<td>5.</td>
			<td colspan="3">Kepala Dinas Pendapatan Pengelolaan Keuangan danAset Kota Bontang, di-Bontang</td>
		</tr>
		<tr>
			<td>6.</td>
			<td colspan="3">Kepala Disperindagkop. Usaha Mikro, Kecil dan Menegah Kota Bontang, di-Bontang</td>
		</tr>
		<tr>
			<td>7.</td>
			<td colspan="3">Camat <?php echo $ipmbl_kecamatan; ?> di Bontang</td>
		</tr>
		<tr>
			<td>8.</td>
			<td colspan="3">Lurah <?php echo $ipmbl_kelurahan; ?>, di-Bontang</td>
		</tr>
	</table>
</body>
</html>